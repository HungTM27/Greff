<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function create(){
        return view('manager.admin.skills.createSkill');
    }
    public function store(Request $request){
        // dd($data);
        $validated = $request->validate([
            'skil_name' => 'required',
            'desciption' => 'required',
            [
                'skil_name.required' => 'Usename is required',
                'desciption.required' => 'desciption is required',
            ],
        ]);

        $create= Skill::create($request->all());
        return redirect()->route('skills.index')->with('success', 'Tạo Mới Thành Công');

    }

    public function index(){
        // lấy ra toàn bộ user
        $skills = skill::all();
        $roles = skill::where('skill_name','skill_name');
        // trả về view hiển thị danh sách user
        return view('manager.admin.skills.managementSkills', compact('skills','roles'));
    }

    public function edit($id)
    {
        $user = skill::find($id);
        if(is_null($user)){
            abort(404);
            return redirect()->back();
        }
        return view('manager.admin.skills.editSkill',[
            'user' => $user
        ]);
    }

    public function Update(request $request)
    {
       $request->validate([
            'skil_name' => 'required',
        ]);
        $user = Skill::find($request->id);
        $user->update($request->all());
        // $user->save();
        return redirect(route('skills.index'));
    }


    public function ListUserDestroy($id)
    {
        $destroy = skill::destroy($id);
        if(!$destroy) {
            return redirect()->route('list.users');
        }
        return redirect()->route('list.users');
    }
}



