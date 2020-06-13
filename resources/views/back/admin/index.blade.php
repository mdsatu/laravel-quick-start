@extends('back.layouts.master')
@section('title', 'Admins List')

@section('master')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">All Admins</h3>
        <a href="{{route('admin.adminCreate')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create Admin</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="dataTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($q as $data)
        <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->Name()}}</td>
        <td>{{$data->title}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->mobile_number}}</td>
        <td>
        @foreach($data->Roles as $role)
        {{$role->title}},
        @endforeach
        </td>
        <td>
            <a href="{{route('admin.adminEdit', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
            ||
            <a href="{{route('admin.adminDestroy', $data->id)}}" class="btn btn-danger btn-sm dc"><i class="fa fa-trash"></i> Delete</a>
        </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Roles</th>
            <th>Action</th>
        </tr>
        </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

@section('head')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('footer')
<!-- DataTables -->
<script src="{{asset('back/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $('#dataTable').DataTable({
        order: [[0, "desc"]],
    });
</script>
@endsection