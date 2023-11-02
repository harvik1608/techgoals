@extends('layouts.header')
@section('content')
@php
    $name = "";
    $logo = "";
@endphp
<style>
    .crm-p-image {
        top: 105px;
    }
</style>
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <form method="post" action="{{ route('submit-form1') }}" id="Form1" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="organization_id" value="{{ $organization->id }}" />
                        <input type="hidden" name="old_org_favicon" value="{{ $organization->org_favicon }}" />
                        <input type="hidden" name="old_org_logo" value="{{ $organization->org_logo }}" />
                        @if($name != "")
                            <input type="hidden" name="_method" value="put">
                        @endif
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">LSP Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">LSP Name*</label>
                                    <input type="text" class="form-control" id="org_name" name="org_name" value="{{ $organization->org_name }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <div class="profile-img-edit">
                                            <p>Organization Favicon</p>
                                            <div class="crm-profile-img-edit">
                                                <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/'.$organization->org_favicon) }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                <div class="crm-p-image bg-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="image_upload('org_favicon')">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <input class="file-upload" type="file" accept="image/*" id="org_favicon" name="org_favicon" />
                                                    <input type="hidden" name="old_app_logo" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <div class="profile-img-edit">
                                            <p>Organization Logo</p>
                                            <div class="crm-profile-img-edit">
                                                <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/'.$organization->org_logo) }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                <div class="crm-p-image bg-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="image_upload('org_logo')">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <input class="file-upload" type="file" accept="image/*" id="org_logo" name="org_logo" />
                                                    <input type="hidden" name="old_app_logo" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="post" action="{{ route('submit-form2') }}" id="Form1" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="org_id1" value="{{ $organization->id }}" />
                        @if($name != "")
                            <input type="hidden" name="_method" value="put">
                        @endif
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Basic Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Address Line 1*</label>
                                    <input type="text" class="form-control" id="address_1" name="address_1" value="{{ $organization->address_1 }}" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Address Line 2*</label>
                                    <input type="text" class="form-control" id="address_2" name="address_2" value="{{ $organization->address_2 }}" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault01">City*</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $organization->city }}" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault01">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{ $organization->pincode }}" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault01">State</label>
                                    <input type="text" class="form-control" id="state" name="state" value="{{ $organization->state }}" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationDefault01">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ $organization->country }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="post" action="" id="Form2" enctype="multipart/form-data">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Authorized Super Admin User</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Authorized Super Admin Full Name</label>
                                    <input type="text" class="form-control" id="address_1" name="address_1" value="{{ $super_admin->name }}" disabled />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Authorized Super Admin Email</label>
                                    <input type="text" class="form-control" id="address_2" name="address_2" value="{{ $super_admin->email }}" disabled />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Authorized Super Admin Mobile</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $super_admin->phone }}" disabled />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="post" action="{{ route('submit-form3') }}" id="Form1" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form_org3" value="{{ $organization->id }}">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <div class="profile-img-edit">
                                            <p>Bureau Membership Certificate</p>
                                            <div class="crm-profile-img-edit">
                                                @if($organization->membership_certificate == "")
                                                    <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/default_org.png') }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                @else
                                                    <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/'.$organization->membership_certificate) }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                @endif
                                                <div class="crm-p-image bg-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="image_upload('membership_certificate')">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <input class="file-upload" type="file" accept="image/*" id="membership_certificate" name="membership_certificate" />
                                                    <input type="hidden" name="old_certificate" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Upload</button>
                                <a class="btn btn-danger" href="{{ url('remove-membership-certificate/1') }}" onclick="return confirm('Are you sure to remove this?')">Remove</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="post" action="{{ route('submit-form4') }}" id="Form1" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form_org4" value="{{ $organization->id }}" />
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <div class="profile-img-edit">
                                            <p>Document Validating Credit Institution</p>
                                            <div class="crm-profile-img-edit">
                                                @if($organization->credit_institution == "")
                                                    <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/default_org.png') }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                @else
                                                    <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/'.$organization->credit_institution) }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                @endif
                                                <div class="crm-p-image bg-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="image_upload('credit_institution')">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <input class="file-upload" type="file" accept="image/*" id="credit_institution" name="credit_institution" />
                                                    <input type="hidden" name="old_credit_institution" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Upload</button>
                                <a class="btn btn-danger" href="{{ url('remove-membership-certificate/2') }}" onclick="return confirm('Are you sure to remove this?')">Remove</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form method="post" action="{{ route('submit-form5') }}" id="Form1" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form_org5" value="{{ $organization->id }}" />
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <div class="profile-img-edit">
                                            <p>Authorization Certificate for Super Admin User</p>
                                            <div class="crm-profile-img-edit">
                                                @if($organization->authorization_certificate == "")
                                                    <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/default_org.png') }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                @else
                                                    <img class="crm-profile-pic rounded-circle avatar-100" src="{{ asset('uploads/'.$organization->authorization_certificate) }}" alt="profile-pic" style="border: 2px solid #efefef;">
                                                @endif
                                                <div class="crm-p-image bg-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="image_upload('authorization_certificate')">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    <input class="file-upload" type="file" accept="image/*" id="authorization_certificate" name="authorization_certificate" />
                                                    <input type="hidden" name="old_authorization_certificate" value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Upload</button>
                                <a class="btn btn-danger" href="{{ url('remove-membership-certificate/3') }}" onclick="return confirm('Are you sure to remove this?')">Remove</a>
                            </div>
                        </div>
                    </form>
                </div>
                 <div class="card">
                    <form method="post" action="{{ route('submit-locale') }}" id="Form1" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="orgId" value="{{ $organization->id }}" />
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Locale  Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Currency</label>
                                    <input type="text" class="form-control" id="currency" name="currency" value="{{ $organization->currency }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Time Zone</label>
                                    <input type="text" class="form-control" id="timezone" name="timezone" value="{{ $organization->timezone }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/js/additional_methods.js') }}"></script>
<script type="text/javascript">
    var page_title = "Organization";
    function image_upload(element)
    {
        $("#"+element).trigger("click");
    }
</script>
@endsection
