<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyPageInforController extends Controller
{
    public function mypageInformation(){
        return view('user.viewInformation.myjobinformation');
    }
}
