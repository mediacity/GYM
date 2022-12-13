@extends('layouts.master')
@section('title', __('Show Appointment'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Appointment') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Appointment Details') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6 text-right">
    <a href="{{route('appointment.index')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<form autocomplete="off" class="form-light" action="{{route('appointment.show' , $appointment->id)}}" method="POST">
    <div class="card m-b-30">
        <div class="card-body py-5">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <input name="photo" type="file" id="imgupload" class="d-none" />
                    @if($image = @file_get_contents('../public/media/users/'.$appointment->user['photo']))
                    <img @error('photo') is-invalid @enderror
                        src="{{ url('media/users/'.$appointment->user['photo']) }}" alt="profilephoto"
                        class="profilechoose img-thumbnail rounded img-fluid">
                    @else
                    <img @error('photo') is-invalid @enderror
                        src="{{ Avatar::create($appointment->user['name'])->toBase64() }}" alt="profilephoto"
                        class="profilechoose img-thumbnail rounded img-fluid">
                    @endif
                </div>
                <div class="col-lg-9">
                    <h4>{{ ucfirst($appointment->user['name']) }}</h4>
                    <div class="button-list mt-4 mb-3">
                        <a href="mailto:{{ $appointment->user['email'] }}" role="button" class="btn btn-primary-rgba"><i
                                class="feather icon-mail mr-2"></i>{{ ucfirst($appointment->user['email']) }}</a>
                        <button type="button" class="btn btn-success-rgba"><i class="feather icon-phone mr-2"></i><a
                                href="tel:($appointment->user['mobile'])">{{ ucfirst($appointment->user['mobile']) }}</a></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="p-1">{{ __("Service Name :") }}</th>
                                    <td class="p-1"> <span class="badge badge-primary show-heading"
                                            >{{ $appointment->service['name'] }}</span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-1">{{ __("Appointment Details :") }}</th>
                                    <td class="p-1">
                                        <p class="show-heading">{{str_limit($appointment->detail , 60) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-1">{{ __("Comments :") }}</th>
                                    <td class="p-1"> @if($appointment->comment)
                                        <span class="badge badge-success show-heading">
                                            {{ $appointment->comment }}
                                        </span>
                                        @else
                                        {{ __("Not set") }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-1">{{ __("Appointment Date :") }}</th>
                                    <td class="p-1">
                                        <p class="text-dark show-heading">{{ __("From:") }}<br>
                                            <p class="text-dark show-heading">{{ $appointment->from }}
                                            </p>
                                        </p>
                                    </td>
                                    <td class="p-1">
                                        <div>
                                            <p class="text-dark show-heading-two">
                                               {{ __(" To:") }}<br>{{ $appointment->to }}
                                            </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="show-btn">
                                            {!! Form::open(['method' => 'POST', 'route' => ['appointment.status',
                                            $appointment->id]]) !!}
                                            <div
                                                class="form-group custom-switch{{ $errors->has('status') ? ' has-error' : '' }}">
                                                {!! Form::checkbox('status', 1, $appointment->status == 1 ? 1 : 0, ['id'
                                                =>
                                                'switch'.$appointment->id, 'class'
                                                => 'tgl
                                                8 tgl-skewed' , 'onChange'=>"this.form.submit()"]) !!}
                                                <label class="tgl-btn" data-tg-off="Reject" data-tg-on="Accept"
                                                    for="switch{{$appointment->id}}"></label>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                    </div>
                    <!-- Start Modal -->
                    <div id="deleteModal{{$appointment->id}}" class="delete-modal modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="delete-icon"></div>
                                </div>
                                <div class="modal-body text-center">
                                    <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                                    <p>{{ __("Do you really want to delete these records? This process cannot
                                        be undone.") }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ __("No") }}</button>
                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                    ['appointment.destroy',
                                    $appointment->id]]) !!}
                                    <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
@endsection
@section('script')
<link type="text/css" rel="stylesheet" href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
@endsection