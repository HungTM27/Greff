<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Image_Occuption;
use App\Models\Occupation;
use App\Models\RecruitJobs;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysql_xdevapi\Table;


class RecruitJobController extends Controller
{
 // hiển thị tất cả các danh sách job trong database
public function showListJob(){

    $listJobs = RecruitJobs::with('job')->get();

    return view('manager.store.ShowListJobs',compact('listJobs'));
}
public function ShowDetailsJob($id){
    $image_job = Image_Occuption::all();
    $detailJob = RecruitJobs::with('job')->find($id);
    return view('manager.store.DetailJob',compact('detailJob','image_job'));
}
public function EditRecruitJob($id){
    $edit = RecruitJobs::find($id);
    $occupation = Occupation::all();
    return view('manager.store.EditRecruitJob',compact('edit','occupation'));
}
public function FormCreateJob($id){
    $occupation = Occupation::where('status',0)->get();
    $occupation2 = Occupation::find($id);
    return view('manager.store.CreateRecruitJob',compact('occupation','occupation2'));
}
public function SearchJob(Request $request){
    $data = "";
    if($request->search){
        $data = RecruitJobs::whereHas('job', function ($data) use ($request) {
            $data->where('title', 'LIKE', '%'.$request->search.'%');
        })->orwhere('work_date','LIKE','%'.$request->search.'%')->get();
    }
    if(isset($request->status)) {
        $data = RecruitJobs::where('status', $request->status)->get();
    }

    $output='';
    $status = '';
    if(count($data)>0){
       foreach($data as $key => $value){
           switch ($value->status)
           {
               case 0: $status = "Hiring";break;
               case 1: $status = "Disable";break;
               case 2: $status = "Finish";break;

           }
           $output .= "
             <tr>
                <td>".++$key."</td>
                <td>".$status."
                 </td>
                <td><p>".$value->work_date."</p>
                    <p>".$value->work_time_start."~".$value->work_time_end."</p>
                </td>
                <td>".$value->occupdation->title."</td>
                <td>".$value->people."</td>
                <td>".$value->applied_people."</td>
                <td>
                    <a style=\"padding: 1px 5px; background-color: #f7dfbf;border: 1px solid #3c3c3c;color: black\" href='".route('DetailJob',$value->id)."'>
                        <i style=\"margin-left: 3px\"  class=\"fa-solid fa-eye\"></i>
                    </a>
                      <a style=\" padding: 1px 7px;font-size: 14px;margin-left: 4px;color: #333;background-color: #f7dfbf;border: 1px solid #3c3c3c;\"
                                               href='".route('FormEditRecruitJob',$value->id)."'>
                                                <i class=\"fas fa-pen\"></i>
                                            </a>
                </td>
            </tr>
         }
       ";
    }
    }else{
        $output .= "No result";
    }

    return $output;
}

public function ConfirmAddCreateJob(Request $request){
    $request->validate([
        'occupation'=>'unique:recruit_jobs,id_occupation',
        'work_date'=>'required',
        'work_time'=>'required|integer|max:24|',
        'break_time'=>'required|integer|max:120|',
        'people'=>'required|integer',
        'salary_hour'=>'required|integer',
        'travel_fees'=>'required|integer',
        'dealine_day'=>'required',
        'status'=>'required',
    ]);
    $image_job = Image_Occuption::all();
    $occupation = $request->occupation;
    $work_date = $request->work_date;
    $work_time = $request->work_time;
    $work_time_start = $request->work_time_start;
    $work_time_end = $request->work_time_end;
    $break_time = $request->break_time;
    $people = $request->people;
    $salary_hour = $request->salary_hour ;
    $travel_fees = $request->travel_fees;
    $dealine_day = $request->dealine_day;
    $dealine_time = $request->dealine_time;
    $status = $request->status;
    $confirm = Occupation::where('id','=',$request->occupation)->get();
    return view('manager.store.ConfirmAdd',compact('image_job','confirm','occupation','work_date','work_time',
    'work_time_start','work_time_end','break_time','people','salary_hour','travel_fees','dealine_day','dealine_time','status'
    ));

}
public function ConfirmEditJob(Request $request,$id){
    $request->validate([
        'occupation'=>'unique:recruit_jobs,id_occupation,'.$id,
        'work_time'=>'integer|max:24|',
        'break_time'=>'integer|max:120|',
        'people'=>'integer',
        'salary_hour'=>'integer',
        'travel_fees'=>'integer'
    ]);

    $id = $request->id;
    $image_job = Image_Occuption::all();
    $occupation = $request->occupation;
    $work_date = $request->work_date;
    $work_time = $request->work_time;
    $work_time_start = $request->work_time_start;
    $work_time_end = $request->work_time_end;
    $break_time = $request->break_time;
    $people = $request->people;
    $salary_hour = $request->salary_hour ;
    $travel_fees = $request->travel_fees;
    $dealine_day = $request->dealine_day;
    $dealine_time = $request->dealine_time;
    $status = $request->status;
    $confirm = Occupation::where('id','=',$request->occupation)->get();
    return view('manager.store.ConfirmEdit',compact('image_job','confirm','id','occupation','work_date','work_time',
        'work_time_start','work_time_end','break_time','people','salary_hour','travel_fees','dealine_day','dealine_time','status'
    ));


}


public function StoreAdd(Request $request){
    $Create = new RecruitJobs();
    $Create->id_occupation = $request->occupation;
    $Create->work_date = $request->work_date;
    $Create->work_time = $request->work_time;
    $Create->work_time_start = $request->work_time_start;
    $Create->work_time_end = $request->work_time_end;
    $Create->break_time = $request->break_time;
    $Create->people = $request->people;
    $Create->salary_hour = $request->salary_hour;
    $Create->travel_fees = $request->travel_fees;
    $Create->dealine_day = $request->dealine_day;
    $Create->dealine_time = $request->dealine_time;
    $Create->status = $request->status;
    $Create->save();
    return redirect()->route('RecruitJobs')->with('success','Add job success');

}
public function StoreEdit(Request $request,$id){

    $UpdateRecruitJob = RecruitJobs::find($id);
    $UpdateRecruitJob->id_occupation = $request->occupation;
    $UpdateRecruitJob->work_date = $request->work_date;
    $UpdateRecruitJob->work_time = $request->work_time;
    $UpdateRecruitJob->work_time_start = $request->work_time_start;
    $UpdateRecruitJob->work_time_end = $request->work_time_end;
    $UpdateRecruitJob->break_time = $request->break_time;
    $UpdateRecruitJob->people = $request->people;
    $UpdateRecruitJob->salary_hour = $request->salary_hour;
    $UpdateRecruitJob->travel_fees = $request->travel_fees;
    $UpdateRecruitJob->dealine_day = $request->dealine_day;
    $UpdateRecruitJob->dealine_time = $request->dealine_time;
    $UpdateRecruitJob->status = $request->status;
    $UpdateRecruitJob->save();
    return redirect()->route('RecruitJobs')->with('success', 'Edit job success');

}


}

