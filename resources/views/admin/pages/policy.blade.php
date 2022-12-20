@extends('layouts.master')
@section('title',__('Privacy Policy'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Home') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __(' Privacy Policy') }}
@endslot

@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Privacy Policy") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <form action="{{ route('privacy-policy-update')  }}" method="post">
                            @csrf
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title">Title</label> <span class="text-danger">*</span>
                                <input type="text" name="title" value="{{$pages?$pages->title:''}}" class="form-control" placeholder="Enter Title" required>
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Title : Privacy Policy..") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                <label for="detail">Detail</label><span class="text-danger">*</span>
                         
                                <textarea name="detail" id="summernote" cols="30" rows="10" class="form-control" required>{{$pages?$pages->detail:''}}</textarea>
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Details according to Title") }}</small>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Update") }}</button>
                            </div>
                            <div class="clear-both"></div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End row -->
@endsection
