@extends('back.layouts.master')
@section('title', 'Settings')

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Settings</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('admin.settings')}}">
    @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{Info::Web('general', 'title')}}" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Short Title</label>
                        <input type="text" class="form-control" name="short_title" placeholder="Short Title" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="sidebar_ad">Sidebar AD</label>
                <textarea class="form-control" name="sidebar" cols="30" rows="4" placeholder="Sidebar AD"></textarea>
            </div>
            <div class="form-group">
                <label for="footer_ad">Footer AD</label>
                <textarea class="form-control" name="footer" cols="30" rows="4" placeholder="Footer AD"></textarea>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection