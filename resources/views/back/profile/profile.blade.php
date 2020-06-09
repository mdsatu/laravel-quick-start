@extends('back.layouts.master')
@section('title', 'My Profile')

@section('master')
<div class="row">
<div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{auth('admin')->user()->image ? asset('uploads/admin/' . auth('admin')->user()->image) : asset('img/user-img.png')}}" alt="{{auth('admin')->user()->name}}">

        <h3 class="profile-username text-center">{{auth('admin')->user()->name}}</h3>
        <p class="text-muted text-center">{{auth('admin')->user()->title}}</p>

        <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
            <b>Products</b> <a class="pull-right">0</a>
        </li>
        <li class="list-group-item">
            <b>Articles</b> <a class="pull-right">0</a>
        </li>
        <li class="list-group-item">
            <b>Followers</b> <a class="pull-right">0</a>
        </li>
        </ul>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#Information" data-toggle="tab">Information</a></li>
        <li><a href="#password" data-toggle="tab">Change Password</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="Information">
        <form class="form-horizontal" action="{{route('admin.profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="action" value="information">

            <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Name*</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{old('name') ?? auth('admin')->user()->name}}" required>
            </div>
            </div>
            <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email*</label>

            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{old('email') ?? auth('admin')->user()->email}}" required>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Mobile Number*</label>

            <div class="col-sm-10">
                <input type="number" class="form-control" placeholder="Mobile Number" name="mobile_number" value="{{old('mobile_number') ?? auth('admin')->user()->mobile_number}}" required>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address') ?? auth('admin')->user()->address}}">
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">About You</label>

            <div class="col-sm-10">
                <textarea class="form-control" placeholder="About You" name="bio">{{old('bio') ?? auth('admin')->user()->bio}}</textarea>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Change Picture</label>

            <div class="col-sm-10">
                <input type="file" id="image" name="image" accept="image/*">
                <small><b>NB:</b> Best size for image are 120px height and 120px width.</small>
            </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-block">Update</button>
                <small><b>NB: *</b> marked are required field.</small>
            </div>
            </div>
        </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="password">
        <form class="form-horizontal" action="{{route('admin.profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="action" value="password">

            <div class="form-group">
            <label class="col-sm-2 control-label">New Password*</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="New Password" name="password" required>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label">Confirm Password*</label>

            <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
            </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info btn-block">Change Password</button>
                <small><b>NB: *</b> marked are required field.</small>
            </div>
            </div>
        </form>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
@endsection