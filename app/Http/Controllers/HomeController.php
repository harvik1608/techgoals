<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\Lender;
use App\Models\Organization;
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

    public function organization()
    {
        $organization = Organization::first();
        $super_admin = User::where('role',1)->first();
        return view('organization',compact('organization','super_admin'));
    }

    public function submit_form1(Request $request)
    {
        $org_favicon = $request->old_org_favicon;
        if($_FILES['org_favicon']['name'] != "") {
            $org_favicon = 'favi_'.time().'.'.$request->org_favicon->extension();  
            $request->org_favicon->move(public_path('uploads/'), $org_favicon);
            if($request->old_org_favicon != "" && file_exists(public_path('uploads/'.$request->old_org_favicon)))
                unlink(public_path('uploads/'.$request->old_org_favicon));
        }
        $org_logo = $request->old_org_logo;
        if($_FILES['org_favicon']['name'] != "") {
            $org_logo = time().'.'.$request->org_logo->extension();  
            $request->org_logo->move(public_path('uploads/'), $org_logo);
            if($request->old_org_logo != "" && file_exists(public_path('uploads/'.$request->old_org_logo)))
                unlink(public_path('uploads/'.$request->old_org_logo));
        }
        $organization = Organization::find($request->organization_id);
        $organization->org_name = $request['org_name'];
        $organization->org_favicon = $org_favicon == "" ? "" : $org_favicon;
        $organization->org_logo = $org_logo == "" ? "" : $org_logo;
        $organization->save();

        return Redirect::to('organization');
    }

    public function submit_form2(Request $request)
    {
        $organization = Organization::find($request->org_id1);
        $organization->address_1 = $request->address_1;
        $organization->address_2 = $request->address_2;
        $organization->city = $request->city;
        $organization->pincode = $request->pincode;
        $organization->state = $request->state;
        $organization->country = $request->country;
        $organization->save();

        return Redirect::to('organization');
    }

    public function submit_form3(Request $request)
    {
        $membership_certificate = $request->old_certificate;
        if($_FILES['membership_certificate']['name'] != "") {
            $membership_certificate = time().'.'.$request->membership_certificate->extension();  
            $request->membership_certificate->move(public_path('uploads/'), $membership_certificate);
            if($request->old_certificate != "" && file_exists(public_path('uploads/'.$request->old_certificate)))
                unlink(public_path('uploads/'.$request->old_certificate));
        }
        $organization = Organization::find($request->form_org3);
        $organization->membership_certificate = $membership_certificate == "" ? "" : $membership_certificate;
        $organization->save();

        return Redirect::to('organization');
    }

    public function submit_form4(Request $request)
    {
        $credit_institution = $request->old_certificate;
        if($_FILES['credit_institution']['name'] != "") {
            $credit_institution = time().'.'.$request->credit_institution->extension();  
            $request->credit_institution->move(public_path('uploads/'), $credit_institution);
            if($request->old_credit_institution != "" && file_exists(public_path('uploads/'.$request->old_credit_institution)))
                unlink(public_path('uploads/'.$request->old_credit_institution));
        }
        $organization = Organization::find($request->form_org4);
        $organization->credit_institution = $credit_institution == "" ? "" : $credit_institution;
        $organization->save();

        return Redirect::to('organization');
    }

    // public function submit_form5(Request $request)
    // {
    //     $credit_institution = $request->old_certificate;
    //     if($_FILES['credit_institution']['name'] != "") {
    //         $credit_institution = time().'.'.$request->credit_institution->extension();  
    //         $request->credit_institution->move(public_path('uploads/'), $credit_institution);
    //         if($request->old_credit_institution != "" && file_exists(public_path('uploads/'.$request->old_credit_institution)))
    //             unlink(public_path('uploads/'.$request->old_credit_institution));
    //     }
    //     $organization = Organization::find($request->form_org4);
    //     $organization->credit_institution = $credit_institution == "" ? "" : $credit_institution;
    //     $organization->save();

    //     return Redirect::to('organization');
    // }

    public function submit_form5(Request $request)
    {
        $authorization_certificate = $request->old_authorization_certificate;
        if($_FILES['authorization_certificate']['name'] != "") {
            $authorization_certificate = time().'.'.$request->authorization_certificate->extension();  
            $request->authorization_certificate->move(public_path('uploads/'), $authorization_certificate);
            if($request->old_authorization_certificate != "" && file_exists(public_path('uploads/'.$request->old_authorization_certificate)))
                unlink(public_path('uploads/'.$request->old_authorization_certificate));
        }
        $organization = Organization::find($request->form_org5);
        $organization->authorization_certificate = $authorization_certificate == "" ? "" : $authorization_certificate;
        $organization->save();

        return Redirect::to('organization');
    }

    public function remove_membership_certificate($id,$org_id = 1)
    {
        switch($id){
            case 1:
                $organization = Organization::find($org_id);
                $organization->membership_certificate = "";
                $organization->save();
                break;
            case 2:
                $organization = Organization::find($org_id);
                $organization->credit_institution = "";
                $organization->save();
                break;
            case 3:
                $organization = Organization::find($org_id);
                $organization->authorization_certificate = "";
                $organization->save();
                break;
        }
        return Redirect::to('organization');
    }

    public function submit_locale(Request $request)
    {
        $organization = Organization::find($request->orgId);
        $organization->currency = $request->currency == "" ? "" : $request->currency;
        $organization->timezone = $request->timezone == "" ? "" : $request->timezone;
        $organization->save();

        return Redirect::to('organization');
    }
}
