@extends('layouts.master')
@section('title',__('Affilates'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Affilates') }}
@endslot
@slot('menu1')
{{ __('Affilates') }}
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Affilates') }}</h5>
                </div> 
                <div class="card-body">
                    <form class="form" action="{{ route('save.affilates.update') }}" method="POST" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="text-dark">{{ __('Refferal_ID Length:') }}</label>
                            <input name="ref_id" autofocus="" type="number" min="4"  class="form-control"  placeholder="{{ __("Please enter Refferal id Limit") }}" required="" value="{{ $affilates ? $affilates->ref_id : "" }}">
                            <div class="invalid-feedback">
                                {{ __('Please Enter Refferal id Limit') }}.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __('Point per refferal:') }}</label>
                            <input name="per_referral" autofocus="" type="number" step="any"  class="form-control" placeholder="{{ __("Enter Referral for per Point") }}" value="{{ $affilates ? $affilates->per_referral : "" }}">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __('Minimum Readme :') }}</label>
                            <input name="min_readme" autofocus="" type="number" class="form-control" placeholder="{{ __("Enter minimum point readme") }}" value="{{ $affilates ? $affilates->min_readme : "" }}">
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
                            <div class="custom-switch">
                                {!! Form::checkbox('status', 1,$affilates->status==1 ? 1 : 0, ['id' =>
                                'switch1', 'class' => 'custom-control-input']) !!}
                                <label class="custom-control-label" for="switch1">{{ __('Is Active') }}</label>
                            </div>
                        </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>{{ __('Reset') }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save"></i>
                                    {{ __('Save') }}</button>
                            </div>          
                          </form>
                </div> 
            </div>
        </div>
@endsection