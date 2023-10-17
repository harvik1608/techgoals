<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\Company;
use Redirect;

class CompanyController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // load list view
        $companies = Company::orderBy("id","desc")->get();
        return view('company/list',compact('companies'));
    }

    public function create()
    {
        $company = array();

        // load add_edit view
        return view('company/add_edit',compact('company'));
    }

    public function store(Request $request)
    {
        // validate data
        $validatedData = $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Name is required.'
        ]);

        // code for upload logo on storage/app/public
        $logo = "";
        if($_FILES['logo']['name'] != "")
        {
            $logo = time().'.'.$request->logo->extension();  
            $request->logo->move(storage_path('app/public/'), $logo); 
        }

        // to insert data into company table
        $row = new Company;
        $row->name = $request->name;
        $row->email = $request->email == "" ? "" : $request->email;
        $row->logo = $logo;
        $row->website = $request->website == "" ? "" : $request->website;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('companies');
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
            'name' => 'required',
        ],[
            'name.required' => 'Name is required.'
        ]);

        // code for upload logo on storage/app/public
        $logo = $request->old_logo == "" ? "" : $request->old_logo;
        if($_FILES['logo']['name'] != "")
        {
            $logo = time().'.'.$request->logo->extension();  
            $request->logo->move(storage_path('app/public/'), $logo); 
            $this->remove_file(storage_path('app/public/'),$request->old_logo);
        }

        // to update data into company table
        $row = Company::find($id);
        $row->name = $request->name;
        $row->email = $request->email == "" ? "" : $request->email;
        $row->logo = $logo;
        $row->website = $request->website == "" ? "" : $request->website;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('companies');
    }

    public function destroy($id = null)
    {
        $row = Company::find($id);
        $logo = $row->logo;
        $row->delete();

        $this->remove_file(storage_path('app/public/'),$logo);

        echo json_encode(array("status" => 1));
        exit;
    }
}
