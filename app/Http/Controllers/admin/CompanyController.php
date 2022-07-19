<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Career;
use App\Models\Company;
use App\Models\Other;
use App\Models\User;
use CompanyFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompanyExport;

class CompanyController extends Controller
{
    public function formManagementCompany(){
        $areas = Area::all();
        $others = Other::all();
        $careers = Career::all();
        $companies = Company::all();
        $count = Company::all()->count();
        Session::forget('add_company');
        return view('manager.admin.company.managementCompany', compact('areas', 'others', 'careers','companies', 'count'));
    }

    public function search(Request $request){
        $output = '';
        $areas = Area::all();
        $careers = Career::all();
        $companies = Company::where('company_name','like','%'.$request->search.'%')
            ->orwhere('hp_url','like','%'.$request->search.'%')->get();
        foreach ($companies as $company){
            $output .=
                '<tr>
                    <td>'. $company->id .'</td>
                    <td>'. $company->company_name .'</td>
                    <td>' . $company->hp_url . '</td>
                    <td> Name:' . $company->contact_name . '<br>
                        Phone:' . $company->phone_number . '<br>
                        Email:' . $company->email . '</td>
                    <td>'.
//                            for($i=0; $i < count($areas); $i++){
//                                if($areas['id'] == $company['id_city']) {
//                                    $areas['name'] . " ";
//                                }
//                            }
//                            foreach($areas as $area){
//                                if($area['id'] == $company['id_district']){
//                                    $area['katakana_name'] . " ";
//                                }
//                            }
                            $company['room'] ." ". $company['building'] . '</td>'.
//                    '<td>' . $company['status'] = 1 : "Enable" ? "Disable" . '</td>'.
//                    '<td>' . $company['created_at'] . '</td>'.
//                    '<td>
//                        <a type="button" class="btn border-0 p-0" href=".url("editCompany", $company->id).">
//                            <i class="mdi mdi-pencil-box" style="font-size: 25px"> </i>
//                        </a></td>'.
//                    '<td>'.
//                        '<div class="row">'.
//                            '<div>'.
//                                '<div class="col-md-12" style="text-align: center">'.
//                                    '<button type="button" class="btn border-0"><i class="ti-upload"></i></button>'.
//                                '</div>'.
//                                '<div class="col-md-12" style="text-align: center">'.
//                                    '<select name="file_uploaded" id="file_uploaded">'.
//                                        '<option value="volvo"></option>'.
//                                    '</select>'.
//                                '</div>'.
//                            '</div>'.
//                        '</div>'.
//                    '</td>'.
                '</tr>';
        }

        return response($output);
    }

    public function formAddCompany(){
        $areas = Area::where('level','=', "1")->get();
        $others = Other::all();
        $careers = Career::all();
        $list_acc = User::where('level','=', "1")->get();
        return view('manager.admin.company.addCompany', compact('areas', 'others', 'careers', 'list_acc'));
    }

    public function getDistrict($id){
        $districts = Area::where('parent_id','=',"$id")->pluck('katakana_name','id');
        return json_encode($districts);
    }

    public function addCompany(Request $request){
        $request->validate([
            'company_name'=>'required',
            'register_name'=>'required',
            'city'=>'required',
            'district'=>'required',
            'zipcode'=>'required',
            'hp_url'=>'required|url',
            'area'=>'required',
            'career'=>'required',
            'contact_name'=>'required',
            'phone_number'=>'required|numeric',
            'email'=>'required|email'
        ]);
        $company = new Company();
        $company['status'] = $request->status;
        $company['company_name'] = $request->company_name;
        $company['company_name(kana)'] = $request->company_name_kana;
        $company['registed_name'] = $request->register_name;
        $company['registed_name(kana)'] = $request->register_name_kana;
        $company['id_city'] = $request->city;
        $company['id_district'] = $request->district;
        $company['room'] = $request->room;
        $company['building'] = $request->building;
        $company['zipcode'] = $request->zipcode;
        $company['hp_url'] = $request->hp_url;
        $company['area'] = implode('|',$request->area);
        $company['career'] = implode('|',$request->career);
        $company['contact_name'] = $request->contact_name;
        $company['phone_number'] = $request->phone_number;
        $company['email'] = $request->email;
        $company['id_other'] = $request->other;
        $company['note'] = $request->note;
        $company->save();
        Session::put('add_company',$company->id);
        return redirect()->route('formAddCompany')->with('success','You have been successfully create new company!');

    }

