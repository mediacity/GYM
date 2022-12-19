@extends('layouts.master')
@section('title',__('Add Diet Content'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Diet Content") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Diet Content') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('dietcontent.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ ("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Form -->
<form class="form-light form" action="{{route('dietcontent.store')}}" method="POST" novalidate>
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <h1 class="card-title">{{ __('Add Contents for your Diet:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">Content: <span class="text-danger">*</span></label>
                                <input value="{{ old('content') }}" autofocus="" type="text"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="{{ __('Enter Content name') }}" name="content" required="">
                                     @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the content which your diet needed eg: Tomato, Rice") }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Quantity: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ old('quantity') }}" autofocus="" type="text"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    placeholder="{{ __('Enter Quantity') }}" name="quantity" required="" pattern="[0-9]+">
                                    @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter the quantity of the content mentioned. For eg: 2 qty") }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Content-->
                 <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Calories: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ old('calories') }}" autofocus="" type="text"
                                    class="form-control @error('calories') is-invalid @enderror"
                                    placeholder="{{ __('Enter Calories') }}" name="calories" required="" pattern="[0-9]+">
                                     @error('calories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the caloriess of the content eg:, 20 kcal") }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Is Active-->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="text-dark"
                                    class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                        'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            {{ __("Create") }}</button>
                    </div>
                </div>
                <div class="clear-both"></div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- End Form -->
@endsection
