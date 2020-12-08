@extends('back.layouts.master')
@section('title', 'Users List')

@section('master')
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">All User</h3>
        <a href="{{route('back.users.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create User</a>
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
        <td>{{$data->full_name}}</td>
        <td>{{$data->username ?? 'N/A'}}</td>
        <td>{{$data->email ?? 'N/A'}}</td>
        <td>{{$data->mobile_number}}</td>
        <td>
            <div class="dropdown pull-right">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action <i class="fa fa-angle-down"></i>
            </button>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('back.users.show', $data->id)}}"><i class="fa fa-eye text-success"></i> Details</a>
                <a class="dropdown-item" href="{{route('back.users.edit', $data->id)}}"><i class="fa fa-edit text-info"></i> Edit</a>
                <div class="dropdown-item">
                    <form action="{{route('back.users.destroy', $data->id)}}" method="post">
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

@section('footer')
<script>
    $('#dataTable').DataTable({
        order: [[0, "desc"]],
    });
</script>
@endsection
