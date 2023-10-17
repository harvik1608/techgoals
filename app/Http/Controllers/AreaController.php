<?php

namespace App\Http\Controllers;

use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\Area;
use Redirect;

class AreaController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('area/list');
    }

    public function load()
    {
        $result = array("data" => []);
        $areas = Area::orderBy('id','desc')->get();
        foreach($areas as $key => $val)
        {
            $edit_url = url("areas/".$val["id"]."/edit");
            $remove_url = url("areas/".$val["id"]);

            $action = '&nbsp;<a class="btn btn-warning btn-sm" href="'.$edit_url.'" title="Edit"><i class="bi bi-pencil"></i></a>';
            $action .= '&nbsp;<a class="btn btn-danger btn-sm" onclick=remove_row("'.$remove_url.'") title="Remove"><i class="bi bi-trash"></i></a>';

            $result['data'][$key] = array(
                $key+1,
                "<small>".$val['name']."</small>",
                $action
            );
        }
        echo json_encode($result);
        exit;  
    }

    public function create()
    {
        $area = array();
        return view('area/add_edit',compact('area'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Area Name is required.'
        ]);

        $row = new Area;
        $row->name = $request->name;
        $row->created_at = format_date(1);
        $row->updated_at = format_date(1);
        $row->save();
 
        return Redirect::to('areas');
    }

    public function edit($id = null)
    {
        if(!is_null($id)){
            $area = Area::find($id);
            if($area){
                return view('area/add_edit',compact('area'));
            } else
                return Redirect::to('areas');           
        }
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Area Name is required.'
        ]);

        $row = Area::find($id);
        $row->name = $request->name;
        $row->updated_at = format_date(1);
        $row->save();

        return Redirect::to('areas');
    }

    public function destroy($id = null)
    {
        $row = Area::find($id);
        $row->delete();

        echo json_encode(array("status" => 1));
        exit;
    }
}
