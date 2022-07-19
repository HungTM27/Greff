<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\ForgotPassword;
use Mail\Mail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\worker;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use PhpOffice\PhpSpreadsheet\Calculation\Web;
use function Ramsey\Uuid\v1;


class ForgotPasswordController extends Controller
{
    public function formForgot(){
        return view('user.forgotPassword.formforgotPassword', ['title' => 'Forgot Password']);
    }

    public function ShowResetLink(Request $request)
    {

        $data= $request->all();
        $request->validate([
            'phone' => 'required',
        ]);
        $user = worker::where('phone', $request->phone)->first();
        // dd($Infor);
        if (!$user) {
            // dd(123);
            return redirect()->back()->with('fail', 'Your login phone is incorrect. Please try enter');
        } else {
            $id = $user->id;
            $sid    = "AC2b327837f61ef939b6f1304db8a2d4f9";
            $token  = "6bd0a7d8c4c93cd3fbdb1fdbe7a1db31";
            $twilio = new Client($sid, $token);
            $activeCode = rand(100000, 999999);
            // // send sms
            $message = $twilio->messages
                ->create('+84362341969', // to
                    array(
                        "messagingServiceSid" => "MG3068b730dcfd079e146899c287ec8e25",
                        'body' => $activeCode,
                    )
                );
            $user->code = $activeCode;
            // dd($activeCode);
            $user->save();
            return redirect(route('confirmotpAction',$id))->with( ['id' => $id] );

            // return redirect()->route('confirmotp')->with('success', 'Email sent. Please check your phone to receive new password');
        }
    }

    public function confirmotpAction(){
        $id = Session::get('id');
        return view('user.forgotpassword.confirmotp',compact('id'));
    }
    public function confirmotp(Request $request){

        $data = $request->all();
        // dd($data);
        $user = Worker::where('code', $data['otp'])->first();
        if($user != null) {
            $id = $user->id;
            return redirect(route('resetpassword',$id))->with( ['id' => $id] );
        } else {
            // $id = $user->id;
            Session::flash('error', 'Your phone number or password is incorrect. Please try enter!');
            return redirect(route('confirmotpAction'));
        }
    }
    public function resetpassword(){
        $id = Session::get('id');
        return view('user.forgotPassword.resetpassword',compact('id'));

        // return redirect()->route('acceptforgot');
    }
    public function acceptforgot(Request $request){
        // return view('user.forgot.acceptforgot');
        $data = $request->all();

        // $request->validate([
        //     'password'=>'required|min:6',
        //     'confirm_password'=>'required|same:password',
        // ]);
        $newPassword = $data['password'];
        $confirmPassword = $data['confirm_password'];
        $newPassword = preg_replace('/\s+/','',$newPassword);
        $confirmPassword = preg_replace('/\s+/','',$confirmPassword);
        $newPassword = strlen($newPassword);
        $confirmPassword = strlen($confirmPassword);
        $pass = Hash::make($data['confirm_password']);

        if($newPassword < 6 || $confirmPassword < 6)
        {
            Session::flash('error', 'Password must be at least 6 characters!');
            return redirect(route('resetpassword'));
        } else {
            if($data['password'] == $data['confirm_password'])
            {

                DB::table('workers')
                    ->where('id', $data['id'])
                    ->update(['password' => $pass]);
                return redirect(route('acceptforgotpassword'));
            } else {

                Session::flash('error', 'Confirm password does not match with new password!');
                return redirect(route('resetpassword'));
            }
        }
        // return redirect()->route('acceptforgot');
    }

    public function acceptforgotpassword(){
        return view('user.forgotpassword.acceptforgot');
    }
}

