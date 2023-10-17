<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Redirect;

class EmployeeController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::orderBy('id','asc')->get();
        return view('employee/list',compact('companies'));
    }

    public function load()
    {
        $result = array("data" => []);
        $employees = Employee::select('employees.id', 'employees.fname', 'employees.lname','employees.email','employees.phone', 'companies.name as company_name')
            ->join('companies', 'companies.id', '=', 'employees.company_id')
            ->get();
        foreach($employees as $key => $val)
        {
            $view_url = url("employees/".$val["id"]);
            $edit_url = url("employees/".$val["id"]."/edit");
            $remove_url = url("employees/".$val["id"]);

            $action = '<a class="btn btn-info btn-sm" onclick=edit_emp("'.$val['id'].'") title="View"><i class="bi bi-eye"></i></a>';
            $action .= '&nbsp;<a class="btn btn-warning btn-sm" href="'.$edit_url.'" title="Edit"><i class="bi bi-pencil"></i></a>';
            $action .= '&nbsp;<a class="btn btn-danger btn-sm" onclick=remove_row("'.$remove_url.'") title="Remove"><i class="bi bi-trash"></i></a>';

            $result['data'][$key] = array(
                $key+1,
                $val['company_name'],
                $val['fname']." ".$val["lname"],
                $val['email'],
                $val['phone'],
                $action
            );
        }
        echo json_encode($result);
        exit;  
    }

    public function create()
    {
        $employee = array();
        $companies = Company::orderBy('id','asc')->get();

        // load add_edit view
        return view('employee/add_edit',compact('employee','companies'));
    }

    public function store(Request $request)
    {
        // validate data
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company_id' => 'required',
        ],[
            'fname.required' => 'First Name is required.',
            'lname.required' => 'Last Name is required.',
            'company_id.required' => 'Company is required.',
        ]);

        // to insert data into employee table
        $row = new Employee;
        $row->fname = $request->fname;
        $row->lname = $request->lname;
        $row->company_id = $request->company_id;
        $row->email = $request->email == "" ? "" : $request->email;
        $row->phone = $request->phone == "" ? "" : $request->phone;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('employees');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            // check company is exist or not
            $company = Company::find($id);
            if($company){
                return view('company/add_edit',compact('company'));
            } else
                return Redirect::to('companies');           
        }
    }

    public function update(Request $request,$id)
    {
       // validate data
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company_id' => 'required',
        ],[
            'fname.required' => 'First Name is required.',
            'lname.required' => 'Last Name is required.',
            'company_id.required' => 'Company is required.',
        ]);

        // to insert data into employee table
        $row = Employee::find($id);
        $row->fname = $request->fname;
        $row->lname = $request->lname;
        $row->company_id = $request->company_id;
        $row->email = $request->email == "" ? "" : $request->email;
        $row->phone = $request->phone == "" ? "" : $request->phone;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('employees');
    }

    public function show($id)
    {
        $emp = Employee::where('id',$id)->first();
        echo json_encode(array("data" => $emp));
        exit;
    }

    public function destroy($id = null)
    {
        $row = Employee::find($id);
        $row->delete();

        echo json_encode(array("status" => 1));
        exit;
    }
}
