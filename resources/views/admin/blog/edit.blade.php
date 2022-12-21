@extends('layouts.master')
@section('title',__('Edit Blog :bid -',['bid' => $blog->title]))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-5">
                <h4 class="page-title">{{ __("Blog") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Edit Blog') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="{{route('blog.index')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">{{ __("Edit Blog") }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="admin-form">
                        {!! Form::model($blog, ['method' => 'PATCH', 'route' => ['blog.update', $blog->id],
                        'files' => true, 'class' => 'form form-light','novalidate']) !!}
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Name:") }}<span
                                            class="text-danger">*</span></label>
                                    <select required="" name="user_id" id="user_id"
                                        class="@error('user_id') is-invalid @enderror form-control select2">
                                        <option value="">{{ __("Select one") }}</option>
                                        @foreach($users as $user)
                                        <option {{ $blog['user_id'] == $user->id ? "selected" : "" }}
                                            value="{{ $user->id }}">
                                            {{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> {{ __("Select your username") }} </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group{{ $errors->has('blog_cat_id') ? ' has-error' : '' }}">
                                    {!! Form::label('blog_cat_id', 'Select Blog Category',['class'=>'required
                                    text-dark']) !!}<span class="text-danger">*</span>
                                    {!! Form::select('blog_cat_id', $blogcategory, null, ['class' => 'form-control
                                    select2','required','placeholder'=>'Select Blog Category']) !!}
                                    <small class="text-danger">{{ $errors->first('blog_cat_id') }}</small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> {{ __("Select your blog category eg : Your Fitness, Body Tips") }} </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {!! Form::label('title', 'Blog Title',['class'=>'required text-dark']) !!}<span
                                        class="text-danger">*</span>
                                    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> {{ __("Enter your Blog Title eg : Sweat and Life ") }}</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                    {!! Form::label('detail', 'Description',['class'=>'required text-dark']) !!}<span
                                        class="text-danger">*</span>
                                    {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Describe your blog' ]) !!}
                                    <small class="text-danger">{{ $errors->first('detail') }}</small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i>
                                        {{ __(" Describe your Blog") }} </small> 
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Image") }}<span
                                            class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Video") }}</label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input" id="video"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,$blog->is_active==1 ? 1 :0, ['id' =>
                                        'switch1', 'class' => 'custom-control-input']) !!}
                                        <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                        {{ __("Reset") }}</button>
                                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                        {{ __("Update") }}</button>
                                </div>                                
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Contentbar -->
@endsection