    public function registerUser(Request $request){
//        $request->validate([
//            'name'=>'required|min:6|max:50',
//            'email'=>'required',
//            'password'=>'required|min:6|regex:/[a-z]*[A-Z]*[0-9]$/'
//        ],[
//            'name.error' => 'The name field is required.',
//            'email.error' => 'The email field is required.',
//            'password.error' => 'The email field is required.',
//        ]);
        $id_company = Company::orderBy('created_at','desc')->first();
        $company_acc = new User();
        $company_acc['name'] = $request->name;
        $company_acc['email'] = $request->login_email;
        $company_acc['password'] = bcrypt($request->password);
        $company_acc['parent_id'] = $id_company['id'];
        $company_acc['status'] = $request->status;
        $company_acc['level'] = '1';
        $company_acc->save();
        return redirect()->route('formAddCompany')->with('success','You have been successfully create new account!');
    }

    public function formEditAccount(Request $request){
        $acc = User::find($request->id);
        return view('manager.admin.company.editAccount',compact('acc'));
    }

    public function updateAccount(Request $request,$id){
        $data = $request->all();
        $acc= User::find($id);
        $acc['name'] = $request->name;
        $acc['email'] = $request->login_email;
        $acc['password'] = $data['password'] ? $acc['password'] : bcrypt($data['password']);
        $acc['status'] = $request->status;
        $acc->save();
        return redirect()->route('formAddCompany')->with('success','You have been successfully update account!');
    }

    public function formEditCompany($id){
        $areas = Area::where('level','=', "1")->get();
        $others = Other::all();
        $careers = Career::all();
        $company = Company::find($id);
        $list_acc = User::where('level','=', "1")
                        ->where('parent_id','=', $id)->get();
        return view('manager.admin.company.editCompany',compact('areas', 'others', 'careers','company','list_acc'));
    }

    public function updateCompany(Request $request){
        $data = $request->all();
        $company= Company::find($request->id);
        $company['status'] = $data['status'];
        $company['company_name'] = $data['company_name'];
        $company['company_name(kana)'] = $data['company_name_kana'];
        $company['registed_name'] = $data['registed_name'];
        $company['registed_name(kana)'] = $data['registed_name_kana'];
        $company['id_city'] = $data['city'];
        $company['id_district'] = $data['district'];
        $company['room'] = $data['room'];
        $company['building'] = $data['building'];
        $company['zipcode'] = $data['zipcode'];
        $company['hp_url'] = $data['hp_url'];
        $company['area'] = implode('|',$data['area']);
        $company['career'] = implode('|',$data['career']);
        $company['contact_name'] = $data['contact_name'];
        $company['phone_number'] = $data['phone_number'];
        $company['email'] = $data['email'];
        $company['id_other'] = $data['other'];
        $company['note'] = $data['note'];
        $company->save();
        return redirect()->route('formManagementCompany')->with('success','You have been successfully update company!');
    }
    public function registerUser_Company(Request $request,$id){
//        $request->validate([
//            'name'=>'required|min:6|max:50',
//            'login_email'=>'required',
//            'password'=>'required|min:6|regex:/[a-z]*[A-Z]*[0-9]$/'
//        ],[
//                'name.error' => 'The name field is required.',
//                'login_email.error' => 'The login_email field is required.',
//                'password.error' => 'The email field is required.',
//            ]
//        );
        $company_acc = new User();
        $company_acc['name'] = $request->name;
        $company_acc['email'] = $request->login_email;
        $company_acc['password'] = bcrypt($request->password);
        $company_acc['parent_id'] = $id;
        $company_acc['status'] = $request->status;
        $company_acc['level'] = '1';
        $company_acc->save();
        return redirect()->route('formEditCompany',$id)->with('success','You have been successfully create new account!');
    }

    public function formEditAccount_Company(Request $request){
        $acc = User::find($request->id);
        return view('manager.admin.company.editAccountCompany',compact('acc'));
    }

    public function updateAccount_Company(Request $request,$id){
        $data = $request->all();
        $acc= User::find($id);
        $acc['name'] = $request->name;
        $acc['email'] = $request->login_email;
        $acc['password'] = $data['password'] ? $acc['password'] : bcrypt($data['password']);
        $acc['status'] = $request->status;
        $id_company = $acc['parent_id'];
        $acc->save();
        return redirect()->route('formEditCompany',$id_company)->with('success','You have been successfully update account!');
    }

    public function exportIntoCSV(){
        return Excel::download(new CompanyExport, 'companiesList.csv');
    }

//    public function uploadFile(Request $request){
//        $data = $request->all();
//        $company= Company::find($request->id);
//        $c_file = new CompanyFile();
//        $c_file['id_company'] = $company['id'];
//        $c_file['file_name'] = $data['file_name'];
//        $c_file->save();
//        $request->file->store('public');
//        return redirect()->route('formManagementCompany');
//    }
}
