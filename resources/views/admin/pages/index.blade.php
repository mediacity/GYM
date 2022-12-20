@extends('layouts.master')
@section('title',__('All Pages'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Pages') }}
@endslot
@slot('menu1')
{{ __('Pages') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6 text-right">
    <a href="{{route('pages.create')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-plus mr-2"></i>{{ __("Add Pages") }}</a>
   <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
            class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
                <a href="{{ route('pag.index') }}" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
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
                        <h5 class="card-title mb-0">{{ __("All Pages") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-border">
                        <thead>
                            <th>
                                <div class="inline">
                                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                    value="all" />
                                <label for="checkboxAll" class="material-checkbox"></label>
                            </div>
                        </th>
                                <th>#</th>
                                <th>{{ __("Page Title") }}</th>
                                <th>{{ __("About Us") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        @if (isset($pagelist))
                        <tbody>
                            @foreach($pagelist as $key => $list)
                           <tr>
                            <td>
                            <div class='inline'>
                                <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                    name='checked[]' value={{ $list->id }} id='checkbox{{ $list->id }}'>
                                <label for='checkbox{{ $list->id }}' class='material-checkbox'></label>
                            </div>
                            <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="delete-icon"></div>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                                            <p>{{ __("Do you really want to delete selected item names here? This process cannot be undone.") }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form id="bulk_delete_form" method="post"
                                                action="{{ route('pages.bulk_delete') }}">
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
                                <td>{{ucfirst($list->title)}} </td>
                                <td>{{ucfirst($list->aboutus)}} </td>
                                <td>
                                    {!! Form::open(['method' => 'POST', 'route' => ['pages.status', $list->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$list->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$list->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <div class="button-list">
                                        <a href="{{route('pages.edit', $list->id)}}"
                                            class="btn btn-xm btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <!-- <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                                            data-target="#deleteModal{{$list->id}}"><i
                                                class="feather icon-trash"></i></button> -->
                                        <!-- Modal -->
                                        <div id="deleteModal{{$list->id}}" class="delete-modal modal fade"
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
                                                        {!! Form::open(['method' => 'DELETE', 'route' =>
                                                        ['pages.destroy', $list->id]]) !!}
                                                        <button type="reset" class="btn btn-dark"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
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
    <!-- End col -->
</div>
<!-- End row -->
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
