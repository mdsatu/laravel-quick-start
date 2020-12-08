@extends('back.layouts.master')
@section('title', 'Create User')

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create new user</h3>
        <a href="{{route('back.users.index')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-list"></i> Users List</a>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('back.users.store')}}">
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
                    <label>Mobile Number*</label>
                    <input name="mobile_number" type="number" class="form-control" placeholder="Mobile Number" value="{{old('mobile_number')}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email address</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{old('email')}}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control" placeholder="Address" value="{{old('address')}}">
        </div>
        <div class="form-group">
            <label>Password*</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label>Confirm Password*</label>
            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
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
