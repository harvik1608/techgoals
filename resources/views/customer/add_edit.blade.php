@extends('layouts.header')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    span.select2-selection {
        height: 37px !important;
        border: 2px solid #dee2e6 !important;
    }
</style>
@php
    if($customer) {
        $ptitle = "Edit Customer";
        $action = url("customers/".$customer['id']);
        $btn_title = "Save";

        $name = $customer['name'];
        $phone = $customer['phone'];
        $whatspp_no = $customer['whatspp_no'];
        $email = $customer['email'];
        $kids = $customer['kids'];
        $reference = $customer['reference'];
        $area = $customer['area'];
        $dob = $customer['dob'];
        $anniversary_date = $customer['anniversary_date'];
    } else {
        $ptitle = "Add Customer";
        $action = url("customers");
        $btn_title = "Add";

        $name = "";
        $phone = "";
        $whatspp_no = "";
        $email = "";
        $kids = "";
        $reference = "";
        $area = "";
        $dob = "";
        $anniversary_date = "";
    }
@endphp
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
<div class="app-title">
    <div>
        <h1><i class="bi bi-people"></i> Customers</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-header">
                <h4>{{ $ptitle }}</h4>
            </div><hr>
            <form class="" method="post" action="{{ $action }}" enctype="multipart/form-data" id="empform">
                @csrf
                @if($name != "")
                    <input type="hidden" name="_method" value="PUT" />
                @endif
                <div class="tile-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label">Name*</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $name }}" autofocus />
                            @error('name')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Mobile No.*</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no." value="{{ $phone }}" />
                            @error('phone')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Whatsapp No.* <input type="checkbox" id="same" /><small> (Same as mobile no.)</small></label>
                            <input type="text" class="form-control" name="whatspp_no" id="whatspp_no" placeholder="Enter whatspp no." value="{{ $whatspp_no }}" />
                            @error('whatspp_no')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $email }}" />
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Number of kids at house</label>
                            <select class="form-control" name="kids" id="kids">
                                <option value="">Option</option>
                                <?php
                                    for($i = 1; $i <= 10; $i ++) {
                                        if($i == $kids)
                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                        else 
                                            echo '<option value="'.$i.'">'.$i.'</option>';   
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Reference</label>
                            <select class="form-control" name="reference" id="reference">
                                <option value="">Option</option>
                                <option value="1" <?php echo $reference == 1 ? "selected" : ""; ?>>WOM</option>
                                <option value="2" <?php echo $reference == 2 ? "selected" : ""; ?>>Newspaper</option>
                                <option value="3" <?php echo $reference == 3 ? "selected" : ""; ?>>Social Media</option>
                                <option value="4" <?php echo $reference == 4 ? "selected" : ""; ?>>Old Customer</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label">Area</label>
                            <!-- <input type="text" class="form-control" name="area" id="area" value="{{ $area }}" /> -->
                            <select class="form-control" name="area" id="area">
                                <option value="">Option</option>
                                @if($areas)
                                    @foreach($areas as $key => $val)
                                        @if($val->id == $area)
                                            <option value="{{ $val->id }}" selected>{{ $val->name }}</option>
                                        @else 
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('company_id')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">DOB</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{ $dob }}" max="{{ date('Y-m-d') }}" />
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label">Anniversary Date</label>
                            <input type="date" class="form-control" name="anniversary_date" id="anniversary_date" value="{{ $anniversary_date }}" max="{{ date('Y-m-d') }}" />
                        </div>
                    </div><br>
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-warning btn-sm">SUBMIT</button>
                            <a class="btn btn-danger btn-sm" href="{{ url('customers') }} ">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/js/additional_methods.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    var page_title = "Customers";
    $(document).ready(function(){
        $("#area").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
        $(document).on("click","#same",function(){
            if($("#same").prop("checked")) {
                $("#whatspp_no").val($("#phone").val());
            } else {
                $("#whatspp_no").val("");
            }
        });
        $(document).on("change","#area",function(){
            alert($(this).text());
        });
    });
</script>
@endsection
