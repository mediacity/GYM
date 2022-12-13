@extends('layouts.master')
@section('title',__('All Payment'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Manual Payment') }}
@endslot
@slot('menu1')
{{ __('Payment') }}
@endslot
@slot('button')
@if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' )
<div class="col-md-4 col-lg-4">
    <a href="{{route('manual.payment.gateway.store')}}" class="float-right btn btn-primary-rgba mr-2"
        data-toggle="modal" data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i>{{ __("Add Manual Payement") }}</a>
    <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
        data-target="#bulk_delete"><i class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
    @endif
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form autocomplete="off" class="form-light" action="{{route('manual.payment.gateway.store')}}"
                        method="POST" novalidate enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="card-title">{{ __('Manual Payement Details:') }}</h1>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-dark">{{ __("Payement Name:") }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control @error('payment_name') is-invalid @enderror"
                                                        placeholder="{{ __("Your Payment Name ") }}" name="payment_name"
                                                        required="">
                                                    @error('payment_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the manual payement name") }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">{{ __("Description: ") }}}<span
                                                        class="text-danger">*</span></label>
                                                <textarea type="text" rows="10" cols="10"
                                                    class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="{{ __("Your Payment Description") }}" name="description"
                                                    required=""></textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter your payment description") }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div
                                                    class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                                                    {!! Form::label('thumbnail', 'Image',['class'=>'required text-dark']) !!} 
                                                     {!! Form::file('thumbnail', ['class' => 'input-file',
                                                    'id'=>'thumbnail']) !!}
                                                    <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="text-dark"
                                                    class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
                                                    <div class="custom-switch">
                                                        {!! Form::checkbox('status', 1,1,
                                                        ['id' => 'switch2', 'class' =>
                                                        'custom-control-input'])
                                                        !!}
                                                        <label class="custom-control-label" for="switch2">Is
                                                            {{ __("Active") }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                            {{ __("Reset") }}</button>
                                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                            {{ __("Create") }}</button>
                                    </div>
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
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Manual Payement Details') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userstable" class="table table-borderd ">
                        <thead>
                            <tr>
                                <th>
                                    <div class="inline">
                                        <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                            value="all" />
                                        <label for="checkboxAll" class="material-checkbox"></label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th>{{ __("Payment Name") }}</th>
                                <th>{{ __("Description") }}</th>
                                <th>{{ __("Image") }}</th>
                                @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' )
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($methods as $key => $method)
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $method->id }} id='checkbox{{ $method->id }}'>
                                        <label for='checkbox{{ $method->id }}' class='material-checkbox'></label>
                                    </div>
                                    <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <div class="delete-icon"></div>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                                                    <p>{{ __("Do you really want to delete selected item names here? This process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('manual.payment.gateway.bulk_delete') }}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$key+1}}</td>
                                <td>{{ucfirst($method -> payment_name) }}</td>
                                <td>{{str_limit($method -> description ,20)}}</td>
                                <td>
                                    @if($method->thumbnail != '')
                                    <img class="margin-right-15 width-height manual-img"
                                        src="{{url('/image/payment/'.$method->thumbnail )}}"
                                        title="{{ucfirst( $method->payment_name ) }}" class="rounded-circle img-fluid">

                                    @else
                                    <img class="margin-right-15 manual-img" title="{{ ucfirst($method->payment_name) }}"
                                        src="{{ Avatar::create(ucfirst($method->payment_name))->toBase64() }}" />
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                    Auth::user()->roles->first()->name == 'Super Admin' )
                                    {!! Form::open(['method' => 'PUT', 'route' =>
                                    ['manual.payment.gateway.status',$method->id]]) !!}
                                    <div class="custom-switch">
                                   {!! Form::checkbox('status', 1, $method->status == 1 ? 1 : 0, ['id'
                                        => 'switch'.$method->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$method->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td><a class="btn btn-xs btn-success-rgba" href="#" data-toggle="modal"
                                        data-target="#exampleModalCenter1{{ $method->id }}"><i
                                            class="feather icon-edit-2" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba btn btn-xs" data-toggle="modal"
                                        data-target="#deleteModal-{{$method->id}}">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal-{{$method->id}}" class="delete-modal modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                                                <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-dark"
                                                    data-dismiss="modal">{{ __("No") }}</button>
                                                {!! Form::open(['method' => 'DESTROY', 'route' =>
                                                ['manual.payment.gateway.delete', $method->id]]) !!}
                                                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <div class="modal fade" id="exampleModalCenter1{{ $method->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form autocomplete="off" class="form-light"
                                                action="{{route('manual.payment.gateway.update',$method['id'])}}"
                                                method="POST" novalidate enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h1 class="card-title">
                                                                    {{ __('Edit Manual Payment Details:') }}</h1>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="text-dark">{{ __("Payment Name:") }} <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text"
                                                                                class="form-control @error('payment_name') is-invalid @enderror"
                                                                                placeholder="{{ __("Your Payment name") }}"
                                                                                name="payment_name" required=""
                                                                                value="{{ $method->payment_name }}">
                                                                            @error('payment_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                            <small class="text-muted"> <i
                                                                                    class="text-dark feather icon-help-circle"></i>
                                                                               {{ __(" Enter your payement name") }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="text-dark">{{ __("Description:") }}
                                                                            <span class="text-danger">*</span></label>
                                                                        <textarea type="text" rows="10" cols="10"
                                                                            class="form-control @error('description') is-invalid @enderror"
                                                                            placeholder="{{ __("Your Payment Description") }}"
                                                                            name="description"
                                                                            required="">{{ $method->description }}</textarea>
                                                                        @error('description')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        <small class="text-muted"> <i
                                                                                class="text-dark feather icon-help-circle"></i>
                                                                            {{ __("Enter your payment description") }} </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="form-group{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                                                                            {!! Form::label('thumbnail',
                                                                            'Image',['class'=>'required

                                                                            text-dark']) !!}

                                                                            {!! Form::file('thumbnail', ['class' =>
                                                                            'input-file',
                                                                            'id'=>'thumbnail']) !!}
                                                                            <small
                                                                                class="text-danger">{{ $errors->first('thumbnail') }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div
                                                                        class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
                                                                        <div class="custom-switch">
                                                                            {!! Form::checkbox('status',
                                                                            1,$method->status == 1 ? 1 : 0, ['id' =>
                                                                            'switch3', 'class' =>
                                                                            'custom-control-input']) !!}
                                                                            <label class="custom-control-label"
                                                                                for="switch3">{{ __("Status") }}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba"><i
                                                                    class="fa fa-ban"></i>
                                                                {{ __("Reset") }}</button>
                                                            <button type="submit" class="btn btn-primary-rgba"><i
                                                                    class="fa fa-check-circle"></i>
                                                                {{ __("Update") }}</button>
                                                        </div>
                                                    </div>
                                                    <div class="clear-both"></div>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Row -->
@endsection
@section('script')
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection