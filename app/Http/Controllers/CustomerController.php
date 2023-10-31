<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;

class CustomerController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('customer/list');
    }

    public function load()
    {
        $result = array("data" => []);
        $customers = Customer::orderBy('id','desc')->get();
        foreach($customers as $key => $val)
        {
            $edit_url = url("customers/".$val["id"]."/edit");
            $remove_url = url("customers/".$val["id"]);

            $action = '&nbsp;<a class="btn btn-warning btn-sm" href="'.$edit_url.'" title="Edit"><i class="bi bi-pencil"></i></a>';
            $action .= '&nbsp;<a class="btn btn-danger btn-sm" onclick=remove_row("'.$remove_url.'") title="Remove"><i class="bi bi-trash"></i></a>';

            $result['data'][$key] = array(
                $key+1,
                "<small>".$val['name']."</small>",
                "<small>".$val['email']."</small>",
                "<small>".$val['phone']."</small>",
                "<small>".$val['whatspp_no']."</small>",
                "<small>".date('d M, Y',strtotime($val['dob']))."</small>",
                "<small>".date('d M, Y',strtotime($val['anniversary_date']))."</small>",
                $action
            );
        }
        echo json_encode($result);
        exit;  
    }

    public function create()
    {
        $customer = array();
        $areas = Area::orderBy('id','desc')->get();

        return view('customer/add_edit',compact('customer','areas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'whatspp_no' => 'required',
        ],[
            'name.required' => 'First Name is required.',
            'phone.required' => 'Mobile no. is required.',
            'whatspp_no.required' => 'Whatsapp no. is required.'
        ]);

        $row = new Customer;
        $row->name = $request->name;
        $row->phone = $request->phone;
        $row->email = $request->email == "" ? "" : $request->email;
        $row->whatspp_no = $request->whatspp_no == "" ? "" : $request->whatspp_no;
        $row->kids = $request->kids == "" ? 0 : $request->kids;
        $row->reference = $request->reference == "" ? 4 : $request->reference;
        $row->area = $request->area == "" ? 0 : $request->area;
        $row->token = strtotime(date("Y-m-d"));
        $row->dob = $request->dob == "" ? "0000-00-00" : $request->dob;
        $row->anniversary_date = $request->anniversary_date == "" ? "0000-00-00" : $request->anniversary_date;
        $row->created_by = auth()->user()->id;
        $row->updated_by = auth()->user()->id;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('customers');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $customer = Customer::find($id);
            if($customer){
                $areas = Area::orderBy('id','desc')->get();
                return view('customer/add_edit',compact('customer','areas'));
            } else
                return Redirect::to('customers');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'whatspp_no' => 'required',
        ],[
            'name.required' => 'First Name is required.',
            'phone.required' => 'Mobile no. is required.',
            'whatspp_no.required' => 'Whatsapp no. is required.'
        ]);
        $row = Customer::find($id);
        $row->name = $request->name;
        $row->phone = $request->phone;
        $row->email = $request->email == "" ? "" : $request->email;
        $row->whatspp_no = $request->whatspp_no == "" ? "" : $request->whatspp_no;
        $row->kids = $request->kids == "" ? 0 : $request->kids;
        $row->reference = $request->reference == "" ? 4 : $request->reference;
        $row->area = $request->area == "" ? 0 : $request->area;
        $row->token = strtotime(date("Y-m-d"));
        $row->dob = $request->dob == "" ? "0000-00-00" : $request->dob;
        $row->anniversary_date = $request->anniversary_date == "" ? "0000-00-00" : $request->anniversary_date;
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('customers');
    }

    public function destroy($id = null)
    {
        $row = Customer::find($id);
        $row->delete();

        echo json_encode(array("status" => 1));
        exit;
    }
}
