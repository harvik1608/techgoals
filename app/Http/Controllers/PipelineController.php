<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pipeline_type;
use App\Models\Stage;
use App\Models\Pipeline;
use Redirect;

class PipelineController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pipelines = Pipeline::select('pipelines.id','pipelines.name','pipelines.created_at','stages.name as stage')
        ->leftJoin('stages', 'stages.id', '=', 'pipelines.stage_id')
        ->where('pipelines.is_active',1)
        ->orderBy('pipelines.id','desc')->get();
        return view('pipeline/list',compact('pipelines'));
    }

    public function create()
    {
        $pipeline = array();
        $pipeline_types = Pipeline_type::select('id','name')->get();
        $stages = Stage::select('id','name')->get();
        return view('pipeline/add_edit',compact('pipeline','pipeline_types','stages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $row = new Pipeline;
        $row->pipeline_type_id = $request->pipeline_type_id;
        $row->name = $request->name;
        $row->stage_id = $request->stage_id;
        $row->description = $request->description != "" ? $request->description : "";
        $row->is_active = $request->is_active;
        $row->created_by = auth()->user()->id;
        $row->updated_by = auth()->user()->id;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('pipelines');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $pipeline = Pipeline::find($id);
            if($pipeline){
                $pipeline_types = Pipeline_type::select('id','name')->get();
                $stages = Stage::select('id','name')->get();
                return view('pipeline/add_edit',compact('pipeline','pipeline_types','stages'));
            } else
                return Redirect::to('pipelines');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Name is required.'
        ]);
        $row = Pipeline::find($id);
        $row->pipeline_type_id = $request->pipeline_type_id;
        $row->name = $request->name;
        $row->stage_id = $request->stage_id;
        $row->description = $request->description != "" ? $request->description : "";
        $row->is_active = $request->is_active;
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('pipelines');
    }

    public function destroy($id = null)
    {
        $row = Pipeline::find($id);
        $row->is_active = 0;
        $row->save();

        echo json_encode(array("status" => 1));
        exit;
    }
}
