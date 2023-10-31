<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Redirect;

class UserController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user/list');
    }

    public function load(Request $request)
    {
        $start     = $request['start'];
        $no_of_rec = $request['length'];

        $records = [];
        $users = User::where('role',2)->orderBy('id','desc')->get();
        if($users) {
            foreach($users as $key => $val) {
                $records[] = $val;
            }
        }
        $data['records'] = $records;
        $total_rec = count($users);
        $data['iDisplayStart'] = $start;

        $b_data = array();
        if($records) {
            foreach($records as $key => $row) {
                $action = "";
                $action .= '<a class="btn btn-sm btn-warning" href="'.url('users/'.$row['id'].'/edit').'">Edit</a>&nbsp;';
                $action .= '<a class="btn btn-sm btn-danger" href="javascript:;" onclick=remove_row("'.url('users/'.$row['id']).'")>Delete</a>';
                if($row['avatar'] == "") {
                    $avatar = '<img src="'.url('uploads/user/default.png').'" style="width: 75px;height: 75px;border-radius: 100%;" class="img img-responsive" />';
                } else {
                    $avatar = '<img src="'.url('uploads/user/'.$row['avatar']).'" style="width: 75px;height: 75px;border-radius: 100%;" class="img img-responsive" />';
                }
                
                $i = 0;
                $b_data[$key]['DT_RowId'] = "row_".$row['id'];
                $b_data[$key][$i++] = $data['iDisplayStart'] + ($key +1);
                $b_data[$key][$i++] = $avatar;
                $b_data[$key][$i++] = $row['name'];
                $b_data[$key][$i++] = $row['email'];
                $b_data[$key][$i++] = $row['phone'];
                $b_data[$key][$i++] = $action;
            }
        }
        if(count($users) > 0) {
            $t_data['a_data']['aaData'] = $b_data;  
        } else {
            $t_data['a_data']['aaData'] = [];  
        }
        $t_data['a_data']['iTotalRecords']        = $total_rec;
        $t_data['a_data']['iTotalDisplayRecords'] = $total_rec;

        echo json_encode($t_data['a_data']);
    }

    public function create()
    {
        $user = array();
        return view('user/add_edit',compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.'
        ]);
        $avatar = "";
        if($_FILES['avatar']['name'] != "") {
            $avatar = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('uploads/user/'), $avatar);
        }
        $row = new User;
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone == "" ? 0 : $request->phone;
        $row->country = $request->country == "" ? "" : $request->country;
        $row->state = $request->state == "" ? "" : $request->state;
        $row->city = $request->city == "" ? "" : $request->city;
        $row->address = $request->address == "" ? "" : $request->address;
        $row->avatar = $avatar;
        $row->role = 2;
        $row->password = Hash::make($request->password);
        $row->created_by = auth()->user()->id;
        $row->updated_by = auth()->user()->id;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('users');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $user = User::find($id);
            if($user){
                return view('user/add_edit',compact('user'));
            } else
                return Redirect::to('users');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.'
        ]);
        $avatar = $request->old_avatar;
        if($_FILES['avatar']['name'] != "") {
            $avatar = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('uploads/user/'), $avatar);
            if($request->old_avatar != "" && file_exists(public_path('uploads/user/'.$request->old_avatar)))
                unlink(public_path('uploads/user/'.$request->old_avatar));
        }
        $row = User::find($id);
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone == "" ? 0 : $request->phone;
        $row->country = $request->country == "" ? "" : $request->country;
        $row->state = $request->state == "" ? "" : $request->state;
        $row->city = $request->city == "" ? "" : $request->city;
        $row->address = $request->address == "" ? "" : $request->address;
        $row->avatar = $avatar;
        if($request->password != "") {
            $row->password = Hash::make($request->password);
        }
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('users');
    }

    public function destroy($id = null)
    {
        $row = User::find($id);
        $avatar = $row['avatar'];
        $row->delete();

        if($avatar != "" && file_exists(public_path('uploads/user/'.$avatar)))
            unlink(public_path('uploads/user/'.$avatar));

        echo json_encode(array("status" => 1));
        exit;
    }
}
