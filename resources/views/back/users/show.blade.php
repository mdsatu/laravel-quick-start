@extends('back.layouts.master')
@section('title', 'User Details - ' . $data->Name())

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <a href="{{route('back.users.index')}}" class="btn btn-success btn-sm pull-right"><i class="fa fa-list"></i> All Users</a>
        <span class="pull-right btn_separator">||</span>
        <a href="{{route('back.users.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create User</a>
        <span class="pull-right btn_separator">||</span>
        <a href="{{route('back.users.edit', $data->id)}}" class="btn btn-info btn-sm pull-right"><i class="fa fa-edit"></i> Edit User</a>
        <span class="pull-right btn_separator">||</span>
        <form action="{{route('back.users.destroy', $data->id)}}" method="post" class="pull-right">
            @method('DELETE')
            @csrf
            <button class="dc btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
        </form>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>First Name:</td>
                <td>{{$data->first_name}}</td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td>{{$data->last_name}}</td>
            </tr>
            <tr>
                <td>Mobile Number:</td>
                <td>{{$data->mobile_number}}</td>
            </tr>
            <tr>
                <td>Email address:</td>
                <td>{{$data->email}}</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>{{$data->address}}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection

@section('head')
<!-- Select 2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">


@section('footer')
<!-- Select 2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<script>
 // Select2
$('.selectpicker').selectpicker();
</script>
@endsection
