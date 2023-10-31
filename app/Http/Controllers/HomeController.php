<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\Lender;
use Redirect;

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
        $lenders = Lender::orderBy('name','asc')->get();
        return view('dashboard',compact('lenders'));
    }

    public function edit_profile()
    {
        $profile = User::find(auth()->user()->id);
        if($profile['avatar'] == "")
            $profile['avatar'] = asset('uploads/default.png');
        else 
            $profile['avatar'] = asset('uploads/user/'.$profile['avatar']);

        return view('profile',compact('profile'));
    }

    public function update_profile(Request $request)
    {
        $avatar = $request->old_avatar;
        if($_FILES['avatar']['name'] != "") {
            $avatar = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('uploads/user/'), $avatar);
            if($request->old_avatar != "" && file_exists(public_path('uploads/user/'.$request->old_avatar)))
                unlink(public_path('uploads/user/'.$request->old_avatar));
        }
        $row = User::find(auth()->user()->id);
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $row->country = $request->country;
        $row->state = $request->state;
        $row->city = $request->city;
        $row->address = $request->address;
        $row->avatar = $avatar;
        $row->updated_by = auth()->user()->id;
        $row->updated_at = format_date(1);
        $row->save();

        return Redirect::to('edit-profile');
    }

    public function change_password()
    {
        return view('change_password');
    }

    public function submit_change_password(Request $request)
    {
        $validatedData = $request->validate([
            'opassword' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ],[
            'opassword' => 'Old Password is required',
            'password.required' => 'New Password is required',
            'password.min' => 'Min. 8 characters required',
            'password.confirmed' => 'New Password & Confirm Password must be same',
            'password_confirmation' => 'Confirm Password is required',
        ]);
        $row = User::find(auth()->user()->id);
        $row->password = Hash::make($request['password']);
        $row->save();

        return Redirect::to('change-password');
    }

    public function edit_settings()
    {
        $settings = Setting::orderBy('id','desc')->get();
        $setting = array();
        foreach($settings as $key => $val) {
            $setting[$val['setting_key']] = $val['setting_val'];
        }
        return view('edit_settings',compact('setting'));
    }

    public function update_settings(Request $request)
    {
        $logo = $request->old_app_logo;
        if($_FILES['app_logo']['name'] != "") {
            $logo = time().'.'.$request->app_logo->extension();  
            $request->app_logo->move(public_path('uploads/'), $logo);
            if($request->old_app_logo != "" && file_exists(public_path('uploads/'.$request->old_app_logo)))
                unlink(public_path('uploads/'.$request->old_app_logo));
        }
        Setting::truncate();
        
        $data = [];
        foreach($_POST as $key => $val) {
            $data[] = array("setting_key" => $key,"setting_val" => $val == "" ? "" : $val);
        }
        $data[] = array("setting_key" => "app_logo","setting_val" => $logo);
        Setting::insert($data);

        return Redirect::to('edit-settings');
    }
}
