    @extends('layouts.master')
@section('title',__('All Quotation'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Quotation') }}
@endslot

@slot('menu1')
{{ __('Quotation') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('quotation.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>Add
            {{ __("Quotation") }}</a>
        <button type="button" class="btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
        <a href="{{ route('quo.index') }}" class="btn btn-success-rgba mr-2 "><i
                class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
    </div>
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
                        <h5 class="card-title mb-0">{{ __("All Quotation") }}</h5>
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
                                <th>{{ __("Customerid") }}</th>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Phone") }}</th>
                                <th>{{ __("ProductName") }}</th>
                                <th>{{ __("Total") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        @if (isset($quotation))
                        <tbody>
                            @foreach($quotation as $key => $list)
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
                                                    <p>{{ __(">Do you really want to delete selected item names here? This process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('quotation.bulk_delete') }}">
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
                                <td>{{$list->customerid}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->mobile}}</td>
                                <td>
                                    @foreach($list->subquotation as $sub)
                                    {{ str_replace('"', '', $sub->productname)}}
                                    @endforeach

                                </td>

                                <td>

                                    @foreach($list->subquotation as $sub)
                                    {{ str_replace('"', '', $sub->total)}}
                                    @endforeach

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['quotation.status', $list->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$list->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$list->id}}"></label>
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
                                                <a class="dropdown-item" href="{{ route('quotation.show',$list->id ) }}"
                                                    class="btn btn-primary-rgba"><i
                                                        class="feather icon-file mr-2"></i>{{ __("Show") }}</a>
                                                <a class="dropdown-item" href="{{route('quotation.edit', $list->id)}}"
                                                    class="btn btn-xs btn-success-rgba"><i
                                                        class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>
                                                <button class="dropdown-item" type="button" data-toggle="modal"
                                                    class="btn btn-primary-rgba"
                                                    data-target="#deleteModal{{$list->id}}"><i
                                                        class="feather icon-trash mr-2"></i>{{ __("Delete") }}</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="deleteModal{{$list->id}}" class="delete-modal modal fade" role="dialog">
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
                                                    <p>{{ __("Do you really want to delete these records? This process cannot be  undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-dark"
                                                        data-dismiss="modal">{{ __("No") }}</button>
                                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                                    ['quotation.destroy',$list->id]]) !!}

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