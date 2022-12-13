@extends('layouts.master')
@section('title',__('All Fees'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Fees') }}
@endslot
@slot('menu1')
{{ __('Fees') }}
@endslot
@slot('button')
@if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' )
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('fees.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add
        Fees") }}</a>
        <button type="button" class=" btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
            class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
        <a href="{{ route('fee.index') }}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-download-cloud"></i>{{ __("Recycle") }}</a>
    </div>
</div>
@endif
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
                        <h5 class="card-title mb-0">{{ __("All Fees") }}</h5>
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
                                <th>{{ __("Title") }}</th>
                                <th>{{ __("Detail") }}</th>
                                <th>{{ __("Price") }}</th>
                                <th>{{ __("OfferPrice") }}</th>
                                @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' )
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        @if (isset($feeslist))
                        <tbody>
                            @foreach($feeslist as $key => $list)
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $list->id }} id='checkbox{{ $list->id }}'>
                                        <label for='checkbox{{ $list->id }}' class='material-checkbox'></label>
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
                                                        action="{{ route('fees.bulk_delete') }}">
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
                                <td>{!! $list->detail !!}</td>
                                <td>{{'$'.(ucfirst($list->price))}} </td>
                                <td>
                                    @if(($list->offerprice)>0) <span class="badge badge-success">
                                        {{'$'.(ucfirst($list->offerprice))}} </span> @else
                                    {{ __("Not set") }}
                                    @endif</td>
                                @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' )
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['fees.status', $list->id]]) !!}
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
                                        <a href="{{route('fees.edit', $list->id)}}"
                                            class="btn btn-xm btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                                            data-target="#deleteModal{{$list->id}}"><i
                                                class="feather icon-trash"></i></button>
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
                                                        ['fees.destroy', $list->id]]) !!}
                                                        <button type="reset" class="btn btn-dark"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    @endif
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
<!-- End Row -->                    
@endsection
@section('script')
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection
