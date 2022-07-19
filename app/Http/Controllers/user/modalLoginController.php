<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class modalLoginController extends Controller
{
    public function formmodal(){
        return view('user.layouts.modalLogin');
    }
}
