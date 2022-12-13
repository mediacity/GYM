@extends('layouts.master')
@section('title',__('Edit Diet Content :eid -',['eid' => $dietcontent->id]))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Diet Content') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __(' Edit Diet Content') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('dietcontent.index')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
    </div>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ __('Edit Diet Contents:') }}</h1>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <form action="{{route('dietcontent.update',$dietcontent->id)}}" method="POST"
                                class="form form-light" novalidate>
                                @csrf
                                @method('PUT')
                                <label class="text-dark">{{ __("Diet Content:") }}</label>
                                <input type="text" name="content"
                                    class="form-control @error('content') is-invalid @enderror"
                                    value="{{ $dietcontent->content }}" >
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter the content which your diet needed eg: Tomato, Rice ") }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-dark">{{ __("Quantity:") }}</label>
                            <input type="text" name="quantity"
                                class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ filter_var($dietcontent->quantity )}}" pattern="[0-9]+">
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the quantity of the mentioned content. For eg: 3 Qty;") }}</small>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-dark">{{ __("Calories:") }}</label>
                            <input type="text" name="calories"
                                class="form-control @error('calories') is-invalid @enderror"
                                value="{{ filter_var($dietcontent->calories) }}" pattern="[0-9]+">
                            @error('calories')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the  caloriess of the content eg:, 20 kcal") }}</small>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                    <div class="custom-switch">
                        {!! Form::checkbox('is_active', 1,$dietcontent->is_active==1 ? 1 : 0,
                        ['id' => 'switch1', 'class' => 'custom-control-input']) !!}
                        <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> {{ __("Update") }}</button>
                </div>
            </div>
            <div class="clear-both"></div>
            </form>
        </div>
     </div>
</div>
</div>
</div>
<!-- End Contentbar -->
@endsection
