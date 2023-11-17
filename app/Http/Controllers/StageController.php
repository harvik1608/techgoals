<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Redirect;
use Session;

class StageController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('stage/list');
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
