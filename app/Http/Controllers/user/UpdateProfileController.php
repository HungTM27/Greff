<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UpdateProfileController extends Controller
{
    public function formUpdateProfile(){
        $areas = Area::where('level', '=',1)->get();
        $worker = Worker::where('id','=',1)->first();
        return view('user.viewInformation.updateProfile',compact('areas', 'worker'));
    }
    public function updateProfile(Request $request){
        $request->validate([
            'last_name'=>['required'],
            'first_name'=>['required'],
            'furigana_first_name'=>['required', 'regex:/^([ァ-ン]|ー)+/'],
            'furigana_last_name'=>['required', 'regex:/^([ァ-ン]|ー)+/'],
            'phone'=>['required','numeric','regex:/^\d{10}$|^\d{11}$/'],
            'email'=>'required|email',
            'avatar'=>'image|mimes:jpeg,jpg,png,gif,webp'
        ]);

        $areas = Area::where('level', '=',1)->get();

        $worker = Worker::where('id','=',1)->first();

        if($request->hasFile('avatar')){
            $destination_path = 'public/images/worker';
            $image = $request->file('avatar');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs($destination_path,$image_name);
            $worker['avatar'] = $image_name;
        }
        $worker['gender'] = $request->gender;
        $worker['push_notification'] = $request->push_notification;
        $worker['work_region'] = $request->work_region;
        $worker['birth_day'] = $request->birth_day;
        $worker['birth_month'] = $request->birth_month;
        $worker['birth_year'] = $request->birth_year;
        if($worker['phone'] != $request->birth_year) {
            $worker['phone'] = $request->birth_year;
        }
        $worker->update();
//        if($worker['phone'] != $request->phone) {
//            return redirect()->route('formConfirmPhone')->put('worker_id',$worker['id']);
//        } else {
            return redirect()->route('formUpdateProfile',compact('areas', 'worker'))->with('success','ユーザー情報を更新しました。');
//        }
    }
    public function changePassword(Request $request){
        $request->validate([
            'new_password'=> 'required|min:6|confirmed'
        ]);
        $worker = Worker::where('id','=',1)->first();
        if($request->current_password != $worker['password']){
            return redirect()->route('formUpdateProfile')->with('fail','確認コードが間違っています。再度入力してください。');
        } else {
            Session::put('password',$request->new_password);
            return redirect()->route('formUpdateProfile');
        }
    }
//    public function formConfirmPhone(){
//        return view('user.register.confirmPhone');
//    }
//
//    public function confirmPhone(Request $request){
//        $request->validate([
//            'otp'=>['required','numeric','regex:/^\d{6}$/']
//        ]);
//        if($request->otp == Session::get('otp')){
//            return redirect()->route('formSetPassword')
//                ->with('success','電話番号に確認コードを送信しました。 確認コードを入力して登録を完了してください');
//        } else {
//            return back()->with('fail','確認コードが間違っています。再度入力してください。');
//        }
//    }
}
