<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Redirect;
use Session;

class RoleController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('role/list');
    }

    public function load(Request $request)
    {
        $start     = $request['start'];
        $no_of_rec = $request['length'];

        $records = [];
        $roles = Role::orderBy('id','desc')->get();
        if($roles) {
            foreach($roles as $key => $val) {
                $records[] = $val;
            }
        }
        $data['records'] = $records;
        $total_rec = count($roles);
        $data['iDisplayStart'] = $start;

        $b_data = array();
        if($records) {
            foreach($records as $key => $row) {
                $action = "";
                $action .= '<a class="btn btn-sm btn-warning" href="'.url('roles/'.$row['id'].'/edit').'">Edit</a>&nbsp;';
                $action .= '<a class="btn btn-sm btn-danger" href="javascript:;" onclick=remove_row("'.url('roles/'.$row['id']).'")>Delete</a>';

                $i = 0;
                $b_data[$key]['DT_RowId'] = "row_".$row['id'];
                $b_data[$key][$i++] = $data['iDisplayStart'] + ($key +1);
                $b_data[$key][$i++] = $row['name'];
                $b_data[$key][$i++] = $row['description'];
                $b_data[$key][$i++] = $row['assigned_to'];
                $b_data[$key][$i++] = $action;
            }
        }
        if(count($roles) > 0) {
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
        $role = array();
        $roles = Role::select('id','name')->orderBy('name','asc')->get();
        return view('role/add_edit',compact('role','roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $row = new Role;
        $row->name = $request->name;
        $row->parent_role_id = $request->parent_role_id == "" ? 0 : $request->parent_role_id;
        $row->description = $request->description;
        $row->created_by = auth()->user()->id;
        $row->updated_by = auth()->user()->id;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        Session::flash('success',1);
        return Redirect::to('users');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $role = Role::find($id);
            if($role){
                $roles = Role::select('id','name')->orderBy('name','asc')->get();
                return view('role/add_edit',compact('role','roles'));
            } else
                return Redirect::to('users');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $row = Role::find($id);
        $row->name = $request->name;
        $row->parent_role_id = $request->parent_role_id == "" ? 0 : $request->parent_role_id;
        $row->description = $request->description;
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();

        Session::flash('success',1);
        return Redirect::to('users');
    }

    public function destroy($id = null)
    {
        $row = Role::find($id);
        $row->delete();

        Session::flash('success',1);
        echo json_encode(array("status" => 1));
        exit;
    }
}
