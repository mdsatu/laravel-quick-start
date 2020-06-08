@extends('back.layouts.master')
@section('title', 'Admins List')

@section('head')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('back/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('master')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">All Admins</h3>
        <a href="{{route('admin.createAdmin')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create Admin</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
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
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->mobile_number}}</td>
        <td>
        @foreach($data->Role as $role)
        {{$role->title}},
        @endforeach
        </td>
        <td>
            <a href="{{route('admin.editAdmin', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
            ||
            <a href="{{route('admin.deleteAdmin', $data->id)}}" class="btn btn-danger btn-sm dc"><i class="fa fa-trash"></i> Delete</a>
        </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
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

@section('footer')
<!-- DataTables -->
<script src="{{asset('back/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $('#example2').DataTable({
        order: [[0, "desc"]],
    });
</script>
@endsection