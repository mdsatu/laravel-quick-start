@extends('back.layouts.master')
@section('title', 'Admins List')

@section('master')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">All Admins</h3>
        <a href="{{route('back.admins.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create Admin</a>
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
        <td class="pull-right">
            <div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <i class="fa fa-angle-down"></i>
            </button>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('back.admins.show', $data->id)}}"><i class="fa fa-eye text-success"></i> Details</a>
                <a class="dropdown-item" href="{{route('back.admins.edit', $data->id)}}"><i class="fa fa-edit text-info"></i> Edit</a>
                <div class="dropdown-item">
                    <form action="{{route('back.admins.destroy', $data->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="dc"><i class="fa fa-trash text-danger"></i> Delete</button>
                    </form>
                </div>
            </div>
            </div>
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

@section('footer')
<script>
    $('#dataTable').DataTable({
        order: [[0, "desc"]],
    });
</script>
@endsection

