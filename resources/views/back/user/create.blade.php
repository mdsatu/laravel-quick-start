@extends('back.layouts.master')
@section('title', 'Create User')

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create new user</h3>
        <a href="{{route('admin.users')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-list"></i> Users List</a>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('admin.createUser')}}">
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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mobile">Mobile Number*</label>
                    <input name="mobile_number" type="number" class="form-control" id="mobile" placeholder="Mobile Number" value="{{old('mobile_number')}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address*</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{old('email')}}" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control" placeholder="Address" value="{{old('address')}}">
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