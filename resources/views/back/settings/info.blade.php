@extends('back.layouts.master')
@section('title', 'Info Setting')

@section('master')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Info Settings</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{route('back.info')}}" enctype="multipart/form-data">
        @csrf

        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title') ?? __('info.title')}}" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Short Title</label>
                        <input type="text" class="form-control" name="short_title" placeholder="Short Title" value="{{old('short_title') ?? __('info.short_title')}}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Slogan</label>
                <input type="text" class="form-control" name="slogan" placeholder="Slogan" value="{{old('slogan') ?? __('info.slogan')}}" required>
            </div>
            <div class="form-group">
                <label>Web URL</label>
                <input type="text" class="form-control" name="web_url" placeholder="Web URL" value="{{old('web_url') ?? __('info.web_url')}}" required>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{old('email') ?? __('info.email')}}" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" value="{{old('mobile') ?? __('info.mobile')}}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address') ?? __('info.address')}}" required>
            </div>
            <div class="form-group">
                <label>Copyright</label>
                <input type="text" class="form-control" name="copyright" placeholder="Copyright" value="{{old('copyright') ?? __('info.copyright')}}" required>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{__('info.logo')}}" class="small">
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" accept="image/*">
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{__('info.favicon')}}" class="small">
                    <div class="form-group">
                        <label>Favicon</label>
                        <input type="file" name="favicon" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Website Primary Color</label>
                        <input type="text" class="form-control" name="primary_color" placeholder="Website Primary Color" value="{{old('primary_color') ?? Info::web('general', 'primary_color')}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Website Secondary Color</label>
                        <input type="text" class="form-control" name="secondary_color" placeholder="Website Secondary Color" value="{{old('secondary_color') ?? Info::web('general', 'secondary_color')}}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Website Background Color</label>
                        <input type="text" class="form-control" name="background_color" placeholder="Website Background Color" value="{{old('background_color') ?? Info::web('general', 'background_color')}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Custom head code</label>
                <textarea name="custom_head_code" class="form-control" cols="30" rows="7">{{Info::web('general', 'custom_head_code')}}</textarea>
            </div>

            <div class="form-group">
                <label>Custom body code</label>
                <textarea name="custom_body_code" class="form-control" cols="30" rows="7">{{Info::web('general', 'custom_body_code')}}</textarea>
            </div>

            <div class="form-group">
                <label>Custom footer code</label>
                <textarea name="custom_footer_code" class="form-control" cols="30" rows="7">{{Info::web('general', 'custom_footer_code')}}</textarea>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                </div>
            </div> --}}
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
