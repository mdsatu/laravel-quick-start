@extends('back.layouts.master')
@section('title', 'My Profile')

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Profile Information</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="{{route('admin.profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="action" value="information">
            <div class="form-group">
                <label for="name">Name*</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{old('name') ?? auth('admin')->user()->name}}" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{old('email') ?? auth('admin')->user()->email}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number*</label>
                        <input name="mobile_number" type="text" class="form-control" id="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number') ?? auth('admin')->user()->mobile_number}}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" class="form-control" placeholder="Address" value="{{old('address') ?? auth('admin')->user()->address}}">
            </div>

            <div class="form-group">
                <label>Short Information</label>
                <textarea name="bio" class="form-control" cols="30" rows="4">{{old('bio') ?? auth('admin')->user()->bio}}</textarea>
            </div>
            @if(auth('admin')->user()->image)
            <img src="{{asset('uploads/admin/' . auth('admin')->user()->image)}}" class="small">
            @endif
            <div class="form-group">
                <label for="image">Profile Picture</label>
                <input type="file" id="image" name="image" accept="image/*">
                <small><b>NB:</b> Best size for image are 120px height and 120px width.</small>
            </div>

            <button type="submit" class="btn btn-info">Update</button>
            <br>
            <small><b>NB: *</b> marked are required field.</small>
        </form>
    </div>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Change Password</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="{{route('admin.profile')}}" method="post">
            @csrf
            <input type="hidden" name="action" value="password">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">New Password*</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password*</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info">Change Password</button>
        </form>
    </div>
</div>
@endsection