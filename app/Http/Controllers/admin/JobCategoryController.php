<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function response;
use function view;

class JobCategoryController extends Controller
{
     public function formManagementJobCategory(){
         $jobcategory=Career::all();
        // dd($jobcategory);
        return view('manager.admin.jobCategory.managementJobCategory',['jobcategory'=>$jobcategory]);
    }
    public function createJobCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'career_name' => 'required',
            'describe' => 'required',
        ]);
        if (!($validator->passes())) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
//        dd($request->all());
        $job_add = Career::create($request->all());
        return redirect()->route('formManagementJobCategory');

    }

    public function editJobCategory(Request $request){
        $job=Career::find($request->job_id);
        $jobcategory=Career::all();
        return view('manager.admin.jobCategory.FormEditJob',['job'=>$job,'jobcategory'=>$jobcategory]);
    }
    public function updateJobCategory(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'career_name' => 'required',
            'describe' => 'required'
        ]);
        if (!($validator->passes())) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        $job=Career::find($id);
        $job->update($request->all());
        return redirect()->route('formManagementJobCategory');
    }
}
