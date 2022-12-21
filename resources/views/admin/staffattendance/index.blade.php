@extends('layouts.master')
@section('title',__('All Staff Attendance'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Staff Attendance") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Staff Attendance') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="{{route('staffattendance.create')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i>{{ __("Add Staff Attendance") }}</a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                        class="feather icon-trash mr-2"></i> {{ __("Delete Selected") }}</button>
                <a href="{{ route('sta.index') }}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Attendance') }}</h5>
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
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("location") }}</th>
                                <th>{{ __("Attendance") }}</th>
                                <th>{{ __("Date") }}</th>
                                <th>{{ __("Comments") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($staffattendance))
                            @foreach($staffattendance as $key => $staffattendance)
                            <tr id="dayid{{ $staffattendance->id }}">
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $staffattendance->id }} id='checkbox{{ $staffattendance->id }}'>
                                        <label for='checkbox{{ $staffattendance->id }}'
                                            class='material-checkbox'></label>
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
                                                        cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('staffattendance.bulk_delete') }}">
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
                                <td>{{ucfirst($staffattendance->user['name']) }}</td>
                                <td>{{$staffattendance -> location}}</td>
                                <td> @if($staffattendance->attend == 'present') <span
                                        class="badge badge-success">{{ $staffattendance->attend == 'present' ? "Present" : "" }}</span>

                                    @elseif($staffattendance->attend == 'absent') <span
                                        class="badge badge-danger">{{ $staffattendance->attend == 'absent' ? "Absent" : "" }}</span>

                                    @endif </td>
                                <td>{{$staffattendance ->date }}</td>
                                <td>{{$staffattendance ->comment}}</td>
                                <td><a class="btn btn-xm btn-success-rgba"
                                        href="{{ route('staffattendance.edit',$staffattendance->id)  }}"><i
                                            class="feather icon-edit-2" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba btn btn-xm" data-toggle="modal"
                                        data-target="#deleteModal{{$staffattendance->id}}">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal{{$staffattendance->id}}" class="delete-modal modal fade"
                                    role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' =>
                                                ['staffattendance.destroy', $staffattendance->id]]) !!}
                                                 <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
    