@extends('layouts.master')
@section('title',__('All Exercise'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Exercise") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Exercise') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block  text-right">
                <a href="{{route('exercise.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add") }}
                {{ __("Exercise") }}</a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                    class="feather icon-trash mr-2"></i>{{ __(" Delete Selected") }}</button>
                <a href="{{ route('ex.index') }}" class="btn btn-success-rgba mr-2"><i
                class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("All Exercise") }}</h5>
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
                                <th> # </th>
                                <th>{{ __("Package Name") }}</th>
                                <th>{{ __("Session Name") }}</th>
                                <th>{{ __("Day") }}</th>
                                <th>{{ __("Exercise name") }}</th>
                                <!-- <th>{{ __("Detail") }}</th> -->
                                <th>{{ __("Url") }}</th>
                                <th>{{ __("Video") }}</th>
                                @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' )
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        @if (isset($exerciselist))
                        <tbody>
                            @foreach($exerciselist as $key => $list)
                            <tr>
                            <tr>
                                <td>
                                    <div class='inline index-checkbox'>
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
                                                    <h4 class="modal-heading">{{ __("Are You Sure") }}</h4>
                                                    <p>{{ __("Do you really want to delete selected item names here? This process cannot be undone") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('exercise.bulk_delete') }}">
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
                                <td>{{$list->exercise_package}}</td>
                                <td>
                                    @if($list->session_id)
                                    @foreach($list->session_id as $key => $s)
                                    @php
                                    $session_id = App\Dietid::find($s);
                                    @endphp
                                    @if(isset($session_id))
                                    <span class="badge badge-secondary">{{ucfirst($session_id->session_id)}}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($list->day)
                                    @foreach($list->day as $key => $d)
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
                                    @if($list->exercisename)
                                    @foreach($list->exercisename as $key => $e)
                                    @php
                                    $exercisename = App\Exercisename::find($e);
                                    @endphp
                                    @if(isset($exercisename))
                                    <span class="badge badge-success">{{ ucfirst($exercisename->exercisename) }}</span>
                                    @endif
                                    @endforeach
                                    @endif
                                </td>
                                <!-- <td>{{str_limit($list->detail , 20)}}</td> -->
                                <td><a href="{{ $list->url }}">{{str_limit($list->url, '30')}}</a></td>

                                <td><a href="{{ url('image/exercise',$list->video) }}" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i>{{ __("Video") }}</a>
                                </td>
                                @if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' )
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['exercise.status', $list->id]]) !!}
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$list->id,
                                        'class' => 'custom-control-input', 'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$list->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <div class="button-list button-list-two">
                                        <a href="{{route('exercise.edit', $list->id ,['id' => app('request')->input('id')])}}"
                                            class="btn btn-xm btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                                            data-target="#deleteModal{{$list->id}}"><i
                                                class="feather icon-trash"></i></button>
                                    </div>
                                    <!-- Modal -->
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
                                                    <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                                    ['exercise.destroy', $list->id]])
                                                    !!}
                                                    <button type="reset" class="btn btn-dark"
                                                        data-dismiss="modal">{{ __("No") }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </div>
            </div>
            </td>
            @endif
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
<script>
    (function($) {
        
      "use strict";
      $(document).ready(function(){
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"50%", height:"50%"});
        $(".inline").colorbox({inline:true, width:"50%"});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });
        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
        $("#click").click(function(){
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
        });
      });
      
    })(jQuery);
    </script>
@endsection