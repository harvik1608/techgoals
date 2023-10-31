<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pipeline_type;
use Redirect;

class PipelineTypeController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pipeline_type/list');
    }

    public function load(Request $request)
    {
        $start     = $request['start'];
        $no_of_rec = $request['length'];

        $records = [];
        $lenders = Pipeline_type::orderBy('id','desc')->get();
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
                $action .= '<a class="btn btn-sm btn-warning" href="'.url('pipeline_types/'.$row['id'].'/edit').'">Edit</a>&nbsp;';
                $action .= '<a class="btn btn-sm btn-danger" href="javascript:;" onclick=remove_row("'.url('pipeline_types/'.$row['id']).'")>Delete</a>';
                
                $i = 0;
                $b_data[$key]['DT_RowId'] = "row_".$row['id'];
                $b_data[$key][$i++] = $data['iDisplayStart'] + ($key +1);
                $b_data[$key][$i++] = $row['name'];
                $b_data[$key][$i++] = $row['is_active'] == 1 ? "Active" : "Inactive";
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
        $pipeline_type = array();
        return view('pipeline_type/add_edit',compact('pipeline_type'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $row = new Pipeline_type;
        $row->name = $request->name;
        $row->is_active = $request->is_active;
        $row->created_by = auth()->user()->id;
        $row->updated_by = auth()->user()->id;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('pipeline_types');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $pipeline_type = Pipeline_type::find($id);
            if($pipeline_type){
                return view('pipeline_type/add_edit',compact('pipeline_type'));
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
        $row = Pipeline_type::find($id);
        $row->name = $request->name;
        $row->is_active = $request->is_active;
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('pipeline_types');
    }

    public function destroy($id = null)
    {
        $row = Pipeline_type::find($id);
        $row->delete();

        echo json_encode(array("status" => 1));
        exit;
    }
}
