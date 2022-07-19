<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class LoginController extends Controller
{

    public function formLogin()
    {
        if(Auth::check() && Auth::user()->level == 0){
            return redirect()->route('formManagementCompany');
        }
        if(Auth::check() && Auth::user()->level == 2){
            return redirect()->route('RecruitJobs');
        }
        return view('manager.login.login', ['title' => 'Login']);
    }

    public function formLoginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'The field is required',
            'body.email' => 'Email is format is invalid',
            'password.required' => 'The field is required'
        ]);
        $dem = 0;

        $user1 = User::where('email', $request->email)->get();
        $user = User::all();
        foreach ($user as $rows) {
            if ($rows->email == $request->email) {
                $dem = 1;
            }
        }
        foreach ($user1 as $rows) {
            if ($rows->count >= 5) {
                return redirect()->back()->with("block1", "Your account is locked please contact the administrator");
            }
        }
        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $request->email,
            'password' => $request->password], $remember)) {
            // setcookie
            if ($request->remember === null) {
                setcookie('login_email', $request->email, time() - 3600);
                setcookie('login_password', $request->password, time() - 3600);
            } else {
                setcookie('login_email', $request->email, time() + 60 * 60 * 60 * 365);
                setcookie('login_password', $request->password, time() + 60 * 60 * 60 * 365);
            }
            if (auth()->user()->level == 0) {
                return redirect()->route('formManagementCompany');
            }
            if (auth()->user()->level == 1) {
                return redirect()->route('formManagementStore');
            }
            if (auth()->user()->level == 2) {
                return redirect()->route('RecruitJobs');
            }
        }
        if ($dem == 1) {
            if (empty(session($request->email))) {
                $i = 1;
            }
            $i = session($request->email) + 1;
            session()->put($request->email, $i);
            if ($i > 2 && $i < 5) {
                return redirect()->back()->with("error_login", "Your email or password is incorrect. You can only try up to 5 times.");
            }
            if ($i >= 5) {
                $user1->toQuery()->update(['count' => 5]);
                session()->flash('block', 'xc');
                session()->forget($request->email);
                return redirect()->back()->with("error_login", "You have tried more than 5 times. Please contact admin for support");
            }
        }
        return redirect()->back()->with("error_login", "Your email or password is incorrect. Please try enter!");
    }

    public function formForgotPassword()
    {
        return view('manager.login.forgotPassword', ['title' => 'Forgot Password']);
    }

    public function ShowResetLink(Request $request)
    {
//      validate
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'The field is required',
            'email.email' => 'Email is format is invalid',
        ]);
        $Infor = User::where('email', '=', $request->email)->first();
        if (!$Infor) {
            return redirect()->back()->with('fail', 'Your login email is incorrect. Please try enter');
        } else {

            $token = \Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            $action_link = route('reset-password-form', ['token' => $token, 'email' => $request->email]);
            $body = "
            We have sent you a password reset link for $request->email ,Click the link below to reset your password
                 ";
            \Mail::send('manager.login.email-forgot', ['action_link' => $action_link, 'body' => $body], function ($email) use ($request) {
                $email->from('noreply@exam.com', 'Admin');
                $email->to($request->email, 'Your Name')->subject('Reset Password');

            });
            return redirect()->route('forgot-password-form')->with('success', 'Email sent. Please check your email to receive new password');
        }
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('manager.login.reset', ['title' => 'Reset Password'])->with(['token' => $token, 'email' => $request->email]);
    }

    public function ResetPassword(Request $request)
    {// validate
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
            'confirm' => 'required|same:password'
        ]);

        // check token trong bảng password_reset có trùng với giá trị nhập vào ở  form không
        $check_token = DB::table('password_resets')->where(
            [
                'email' => $request->email,
                'token' => $request->token,
            ]
        );
        if ($check_token) {
            // nếu trùng sẽ update mật khẩu ở bảng user và delete email ở bảng password
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password)
            ]);
            DB::table('password_resets')->where([
                    'email' => $request->email,
                ]
            )->delete();
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
}
