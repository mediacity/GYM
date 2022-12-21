@extends('layouts.master')
@section('title',__('Create Slider'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-8">
                <h4 class="page-title">{{ __("Slider") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Create Slider') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-4">
                <div class="top-btn-block  text-right">
                    <a href="{{route('slider.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">{{ __("Create New Slider") }}</h5>
                </div>
                <div class="card-body">
                    <div class="box-body">
                        <form action="{{ route('slider.store') }}" class="form" method="POST" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Image") }}<span
                                                class="text-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image"
                                                aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">{{ __("Choose file") }}</label>
                                        </div>
                                    </div>
                                    <div class="display-none form-group" id="url_box" style="display:none;">
                                        <label>{{ __("Enter URL:") }}</label>
                                        <input type="url" id="url" name="url" class="form-control"
                                            placeholder="{{ __("http://www.") }}">
                                    </div>
                                    <div class="display-none form-group" id="cat_id" style="display:none;">
                                        <label>{{ __("Enter Channel Name:") }}</label>
                                        <input type="text" id="cat" name="cat" class="form-control"
                                            placeholder="{{ __("Channel Name") }}">
                                    </div>
                                    <div class="display-none form-group" id="pro_id" style="display:none;">
                                        <label>{{ __("Enter Product Name:") }}</label>
                                        <input type="text" id="pro" name="pro" class="form-control"
                                            placeholder="{{ __("Product Name") }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                    <label>{{ __("Slider Top Heading:") }}</label><span
                                                    class="text-danger">*</span>
                                                <input name="heading" type="text" value=""
                                                    placeholder="{{ __("Enter top heading") }}" class="form-control"
                                                    required />

                                            </div>
                                            <div class="col-md-4">
                                                <label for="">{{ __("Text Color:") }}</label>
                                                <input class="form-control" type="color" value=""
                                                    name="headingtextcolor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>{{ __("Slider Sub Heading:") }}</label>
                                                <input name="subheading" type="text" value=""
                                                    placeholder="{{ __("Enter Sub heading") }}" class="form-control" />
                                            </div>

                                            <div class="col-md-4">
                                                <label for="">{{ __("Text Color:") }}</label>
                                                <input class="form-control" type="color" value=""
                                                    name="subheadingcolor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} ">
                                        {!! Form::checkbox('status', 1,1, ['id' => 'status', 'class' => 'tgl
                                        tgl-skewed']) !!}
                                        <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active"
                                            for="status"></label>
                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger-rgba"><i
                                                class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                        <button type="submit" class="btn btn-primary-rgba"><i
                                                class="fa fa-check-circle"></i>
                                            {{ __("Create") }}</button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <label for="link_by">{{ __("Image Preview:") }}</label>
                                    <br><br>
                                    <div>
                                        <img src="https://mediacity.co.in/emart/demo/public/images/sliderpreview.png"
                                            class="img-fluid" id="slider_preview"  title="Image Preview"
                                            align="center">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>
            <!-- /.content-wrapper -->
@endsection
@section('scripts')
<script>
    $("#image").on('change', function () {
        readURL1(this);
    });

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#slider_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#link_by').on('change', function () {

        var v = $(this).val();
        if (v == 'url') {
            $('#url_box').show();

            $('#url').attr('required', '');
        } else if (v == 'cat') {
            $('#cat_id').show();
            $('#url_box').hide();
            $('#cat').attr('required', '');
        } else if (v == 'pro') {
            $('#pro_id').show();
            $('#url_box').hide();
            $('#cat_id').hide();
            $('#pro').attr('required', '');
        } else {

            $('#url_box').hide();
            $('#cat_id').hide();
            $('#pro_id').hide();
            $('#pro').removeAttr('required');
            $('#cat').removeAttr('required');

            $('#url').removeAttr('required');
        }
    });
</script>
<link type="text/css" rel="stylesheet"
    href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
@endsection
            