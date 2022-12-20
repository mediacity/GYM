@extends('layouts.master')
@section('title',__('Edit Group :eid -',['eid' => $group->id]))
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
{{ __(' Edit Group') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('group.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Edit Group") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($group, ['method' => 'PATCH', 'route' => ['group.update', $group->id],
                            'files' => true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Group Name',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Group Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter a group name: Weight loss, Weight gain") }}
                                </small>
                            </div>
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control' ,'required', 'placeholder'
                                => 'Please Enter Package description']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter details") }}
                                </small>
                            </div>
                            <div class="form-group{{ $errors->has('user id') ? ' has-error' : '' }}">
                                <label class="text-dark" for="user_id">{{ __("User") }}<span
                                        class="text-danger">*</span></label>
                                <select required="" name="user_id[]" id="user_id[]"
                                    class="@error('user_id[]') is-invalid @enderror form-control select2" multiple
                                    plaeholder=" Select users">
                                    <option value="">{{ __("Please select diet session") }}</option>
                                    @foreach(App\user::all() as $user_id)

                                    <option @if($group->user_id != '') @foreach($group->user_id as $user)
                                        {{ $user == $user_id->id ? "selected" : "" }} @endforeach @endif
                                        value="{{ $user_id->id }}"> {{ $user_id->name }} </option>
                                    @endforeach
                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select a user: oster,admin") }}
                                </small>
                            </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$group->is_active==1 ? 1 : 0, ['id' => 'switch1',
                                    'class' => 'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                    {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Update") }}</button>
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
</div>
<!-- End Row -->
@endsection