<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Station;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public function formManagementStore(){
        $session = 1;
        $areas = Area::all();
        $stores = Store::where('id_company','=',$session)->get();
        $count = Store::where('id_company','=',$session)->count();
        Session::forget('add_store');
        return view('manager.company.managementStore', compact('areas', 'stores', 'count'));
    }

    public function searchStore(Request $request){
        $output = '';
        $stores = Store::where('store_name','like','%'.$request->search.'%')
            ->orwhere('contact_name','like','%'.$request->search.'%')
            ->orwhere('email','like','%'.$request->search.'%')
            ->orwhere('phone_number','like','%'.$request->search.'%')
            ->orwhere('address','like','%'.$request->search.'%')->get();
        foreach ($stores as $store){
            $output .=
                '<tr>
                    <td>'. $store->id . '</td>
                    <td>' . $store->store_name . '</td>
                    <td> Name:' . $store->contact_name . '<br>
                        Phone:' . $store->phone_number . '<br>
                        Email:' . $store->email .
                    '</td>
                    <td>' . $store->address . '</td>
                    <td>' . $store->status = 1 ? "Enable" : "Disable" . '</td>
                    <td>' . $store->created_at . '</td>
                    <td>
                        <a type="button" class="btn border-0 p-0" href="">
                            <i class="mdi mdi-pencil-box" style="font-size: 25px"></i>
                        </a>
                        <a class="btn border-0 p-1" id="deleteAccount">
                            <i class="mdi mdi-delete" style="font-size: 25px; color:red"></i>
                        </a>
                    </td>
                </tr>';
        }

        return response($output);
    }

    public function formAddStore(){
        $areas = Area::where('level','=', "1")->get();
        $stores = Store::all();
        $stations = Station::all();
        $list_acc = User::where('level','=', "2")->get();
        return view('manager.company.addStore',compact('areas', 'stores', 'stations', 'list_acc'));
    }

    public function addStore(Request $request){
        $request->validate([
            'store_name'=>'required',
            'city'=>'required',
            'district'=>'required',
            'contact_name'=>'required',
            'phone_number'=>'required|numeric',
            'email'=>'required|email'
        ]);
        $store = new Store();
        $store['status'] = $request->status;
        $store['store_name'] = $request->store_name;
        $store['store_name(kana)'] = $request->store_name_kana;
        $store['id_city'] = $request->city;
        $store['id_district'] = $request->district;
        $store['hp_url'] = $request->hp_url;
        $store['station'] = implode('|',$request->station);
        $store['contact_name'] = $request->contact_name;
        $store['phone_number'] = $request->phone_number;
        $store['email'] = $request->email;
        $store['id_company'] = 1;

        $store->save();
        Session::put('add_store',$store->id);
        return redirect()->route('formAddStore')->with('success','You have been successfully create new store!');
    }

    public function formEditStore($id){
        $areas = Area::where('level','=', "1")->get();
        $stations = Station::all();
        $store = Store::find($id);
        $districts = Area::where('parent_id','=',$store['id_city'])->get();
        $list_acc = User::where('level','=', "2")
            ->where('parent_id','=', $id)->get();
        return view('manager.company.editStore',compact('areas','stations', 'store','list_acc','districts'));
    }

    public function updateStore(Request $request){
        $data = $request->all();
        $store= Store::find($request->id);
        $store['status'] = $data['status'];
        $store['store_name'] = $data['store_name'];
        $store['store_name(kana)'] = $data['store_name_kana'];
        $store['id_city'] = $data['city'];
        $store['id_district'] = $data['district'];
        $store['hp_url'] = $data['hp_url'];
        $store['station'] = implode('|',$data['station']);
        $store['contact_name'] = $data['contact_name'];
        $store['phone_number'] = $data['phone_number'];
        $store['email'] = $data['email'];
        $store['id_company'] = 1;
        $store->save();
        return redirect()->route('formManagementStore')->with('success','You have been successfully update store!');
    }

    public function registerUser(Request $request){
//        $request->validate([
//            'name'=>'required|min:6|max:50',
//            'email'=>'required',
//            'password'=>'required|min:6|regex:/[a-z]*[A-Z]*[0-9]$/'
//        ]);
        $id_store = Store::orderBy('created_at','desc')->first();
        $store_acc = new User();
        $store_acc['name'] = $request->name;
        $store_acc['email'] = $request->login_email;
        $store_acc['password'] = bcrypt($request->password);
        $store_acc['parent_id'] = $id_store['id'];
        $store_acc['status'] = $request->status;
        $store_acc['level'] = '2';
        $store_acc->save();
        return redirect()->route('formAddStore')->with('success','You have been successfully create new account!');
    }

    public function formEditAccount(Request $request){
        $acc = User::find($request->id);
        return view('manager.company.editAccount',compact('acc'));
    }

    public function updateAccount(Request $request,$id){
        $data = $request->all();
        $acc= User::find($id);
        $acc['name'] = $request->name;
        $acc['email'] = $request->login_email;
        $acc['password'] = $data['password'] ? $acc['password'] : bcrypt($data['password']);
        $acc['status'] = $request->status;
        $acc->save();
        return redirect()->route('formAddStore')->with('success','You have been successfully update account!');
    }

    public function registerUser_Store(Request $request,$id){
//        $request->validate([
//            'name'=>'required|min:6|max:50',
//            'email'=>'required',
//            'password'=>'required|min:6|regex:/[a-z]*[A-Z]*[0-9]$/'
//        ]);
        $company_acc = new User();
        $company_acc['name'] = $request->name;
        $company_acc['email'] = $request->login_email;
        $company_acc['password'] = bcrypt($request->password);
        $company_acc['parent_id'] = $id;
        $company_acc['status'] = $request->status;
        $company_acc['level'] = '2';
        $company_acc->save();
        return redirect()->route('formEditStore',$id)->with('success','You have been successfully create new account!');
    }

    public function formEditAccount_Store(Request $request){
        $acc = User::find($request->id);
        return view('manager.company.editAccountStore',compact('acc'));
    }

    public function updateAccount_Store(Request $request,$id){
        $data = $request->all();
        $acc= User::find($id);
        $acc['name'] = $request->name;
        $acc['email'] = $request->login_email;
        $acc['password'] = $data['password'] ? $acc['password'] : bcrypt($data['password']);
        $acc['status'] = $request->status;
        $id_company = $acc['parent_id'];
        $acc->save();
        return redirect()->route('formEditStore',$id_company)->with('success','You have been successfully update account!');
    }
}
