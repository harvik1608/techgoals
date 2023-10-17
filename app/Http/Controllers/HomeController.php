<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array();
        for($i = 1; $i <= 12; $i ++) {
            $count = Customer::whereMonth('created_at',$i)->count();
            $data[] = $count;
        }
        $data = json_encode($data);
        return view('dashboard',compact('data'));
    }
}
