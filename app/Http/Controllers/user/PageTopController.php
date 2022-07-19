<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecruitJobs;
use App\Models\Occupation;
use App\Models\Image_Occuption;
use App\Models\Career;
use App\Models\Skill_Required_Occuption;
use App\Models\Speciality;
use App\Models\Station_Occuption;
class PageTopController extends Controller
{
    public function detailJob(Request $request,$id){
        $data=RecruitJobs::find($id);
        $id_occupation=$data->id_occupation;
        $occupation=Occupation::find($id_occupation);
        $id_career=$occupation->id_job_category;
        $Career=Career::find($id_career);
        $station_Occuption=Station_Occuption::where('id_occupation',$id_occupation)->get();
        $slide=Image_Occuption::where('id_occupation',$id_occupation)->get();
        $skill_required=Skill_Required_Occuption::where('id_occupation',$id_occupation)->get();
        $speciality=Speciality::where('id_occupation',$id_occupation)->get();
//        dd($slide);
        return view('user.pageTop.detailJob',['data'=>$data,'slide'=>$slide,'occupation'=>$occupation,'career'=>$Career,'skill_required'=>$skill_required,'speciality'=>$speciality,'station_Occuption'=>$station_Occuption]);
    }
}
