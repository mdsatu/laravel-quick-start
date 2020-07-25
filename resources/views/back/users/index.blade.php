@extends('back.layouts.master')
@section('title', 'Users List')

@section('master')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">All Users</h3>
        <a href="{{route('back.users.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create Users</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="dataTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($q as $data)
        <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->Name()}}</td>
        <td>{{$data->username ?? 'N/A'}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->mobile_number}}</td>
        <td>
            <a href="{{route('back.users.edit', $data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
            ||
            <form action="{{route('back.users.destroy', $data->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm dc"><i class="fa fa-trash"></i> Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile Number</th>
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
<link rel="stylesheet" href="{{asset('back/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('footer')
<!-- DataTables -->
<script src="{{asset('back/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $('#dataTable').DataTable({
        order: [[0, "desc"]],
    });
</script>
@endsection