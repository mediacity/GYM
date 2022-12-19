@extends('layouts.master')
@section('title',__('All Session'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Diet Session") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Diet Session') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="{{route('dietid.create')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i>{{ __("Add Diet Session") }}</a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal"
                data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> {{ __("Delete Selected") }}</button>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Form -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('All session') }}</h5>
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
                            <th>
                               {{ __("Sessions") }}
                            </th>
                            <th>
                               {{ __("Status") }}
                            </th>
                            <th>
                               {{ __("Actions") }}
                            </th>
                        </thead>
                        <tbody>
                            @foreach($dietid as $key => $dietid)
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $dietid->id }} id='checkbox{{ $dietid->id }}'>
                                        <label for='checkbox{{ $dietid->id }}' class='material-checkbox'></label>
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
                                                        action="{{ route('dietid.bulk_delete') }}">
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
                                <td>{{ucfirst($dietid -> session_id) }}</td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['dietid.status', $dietid->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $dietid->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$dietid->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$dietid->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td><a class="btn btn-xs btn-success-rgba"
                                        href="{{ route('dietid.edit',$dietid->id)  }}"><i class="feather icon-edit-2"
                                            aria-hidden="true"></i>
                                    </a>
                                    <form method="POST" id="delete-form-{{ $dietid->id }}"
                                        action="{{route ('dietid.destroy',$dietid->id) }}" class="d-none">

                                        {{ csrf_field() }}
                                        {{ method_field('delete')}}
                                    </form>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xs" data-toggle="modal"
                                        data-target="#deleteModal{{$dietid->id}}">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal{{$dietid->id}}" class="delete-modal modal fade" role="dialog">
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
                                                    data-dismiss="modal">{{ __('No') }}</button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['dietid.destroy',
                                                $dietid->id]]) !!}
                                                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Form -->
@endsection
@section('script')
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection