<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Area;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function formCreateCareer(){
        return view('career');
    }
    public function createCareer(Request $request){
        $area = new Area();
        $area->name = $request->name;
        $area->katakana_name = $request->katakana_name;
        $area->kanji_name = $request->kanji_name;
        $area->level = $request->level;
        $area->parent_id = $request->parent_id;
        $query = $area->save();
        if($query){
            return back()->with('success','You have been successfuly create new user!');
        } else {
            return back()->with('fail','Something went wrong!');
        }

    }
    // public function store(Request $request){
    // $form_data = array(
    //     'skil_name'  =>  $request->name,
    // );

    // Cat::create($form_data);

    // return redirect('admin')->with('success', 'Data Added successfully.');
    // //Cat::create($form_data);
    // dd($request->name);
    // }
}
