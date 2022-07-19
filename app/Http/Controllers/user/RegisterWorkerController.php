<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Nexmo\Laravel\Facade\Nexmo;

class RegisterWorkerController extends Controller
{
    public function formRegisterWorker1(){
        return view('user.register.registerStep1');
    }
    public function formRegisterWorker2(){
        $areas = Area::where('level', '=',1)->get();
        return view('user.register.registerStep2',compact('areas'));
    }
    public function registerWorker2(Request $request){
        $request->validate([
            'last_name'=>['required'],
            'first_name'=>['required'],
            'furigana_first_name'=>['required', 'regex:/^([ァ-ン]|ー)+/'],
            'furigana_last_name'=>['required', 'regex:/^([ァ-ン]|ー)+/'],
            'phone'=>['required','numeric','regex:/^\d{10}$|^\d{11}$/'],
            'email'=>'required|email'
        ]);

        if(strlen($request->phone) == 11){
            $num = substr($request->phone,2,9);
        } elseif(strlen($request->phone) == 10){
            $num = substr($request->phone,1,9);
        }

        $otp = rand(100000,999999);
        Nexmo::message()->send([
            'to' => '84'.$num,
            'from' => '84353687272',
            'text' => 'Your OTP is'.$otp.'for verification.',
        ]);

        $worker = new Worker();
        $worker['last_name'] = $request->last_name;
        $worker['first_name'] = $request->first_name;
        $worker['furigana_first_name'] = $request->furigana_first_name;
        $worker['furigana_last_name'] = $request->furigana_last_name;
        $worker['phone'] = $request->phone;
        $worker['email'] = $request->email;
        $worker['work_region'] = $request->work_region;
        $worker['push_notification'] = $request->push_notification;
        $worker['status'] = 0;
        $worker->save();
        Session::put('otp',$otp);
        return redirect()->route('formConfirmPhone')
            ->with('success','電話番号に確認コードを送信しました。 確認コードを入力して登録を完了してください');

    }

    public function formConfirmPhone(){
        return view('user.register.confirmPhone');
    }

    public function confirmPhone(Request $request){
        $request->validate([
            'otp'=>['required','numeric','regex:/^\d{6}$/']
        ]);
        if($request->otp == Session::get('otp')){
            return redirect()->route('formSetPassword')
                ->with('success','電話番号に確認コードを送信しました。 確認コードを入力して登録を完了してください');
        } else {
            return back()->with('fail','確認コードが間違っています。再度入力してください。');
        }
    }

    public function formSetPassword(){
        return view('user.register.setPassword');
    }

    public function setPassword(Request $request){
        $request->validate([
            'password'=> 'required|min:6|confirmed'
        ]);
        $worker = Worker::orderBy('created_at','desc')->first();
        $worker['password'] = bcrypt($request->password);
        $worker->update();
        return redirect()->route('formNotificationSuccess');
    }

    public function formNotificationSuccess(){
        return view('user.register.notificationSuccess');
    }
//
//    public function index(){
//        Nexmo::message()->send([
//            'to' => '84378917911',
//            'from' => '84353687272',
//            'text' => 'Hello b Dat :)'
//        ]);
//        echo 'success message!!';
//    }

}
