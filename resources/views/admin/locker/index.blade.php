@extends('layouts.master')
@section('title',__('All Lockers'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Locker') }}
@endslot
@slot('menu1')
{{ __('Locker') }}
@endslot
@slot('button')
@if(auth()->user()->can('locker.add'))
<div class="col-md-12 col-lg-6 text-right">
  <div class="top-btn-block">
    <a href="{{route('locker.create',['id' => app('request')->input('id')])}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add Locker") }}</a>
    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash"></i>{{ __(" Delete Selected") }}</button>
  </div>
</div>
@endif
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
            <h5 class="card-title mb-0">{{ __("All Locker") }}</h5>
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
                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label>
                  </div>
                </th>
                <th>
                  #</th>
                <th>{{ __("Username") }}</th>
                <th>{{ __("locker_no") }}</th>
                <th>{{ __("Locker Assigned") }}</th>
                <th>{{ __("Locker Expiration") }}</th>
                <th>{{ __("Status") }}</th>
                @if(auth()->user()->can('locker.view'))
                <th>{{ __("Action") }}</th>
                @endif
              </tr>
            </thead>
            @if (isset($lockerlist))
            <tbody>
              @foreach($lockerlist as $key => $list)
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
                          <form id="bulk_delete_form" method="post" action="{{ route('locker.bulk_delete') }}">
                            @csrf
                            @method('POST')
                            <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{ __("No") }}</button>
                            <button type="submit" class="btn btn-danger-rgba">{{ __("Yes") }}</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  {{$key+1}}
                </td>
                <td>{{($list->user->name)}} </td>
                <td>{{$list->lockerno}}</td>

                <td>{{$list->to}}</td>
                <td>{{$list->from}}</td>
                <td>
                  {!! Form::open(['method' => 'PUT', 'route' => ['locker.status', $list->id]]) !!}
                  <div class="custom-switch">
                    {!! Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' => 'switch'.$list->id,
                    'class' => 'custom-control-input', 'onChange'=>"this.form.submit()"]) !!}
                    <label class="custom-control-label" for="switch{{$list->id}}"></label>
                  </div>
                  {!! Form::close() !!}
                </td>
                <td>
                  @if(auth()->user()->can('locker.edit'))
                  <div class="button-list">

                    <a href="{{route('locker.edit', $list->id)}}" class="btn btn-xm btn-success-rgba"><i
                        class="feather icon-edit-2"></i></a>
                    <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                      data-target="#deleteModal{{$list->id}}"><i class="feather icon-trash"></i></button>

                    <!-- Modal -->
                    <div id="deleteModal{{$list->id}}" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                            <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}</p>
                          </div>
                          <div class="modal-footer">
                            {!! Form::open(['method' => 'DELETE', 'route' => ['locker.destroy', $list->id]]) !!}
                            <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ __("No") }}</button>
                            <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
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