@extends('layouts.master')
@section('title',__('All Blog Category'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-5">
                <h4 class="page-title">{{ __("Blog Category") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Blog Category') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="{{route('blogcategory.create')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-plus mr-2"></i>{{ __("Add Blog Category") }}</a>
                    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                    class="feather icon-trash mr-2"></i> {{ __("Delete Selected") }}</button>
                    <a href="{{ route('blocat.index') }}" class="btn btn-success-rgba mr-2"><i
                    class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">{{ __("All Categories") }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table ">
                                <thead>
                                    <tr>
                                        <th>

                                            <div class="inline">

                                                <input id="checkboxAll" type="checkbox" class="filled-in"
                                                    name="checked[]" value="all" />
                                                <label for="checkboxAll" class="material-checkbox"></label>
                                            </div>
                                        </th>
                                        <th>#</th>
                                        <th>{{ __("Category") }}</th>
                                        <th>{{ __("Created At") }}</th>
                                        <th>{{ __("Status") }}</th>
                                        <th>{{ __("Actions") }}</th>
                                    </tr>
                                </thead>
                                @if ($blogcategory)
                                <tbody>
                                    @foreach ($blogcategory as $key => $item)
                                    <tr>
                                        <td>
                                            <div class='inline'>
                                                  <input type='checkbox' form='bulk_delete_form'
                                                    class='check filled-in material-checkbox-input' name='checked[]'
                                                    value={{ $item->id }} id='checkbox{{ $item->id }}'>
                                                <label for='checkbox{{ $item->id }}' class='material-checkbox'></label>
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
                                                            <p>{{ __("Do you really want to delete selected item names here? This proces cannot be undone.") }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="bulk_delete_form" method="post"
                                                                action="{{ route('blogcategory.bulk_delete') }}">
                                                                @csrf
                                                                @method('POST')
                                                                <button type="reset" class="btn btn-gray translate-y-3"
                                                                    data-dismiss="modal">{{ __("No") }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">{{ __("Yes") }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                         <td>
                                              {{$key+1}}
                                        </td>
                                        <td>{{ucfirst($item->title)}}</td>
                                        <td>{{$item->created_at->diffForHumans()}}</td>
                                        <td>
                                            {!! Form::open(['method' => 'POST', 'route' => ['blogcategory.status',
                                            $item->id]]) !!}
                                            <div class="custom-switch">
                                                {!! Form::checkbox('is_active', 1, $item->is_active == 1 ? 1 : 0, ['id'
                                                =>
                                                'switch'.$item->id, 'class' => 'custom-control-input',
                                                'onChange'=>"this.form.submit()"]) !!}
                                                <label class="custom-control-label" for="switch{{$item->id}}"></label>
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            <div class="admin-table-action-block">
                                                <a href="{{route('blogcategory.edit', $item->id)}}"
                                                    class="btn btn-xm btn-success-rgba"><i
                                                        class="feather icon-edit-2"></i></a>
                                                <button type="button" class="btn btn-xm btn-danger-rgba"
                                                    data-toggle="modal" data-target="#deleteModal{{$item->id}}"><i
                                                        class="feather icon-trash"></i></button>
                                                <!-- Modal -->
                                                <div id="deleteModal{{$item->id}}" class="delete-modal modal fade"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                {!! Form::open(['method' => 'DELETE', 'route' =>
                                                                ['blogcategory.destroy', $item->id]]) !!}
                                                                <button type="reset" class="btn btn-primary"
                                                                    data-dismiss="modal">{{ __("No") }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger-rgba">{{ __("Yes") }}</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
    <!-- End Contentbar -->
    @endsection
    @section('script')
    <script>
        $("#checkboxAll").on('click', function () {
            $('input.check').not(this).prop('checked', this.checked);
        });
    </script>
    @endsection