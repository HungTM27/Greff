<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Occupation;
use App\Models\Speciality;
use App\Models\Station;
use App\Models\Station_Occuption;
use App\Models\Skill_Required_Occuption;
use App\Models\Image_Occuption;
use Illuminate\Http\Request;
use App\Http\Requests\OccupationRequest;
use App\Http\Requests\OccupatonUpdateRequest;
use Illuminate\Support\Facades\Validator;
use File;
class OccupationController extends Controller
{
    public function formEditOccupation(Request $request,$id){
//        dd("3213");
        $occupation =Occupation::find($id);
        $station=Station::all();
        $station_Occuption=Station_Occuption::where('id_occupation',$id)->get();
//        dd($station_Occuption);
        $speciality=Speciality::where('id_occupation',$id)->get();
//        dd($station);
        $jobcategory=Career::all();
        $image_occupation=Image_Occuption::where('id_occupation',$id)->get();
        $skill_required_occuption=Skill_Required_Occuption::where('id_occupation',$id)->get();
        return view('manager.store.occupation.FormEditOccupation',['jobcategory'=>$jobcategory,'station'=>$station,'occupation'=>$occupation,'station_Occuption'=>$station_Occuption,'speciality'=>$speciality,'image_occupation'=>$image_occupation,'skill_required_occuption'=>$skill_required_occuption]);
    }
    public function showCreateOccupation(){
//        dd("1232");
        $occupation=Occupation::all();
        $image=Image_Occuption::all();
        return view('manager.store.occupation.ShowOccupation',['occupation'=>$occupation,'image'=>$image]);
    }
    public function formDeleteOccupation($id){
//        $occupation=Occupation::where('id',$id)->delete();
        $image_Occuption = Image_Occuption::where('id_occupation', $id)->get();
//            dd("213");
        foreach ($image_Occuption as $row){
            $dir_file = public_path('uploads' . '\\' . $row->name);
//                dd(File::exists($dir_file));
            if (File::exists($dir_file)) {
                unlink($dir_file);
            }
        }
        $occupation=Occupation::find($id);
        $occupation->delete();
        Image_Occuption::where('id_occupation', $id)->delete();
        Skill_Required_Occuption::where('id_occupation', $id)->delete();
        Station_Occuption::where('id_occupation', $id)->delete();
        Speciality::where('id_occupation', $id)->delete();
        return redirect()->route('occupation.show');
    }
    public function formCreateOccupation(Request $request){
        $station=Station::all();
//        dd($station);
        $jobcategory=Career::all();
        return view('manager.store.occupation.FormCreateOccupation',['jobcategory'=>$jobcategory,'station'=>$station]);
    }
    public function createOccupation(Request $request){
        $image=$request->file('file');
        $stt_dele="$request->stt_image_delete";
        for ($i = 0; $i < strlen($stt_dele); $i++){
            unset($image[$stt_dele[$i]]);
        }
//        dd($image);
        if (count($image)<3){
            return redirect()->back()->with("file_error", "少なくとも3つのファイルをインポートする");
        }
        foreach($image as $key => $file) {
//            dd(preg_match("/(jpg|jpeg|png|gif)/i", "gi"));
            if(!preg_match("/(jpg|jpeg|png|gif|webp)/i", $file->getClientOriginalExtension())) {
                return redirect()->back()->with("file_error", "間違ったファイルを選択してください、ばか");
            }
//            dd($file->getClientOriginalExtension());
        }
        $new_occupation=Occupation::create($request->all());
        if($image)
        {
            foreach($image as $key => $file)
            {

                $name = time()."_".$file->getClientOriginalName();
//                check regex dua vao duoi
                $path=$file->move(public_path('uploads'), $name);
                Image_Occuption::create([
                    'id_occupation'=>$new_occupation->id,
                    'name'=>$name,
                    'path'=>$path,
                ]);
            }
            // dd($insert);
        }

        if(!empty($request->station)){
            foreach($request->station as $key => $row) {
                Station_Occuption::create([
                    'name'=>Station::find($row)->name,
                    'id_occupation' => $new_occupation->id,
                ]);
            }
        }
        if(!empty($request->speciality)){
            foreach($request->speciality as $key => $row) {
                Speciality::create([
                    'content'=>$row,
                    'id_occupation' => $new_occupation->id,
                ]);
            }
        }
        if(!empty($request->id_skill_required)){
            foreach($request->id_skill_required as $key => $row) {
                Skill_Required_Occuption::create([
                    'text'=>$row,
                    'id_occupation' => $new_occupation->id,
                ]);
            }
        }
        return redirect()->route('occupation.show');
    }
    public function updateOccupation(OccupatonUpdateRequest $request,$id){

        $stt_dele="$request->stt_image_delete";
        $occupation =Occupation::find($id);
        if(!empty($request->id_job_category)){
            $occupation->update([
                'id_job_category'=>$request->id_job_category,
            ]);
        }
        if(!$request->hasfile('file')&&$stt_dele!=""){
            $image=Image_Occuption::where('id_occupation',$id)->get();
//            dd(count($image));
//            dd(strlen($stt_dele));
            if (count($image)-strlen($stt_dele)<3){
                return redirect()->back()->with("file_error", "少なくとも3つのファイルをインポートする");
            }
            for ($i = 0; $i < strlen($stt_dele); $i++){

                $dir_file = public_path('uploads' . '\\' . $image[$stt_dele[$i]]->name);
//                dd(File::exists($dir_file));
                if (File::exists($dir_file)) {
                    unlink($dir_file);
                }
                unset($image[$stt_dele[$i]]);
            }

            Image_Occuption::where('id_occupation', $id)->delete();
//            dd($image_Occuption);
            //
            foreach($image as $key => $file)
            {
                $name = $file->name;
                $path=$file->path;
                Image_Occuption::create([
                    'id_occupation'=>$occupation->id,
                    'name'=>$name,
                    'path'=>$path,
                ]);
            }
        }
        if($request->hasfile('file'))
        {
            $image=$request->file('file');
            for ($i = 0; $i < strlen($stt_dele); $i++){
                unset($image[$stt_dele[$i]]);
            }
//            dd($image);
            if (count($image)<3){
                return redirect()->back()->with("file_error", "少なくとも3つのファイルをインポートする");
            }
            foreach($image as $key => $file) {
//            dd(preg_match("/(jpg|jpeg|png|gif)/i", "gi"));
                if(!preg_match("/(jpg|jpeg|png|gif|webp)/i", $file->getClientOriginalExtension())) {
                    return redirect()->back()->with("file_error", "間違ったファイルを選択してください、ばか");
                }
//            dd($file->getClientOriginalExtension());
            }
            $image_Occuption = Image_Occuption::where('id_occupation', $id)->get();
//            dd("213");
            foreach ($image_Occuption as $row){
                $dir_file = public_path('uploads' . '\\' . $row->name);
//                dd(File::exists($dir_file));
                if (File::exists($dir_file)) {
                    unlink($dir_file);
                }
            }
            Image_Occuption::where('id_occupation', $id)->delete();
//            dd($image_Occuption);
            //
            foreach($image as $key => $file)
            {
//                dd($file);
                $name = time()."_".$file->getClientOriginalName();
                $path=$file->move(public_path('uploads'), $name);
                Image_Occuption::create([
                    'id_occupation'=>$occupation->id,
                    'name'=>$name,
                    'path'=>$path,
                ]);
            }
            // dd($insert);
        }
        $occupation->update(['title'=>$request->title,'description'=>$request->description,'work_address'=>$request->work_address,'access_address'=>$request->access_address,'note'=>$request->note,'bring_item'=>$request->bring_item,'status'=>$request->status]);
        if(!empty($request->station)){
            Station_Occuption::where('id_occupation', $id)->delete();
            foreach($request->station as $key => $row) {
                Station_Occuption::create([
                    'name'=>Station::find($row)->name,
                    'id_occupation' => $occupation->id,
                ]);
            }
        }
        if(!empty($request->speciality)){
            Speciality::where('id_occupation', $id)->delete();
            foreach($request->speciality as $key => $row) {
                Speciality::create([
                    'content'=>$row,
                    'id_occupation' => $occupation->id,
                ]);
            }
        }
        Skill_Required_Occuption::where('id_occupation', $id)->delete();
        foreach($request->id_skill_required as $key => $row) {
            if($row!=null){
                Skill_Required_Occuption::create([
                    'text'=>$row,
                    'id_occupation' => $id,
                ]);
            }
        }
        return redirect()->route('occupation.show');
    }

}
