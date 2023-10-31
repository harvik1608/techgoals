<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\Plan;
use Redirect;

class PlanController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('plan/list');
    }

    public function load()
    {
        $result = array("data" => []);
        $plans = Plan::orderBy('id','desc')->get();
        foreach($plans as $key => $val)
        {
            $edit_url = url("plans/".$val["id"]."/edit");
            $remove_url = url("plans/".$val["id"]);

            $action = '&nbsp;<a class="btn btn-warning btn-sm" href="'.$edit_url.'" title="Edit"><i class="bi bi-pencil"></i></a>';
            $action .= '&nbsp;<a class="btn btn-danger btn-sm" onclick=remove_row("'.$remove_url.'") title="Remove"><i class="bi bi-trash"></i></a>';

            $result['data'][$key] = array(
                $key+1,
                "<small>".$val['name']."</small>",
                "<small>₹ ".$val['amount']."</small>",
                "<small>".$val['duration']." month(s)</small>",
                "<small>".$val['visit']."</small>",
                $action
            );
        }
        echo json_encode($result);
        exit;  
    }

    public function create()
    {
        $plan = array();
        return view('plan/add_edit',compact('plan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'duration' => 'required',
            'visit' => 'required'
        ],[
            'name.required' => 'Plan Name is required.',
            'amount' => 'Plan Amount is required',
            'duration' => 'Plan Duration is required',
            'visit' => 'Visit is required'
        ]);
        $row = new Plan;
        $row->name = $request->name;
        $row->amount = $request->amount;
        $row->duration = $request->duration;
        $row->visit = $request->visit;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('plans');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $plan = Plan::find($id);
            if($plan){
                return view('plan/add_edit',compact('plan'));
            } else
                return Redirect::to('plans');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'duration' => 'required',
            'visit' => 'required'
        ],[
            'name.required' => 'Plan Name is required.',
            'amount' => 'Plan Amount is required',
            'duration' => 'Plan Duration is required',
            'visit' => 'Visit is required'
        ]);
        $row = Plan::find($id);
        $row->name = $request->name;
        $row->amount = $request->amount;
        $row->duration = $request->duration;
        $row->visit = $request->visit;
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('plans');
    }

    public function destroy($id = null)
    {
        $row = Plan::find($id);
        $row->delete();

        echo json_encode(array("status" => 1));
        exit;
    }
}
