<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Lender;
use Redirect;

class LenderController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('lender/list');
    }

    public function load(Request $request)
    {
        $start     = $request['start'];
        $no_of_rec = $request['length'];

        $records = [];
        $lenders = Lender::orderBy('id','desc')->get();
        if($lenders) {
            foreach($lenders as $key => $val) {
                $records[] = $val;
            }
        }
        $data['records'] = $records;
        $total_rec = count($lenders);
        $data['iDisplayStart'] = $start;

        $b_data = array();
        if($records) {
            foreach($records as $key => $row) {
                $action = "";
                $action .= '<a class="btn btn-sm btn-warning" href="'.url('lenders/'.$row['id'].'/edit').'">Edit</a>&nbsp;';
                $action .= '<a class="btn btn-sm btn-danger" href="javascript:;" onclick=remove_row("'.url('lenders/'.$row['id']).'")>Delete</a>';
                if($row['logo'] == "") {
                    $logo = '<img src="'.url('uploads/default.png').'" style="width: 75px;height: 75px;border-radius: 100%;" class="img img-responsive" />';
                } else {
                    $logo = '<img src="'.url('uploads/lender/'.$row['logo']).'" style="width: 75px;height: 75px;border-radius: 100%;" class="img img-responsive" />';
                }
                
                $i = 0;
                $b_data[$key]['DT_RowId'] = "row_".$row['id'];
                $b_data[$key][$i++] = $data['iDisplayStart'] + ($key +1);
                $b_data[$key][$i++] = $logo;
                $b_data[$key][$i++] = $row['name'];
                $b_data[$key][$i++] = $action;
            }
        }
        if(count($lenders) > 0) {
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
        $lender = array();
        return view('lender/add_edit',compact('lender'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $logo = "";
        if($_FILES['logo']['name'] != "") {
            $logo = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('uploads/lender/'), $logo);
        }
        $row = new Lender;
        $row->name = $request->name;
        $row->logo = $logo;
        $row->app_url = $request->app_url == "" ? "" : $request->app_url;
        $row->created_by = auth()->user()->id;
        $row->updated_by = auth()->user()->id;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('lenders');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $lender = Lender::find($id);
            if($lender){
                return view('lender/add_edit',compact('lender'));
            } else
                return Redirect::to('lenders');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $logo = $request->old_logo;
        if($_FILES['logo']['name'] != "") {
            $logo = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('uploads/lender/'), $logo);
            if($request->old_logo != "" && file_exists(public_path('uploads/lender/'.$request->old_logo)))
                unlink(public_path('uploads/lender/'.$request->old_logo));
        }
        $row = Lender::find($id);
        $row->name = $request->name;
        $row->logo = $logo;
        $row->app_url = $request->app_url == "" ? "" : $request->app_url;
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('lenders');
    }

    public function destroy($id = null)
    {
        $row = Lender::find($id);
        $logo = $row['logo'];
        $row->delete();

        if($logo != "" && file_exists(public_path('uploads/lender/'.$logo)))
            unlink(public_path('uploads/lender/'.$logo));

        echo json_encode(array("status" => 1));
        exit;
    }
}
