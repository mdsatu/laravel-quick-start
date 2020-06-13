@extends('back.layouts.master')
@section('title', 'Create Admin')

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create new admin</h3>
        <a href="{{route('admin.admins')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-list"></i> Admin List</a>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('admin.adminCreate')}}">
    @csrf
        <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name*</label>
                    <input name="first_name" type="text" class="form-control" placeholder="First Name" value="{{old('first_name')}}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name*</label>
                    <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{old('last_name')}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Title*</label>
            <input name="title" type="text" class="form-control" placeholder="Title" value="{{old('title')}}" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number*</label>
            <input name="mobile_number" type="number" class="form-control" id="mobile" placeholder="Mobile Number" value="{{old('mobile_number')}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label>Select Role*</label>
            <select name="role[]" class="form-control selectpicker" multiple required>
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control" placeholder="Address" value="{{old('address')}}">
        </div>
        <div class="form-group">
            <label>Small Information</label>
            <textarea name="bio" id="" cols="30" rows="5" class="form-control" placeholder="Small Information">{{old('bio')}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password*</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword2">Confirm Password*</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" required>
        </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <small><b>NB: *</b> marked are required field.</small>
        </div>
    </form>
</div>
@endsection

@section('head')
<!-- Bootstrap-select -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection

@section('footer')
<!-- Bootstrap-select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script>
// Bootstrap-select
$('.selectpicker').selectpicker();
</script>
@endsection