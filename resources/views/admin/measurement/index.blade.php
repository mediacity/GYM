@extends('layouts.master')
@section('title',__('All Measurement'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Measurement") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Measurement') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="{{route('measurement.create',['id' => app('request')->input('id')])}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add Measurement") }}</a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
                <a href="{{ route('mea.index') }}" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Fitness Measurement') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userstable" class="table table-borderd">
                        <thead>
                            <th>
                                <div class="inline">
                                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                        value="all" />
                                    <label for="checkboxAll" class="material-checkbox"></label>
                                </div>
                            </th>

                            <th>
                                #
                            </th>
                            <th>{{ __("Image") }}</th>
                            <th>
                                {{ __("Name") }}
                            </th>
                            <th>
                                {{ __("Height") }}
                            </th>
                            <th>
                                {{ __("Triceps") }}
                            </th>
                            <th>
                                {{ __("Waist") }}
                            </th>
                            <th>
                                {{ __("Follow Up Date") }}                        
                            </th>
                            
                            @if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name ==
                            'Super Admin' )
                            <th>
                                {{ __("Status") }}
                            </th>
                            <th>
                                {{ __("Action") }}
                            </th>
                            @endif
                        </thead>
                        @if (isset($measurement))
                        <tbody>
                            @foreach($measurement as $key => $measurement)
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $measurement->id }} id='checkbox{{ $measurement->id }}'>
                                        <label for='checkbox{{ $measurement->id }}' class='material-checkbox'></label>
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
                                                    <p>{{ __("Do you really want to delete selected item names here? This
                                                        process
                                                        cannot be undone") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('measurement.bulk_delete') }}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __("Yes") }}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if( file_exists(public_path().'/media/users/'.$measurement->user['photo']))
                                    <img title="{{ $measurement->user['name'] }} " class="img-rounded img-fluid"
                                        src="{{url('/media/users/'.$measurement->user['photo'])  }}" width="70px"
                                        height="70px">
                                    @else
                                    <img class="rounded img-fluid" width="70px"
                                        title="{{ $measurement->user['name'] }} "
                                        src="{{ url('/image/default/default.jpg') }}" alt="No Photo">
                                    @endif
                                </td>
                                <td>{{ucfirst($measurement->user['name']) }} </td>
                                <td> 
                                    <b>Height : </b> {{$measurement -> height}} Ft<br>
                                    <b>Weight : </b> {{$measurement -> weight}} Kg<br>
                                    <b>Chest : </b> {{$measurement -> chest}} In
                                </td>
                                <td>
                                    <b>Tricep : </b> {{$measurement -> tricep}} In<br>
                                    <b>Bicep : </b> {{$measurement -> bicep}} In<br>
                                    <b>Abdomen : </b> {{$measurement -> abdomen}} In
                                </td>
                                <td>
                                    <b>waist : </b> {{$measurement -> waist}} In<br>
                                </td>
                                <td>{{$measurement -> date }}</td>
                                @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' )
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['measurement.status',
                                    $measurement->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $measurement->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$measurement->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$measurement->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td><a class="btn btn-xm btn-success-rgba"
                                        href="{{ route('measurement.edit',$measurement->id ,['id' => app('request')->input('id')])  }}"><i
                                            class="feather icon-edit-2"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xm" data-toggle="modal"
                                        data-target="#deleteModal{{$measurement->id}}">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </td>
                                <div id="deleteModal{{$measurement->id}}" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['measurement.destroy',
                                                $measurement->id]]) !!}

                                                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach

                        </tbody>
                        @endif
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