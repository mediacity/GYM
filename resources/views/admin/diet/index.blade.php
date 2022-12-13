@extends('layouts.master')
@section('title',__('All Diet'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Diet') }}
@endslot
@slot('menu1')
{{ __('Diet') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        @if(auth()->user()->can('diet.add'))
        <a href="{{route('diet.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add Diet") }}</a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash"></i>{{ __(" Delete Selected") }}</button>
        <a href="{{ route('die.index') }}" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud"></i>{{ __("Recycle") }}</a>
        @endif
    </div>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="row">
    <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Diets') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userstable" class="table table-borderd">
                         <thead>
                          <th>
                               <div class="inline index-checkbox">
                                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                    value="all" />
                                <label for="checkboxAll" class="material-checkbox"></label>
                            </div>
                        </th>
                            <th>
                                #
                            </th>
                            <th>
                                {{ __("Image") }}
                            </th>
                            <th>
                              {{ __("Diet Name") }}
                            </th>
                            <th>
                                {{ __("Description") }}
                            </th>
                            <th>
                                {{ __("Included Content") }}
                            </th>

                            <th>
                               {{ __(" Diet Day") }}
                            </th>
                            <th>
                              {{ __("  Session") }}
                            </th>
                            @if(auth()->user()->can('diet.view'))
                            <th>
                                {{ __("Status") }}
                            </th>
                             <th>
                                {{ __("Action") }}
                            </th>
                            @endif

                        </thead>
                         <tbody>
                            @foreach($diet as $key => $item)
                            <tr>
                             <tr>
                               <td>
                            <div class='inline index-checkbox'>
                                <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                    name='checked[]' value={{ $item->id }} id='checkbox{{ $item->id }}'>
                                <label for='checkbox{{ $item->id }}' class='material-checkbox'></label>
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
                                                action="{{ route('diet.bulk_delete') }}">
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
                                <td>  
                                    @if($item->image != '' &&
                                    file_exists(public_path().'/image/diet/'.$item->image))

                                    <img width="150px" height="150px" class="margin-top-15" 
                                        src="{{url('image/diet/'.$item->image)}}" title="{{ $item->dietname }}">
                                    @else
                                    <img width="150px" height="150px" class="margin-top-15" 
                                        title="{{ $item->dietname }}" src="{{ Avatar::create($item->dietname)->toBase64() }}" />
                                    @endif
                                </td>
                                <td>{{$item -> dietname }}</td>
                                <td>{{ Str::limit($item->description, 30)}}</td>
                                <td>
                                     @if(count($item->diethascontent)>0)
                                    @foreach($item->diethascontent as $key => $content)

                                    <span class="badge badge-success">
                                        {{ $content->content }}
                                    </span>
                                    @endforeach
                                    @else
                                    {{ __("Not set") }}
                                    @endif
                                </td>
                                <td>
                                 @if($item->day)
                                    @foreach($item->day as $key => $d)
                                    @php
                                    $day = App\Day::find($d);
                                    @endphp
                                    @if(isset($day))
                                    <span class="badge badge-primary">{{ ucfirst($day->day) }}</span>
                                    @endif
                                    @endforeach
                                    @endif

                                </td>
                                <td> 
                                  @if($item->session_id)
                                    @foreach($item->session_id as $key => $s)
                                    @php
                                    $session_id = App\Dietid::find($s);
                                    @endphp
                                    @if(isset($session_id))
                                    <span class="badge badge-secondary">{{ucfirst($session_id->session_id)}}</span>
                                    @endif
                                    @endforeach
                                    @endif 
                                    @if(auth()->user()->can('diet.view'))
                                    <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['diet.status', $item->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $item->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$item->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$item->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <div class="btn-group mr-2">
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-primary-rgba" type="button"
                                                id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                                
                                                <a class="dropdown-item" href="{{route('diet.edit', $item->id ,['id' => app('request')->input('id')])}}"
                                                    class="btn btn-xs btn-success-rgba"><i
                                                        class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>
                                                <button  class="dropdown-item" type="button" data-toggle="modal" class="btn btn-primary-rgba"
                                                    data-target="#deleteModal{{$item->id}}"><i
                                                        class="feather icon-trash mr-2"></i>{{ __("Delete") }}</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                  </td>
                                <div id="deleteModal{{$item->id}}" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['diet.destroy',
                                                $item->id]]) !!}
                                                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                            @endif
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
<!-- End Contentbar -->
@endsection
@section('script')
<script>
$("#checkboxAll").on('click', function () {
  $('input.check').not(this).prop('checked', this.checked);
});
</script>
@endsection
