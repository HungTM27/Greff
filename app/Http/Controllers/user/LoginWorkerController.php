<?php

namespace App\Http\Controllers\user;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\worker;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class LoginWorkerController extends Controller

{
    public function formLogin(){
        return view('user.pageTop.detailJob');
    }

    public function validateform(Request $request)
    {

        $data= $request->all();
        $password= $data['password'];
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        $infor = worker::where('phone', $request->phone)->first();
        if (!$infor) {
            return redirect()->back()->with('fail', 'Your login phone is incorrect. Please try enter');
        } else {
            if (Hash::check($password, $infor['password'])) {
                session(['worker' => $infor]);
                return redirect()->route('mypageInformation_toppage')->with('success', 'Email sent. Please check your phone to receive new password');
            }else {
                return redirect()->back()->with('fail', 'Your login password is incorrect. Please try enter');
            }
        }
    }

    public function logout(){
        session()->forget('worker');
        return redirect(route('mypageInformation_toppage'));
    }

}

