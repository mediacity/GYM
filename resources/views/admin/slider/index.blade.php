@extends('layouts.master')
@section('title',__('All Slider'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Slider') }}
@endslot
@slot('menu1')
{{ __('Slider') }}
@endslot
@slot('button')
@endslot
@slot('button')
<div class="col-md-6 col-lg-6 text-right">
    <a href="{{route('slider.create')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-plus mr-2"></i>{{ __("Create") }}
        {{ __("Slider") }}</a>
    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
            class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
    <a href="{{ route('sli.index') }}" class="btn btn-success-rgba mr-2"><i
            class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("All Slider") }}</h5>
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
                                <th>{{ __("ID") }}</th>
                                <th>{{ __("Slider Image") }}</th>
                                <th>{{ __("Slider Contents") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($slider))
                        <tbody>
                            @foreach ($slider as $key => $item)
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
                                                    <p>{{ __("Do you really want to delete selected item names here? This process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('slider.bulk_delete') }}">
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
                                <td>
                                    @if ($item->image)
                                    <img src="{{ asset('image/slider/'.$item->image) }}"
                                        class="slider-img" alt="image">
                                    @endif
                                </td>
                                <td>
                                    <table id="datatable-buttons" class="table table-borderless">
                                        <tr>
                                            <td class="text-dark">{{ucfirst(str_limit($item->link_by, 20)) }}<br><a
                                                    href="{{$item->url}}"
                                                    target="_blank">{{str_limit($item->url,30)}}</a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'POST', 'route' => ['slider.status', $item->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('status', 1, $item->status == 1 ? 1 : 0, ['id' =>
                                        'switch'.$item->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$item->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <div class="admin-table-action-block">
                                        <a href="{{route('slider.edit', $item->id)}}"
                                            class="btn btn-xm btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <!-- Delete Modal -->
                                        <button type="button" class="btn btn-danger-rgba  btn btn-xm"
                                            data-toggle="modal" data-target="#deleteModal{{$item->id}}"><i
                                                class="feather icon-trash"></i></button>
                                        <!-- Modal -->
                                        <div id="deleteModal{{$item->id}}" class="delete-modal modal fade"
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
                                                        <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {!! Form::open(['method' => 'DELETE', 'route' =>
                                                        ['slider.destroy', $item->id]])
                                                        !!}
                                                        <button type="reset" class="btn btn-dark"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ __("Yes") }}</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->
<div class="mx-auto">
    {!! $slider->links() !!}
</div>
</div>
@endsection
@section('script')
<!-- Sweetalert -->
<script src="https://mediacity.co.in/emart/demo/public/front/vendor/js/sweetalert.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection