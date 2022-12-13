@extends('layouts.master')
@section('title',__('All Diet Content'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Diet Content') }}
@endslot
@slot('menu1')
{{ __('Diet Content') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('dietcontent.create')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-plus mr-2"></i>{{ __("Add Diet Content") }}</a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
            class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
            <a href="{{ route('dietcont.index') }}" class="btn btn-primary-rgba mr-2"><i class="feather icon-download-cloud"></i>Recycle</a>
    </div>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!--main-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                 <h5 class="card-title">{{ __('Diet Content') }}</h5>
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
                                {{ __("Diet Content") }}
                            </th>
                            <th>
                                {{ __("Quantity") }}
                            </th>
                            <th>
                                {{ __("Calories") }}
                            </th>
                            <th>
                                {{ __("Status") }}
                            </th>
                            <th>
                              {{ __("  Action") }}
                            </th>
                        </thead>
                         <tbody>
                            @foreach($dietcontent as $key => $dietcontent)
                           <tr>
                            <td>
                            <div class='inline'>
                                <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                    name='checked[]' value={{ $dietcontent->id }} id='checkbox{{ $dietcontent->id }}'>
                                <label for='checkbox{{ $dietcontent->id }}' class='material-checkbox'></label>
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
                                                action="{{ route('dietcontent.bulk_delete') }}">
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
                         <td>{{ucfirst($dietcontent -> content) }}</td>
                                  <td>{{ucfirst($dietcontent -> quantity) }}</td>
                                  <td>{{$dietcontent -> calories }}</td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['dietcontent.status',
                                    $dietcontent->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $dietcontent->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$dietcontent->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$dietcontent->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td><a class="btn btn-xs btn-success-rgba"
                                        href="{{ route('dietcontent.edit',$dietcontent->id)  }}"><i
                                            class="feather icon-edit-2" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xs" data-toggle="modal"
                                        data-target="#deleteModal{{$dietcontent->id}}">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal{{$dietcontent->id}}" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['dietcontent.destroy',
                                                $dietcontent->id]]) !!}
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
<!--END-->
@endsection
@section('script')
<script>
      $("#checkboxAll").on('click', function () {
  $('input.check').not(this).prop('checked', this.checked);
});;

</script>
@endsection