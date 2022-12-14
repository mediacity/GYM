@extends('layouts.master')
@section('title',__('All Trainers'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Trainer") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Trainer') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="{{route('trainer.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add
                Trainer") }}</a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                        class="feather icon-trash mr-2"></i> {{ __("Delete Selected") }}</button>
                <br>
                <br>
                <div class="col-md-12">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="search" for="search" id="search" onsearch="OnSearch(this)" name="search"
                                value="{{ app('request')->input('search') }}" class="form-control" placeholder="Search">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    @if(app('request')->input('search') != '')
                    <a role="button" title="Back" href="{{ route('trainer.index') }}" name="clear" value="search" id="clear_id"
                        class="btn btn-warning btn-xs">
                        {{ __(" Clear Search") }}
                    </a>
                    @endif
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("All Trainer") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-border">
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
                                <th>{{ __("Image") }}</th>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Phone") }}</th>
                                <th>{{ __("Qualification") }}</th>
                                <th>{{ __("Specialization") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        @if (isset($trainers))
                        <tbody>
                            @foreach($trainers as $key => $trainer)
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $trainer->id }} id='checkbox{{ $trainer->id }}'>
                                        <label for='checkbox{{ $trainer->id }}' class='material-checkbox'></label>
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
                                                    <p>{{ __(">Do you really want to delete selected item names here? This process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('trainer.bulk_delete') }}">
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
                                <td>
                                    {{$key+1}}
                                </td>
                                <td> 
                                    @if($trainer->photo != '')
                                    <img width="80px" height="80px" class="margin-right-15 width-height"
                                        src="{{url('/image/slider/'.$trainer->photo )}}"
                                        title="{{ $trainer->user_info?$trainer->user_info->name:''  }}">
                                    @else
                                    <img width="80px" height="80px" class="margin-right-15" title="{{ ucfirst($trainer->user_info?$trainer->user_info->name:'') }}"
                                        src="{{ Avatar::create($trainer->user_info?$trainer->user_info->name:'')->toBase64() }}" />
                                    @endif
                                </td>
                                <td> {{ $trainer->user_info?$trainer->user_info->name:'' }} </td>
                                <td> {{ucfirst(str_limit($trainer->email , 10)) }} </td>
                                <td> {{$trainer->phone }} </td>
                                <td> {{ucfirst(str_limit($trainer->qualification , 10)) }} </td>
                                <td> {{ucfirst(str_limit($trainer->specialization , 10)) }} </td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['trainer.status',$trainer->id]]) !!}
                                    <div class="custom-switch">
                                        <p class="mb-1 font-14 ml--40 mt--15">
                                            {{ __("Status") }}</p>
                                        {!! Form::checkbox('is_active', 1, $trainer->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$trainer->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$trainer->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <div class="btn-group mr-2">
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-primary-rgba" type="button"
                                                id="CustomdropdownMenuButton3" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                                <a class="dropdown-item" href="{{ route('trainer.edit',$trainer->id) }}"
                                                    class="btn btn-xs btn-success-rgba"><i
                                                        class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>
                                                <button class="dropdown-item" type="button" data-toggle="modal"
                                                    class="btn btn-primary-rgba"
                                                    data-target="#deleteModal{{$trainer->id}}"><i
                                                        class="feather icon-trash mr-2"></i>{{ __("Delete") }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" id="delete-form-{{ $trainer->id }}"
                                        action="{{route ('trainer.destroy',$trainer->id) }}" style="display:none;">
                                        {{ csrf_field() }}
                                        {{ method_field('delete')}}
                                    </form>
                                </td>
                                <div id="deleteModal{{$trainer->id}}" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['trainer.destroy',
                                                $trainer->id]]) !!}

                                                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
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
    <!-- End col -->
</div>
<!-- End row -->
@endsection
@section('script')
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection