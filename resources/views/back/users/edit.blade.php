@extends('back.layouts.master')
@section('title', 'Edit User - ' . $data->full_name)

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
        <a href="{{route('back.users.index')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-list"></i> All User</a>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('back.users.update', $data->id)}}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="type" value="info">

        <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name*</label>
                    <input name="first_name" type="text" class="form-control" placeholder="First Name" value="{{old('first_name') ?? $data->first_name}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name*</label>
                    <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="{{old('last_name') ?? $data->last_name}}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mobile Number*</label>
                    <input name="mobile_number" type="number" class="form-control" placeholder="Mobile Number" value="{{old('mobile_number') ?? $data->mobile_number}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email address*</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{old('email') ?? $data->email}}" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Address</label>
            <input name="address" type="text" class="form-control" placeholder="Address" value="{{old('address') ?? $data->address}}">
        </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <br>
        <small><b>NB: *</b> marked are required field.</small>
        </div>
    </form>
</div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Change password</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('back.users.update', $data->id)}}">
        @csrf
        @method('PATCH')
        <input type="hidden" name="type" value="password">

        <div class="box-body">
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
        </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
    </form>
</div>
@endsection

@section('head')
    <!-- Select 2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    @endsection

    @section('footer')
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <script>
    // Select2
    $('.selectpicker').selectpicker();
    </script>
@endsection
