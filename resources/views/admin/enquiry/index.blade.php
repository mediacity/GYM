@extends('layouts.master')
@section('title',__('All Enquiry'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Enquiry") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('All Enquiry') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right"> 
                @if(auth()->user()->can('enquiry.add'))
                <a href="{{route('enquiry.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add") }}
                    {{ __("Enquiry") }}</a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                        class="feather icon-trash mr-2"></i>{{ __(" Delete Selected") }}</button>
                <a href="{{ route('enq.index') }}" class="btn btn-success-rgba mr-2"><i
                        class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
                <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-warning-rgba mr-2">
                    <i class="feather icon-filter mr-2"></i>{{ __("Filter") }}
                </a>
                <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
                    <div class="infobar-settings-sidebar-head d-flex justify-content-between">
                        <h4>{{ __("Filter") }}</h4>
                        <a href="javascript:void(0)" id="infobar-settings-close"
                            class="infobar-settings-close"><i class="feather icon-x"></i></a>
                    </div>
                    <form action="" method="get" class="filterForm">
                        <div class="infobar-settings-sidebar-body">
                            <div class="custom-mode-setting">
                                <div class="row align-items-center pb-3">
                                    <div class="col-8 text-left">
                                        <h6 class="mb-0">{{ __("Age") }}</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="custom-switch">
                                            <input type="checkbox" id="switch" class="custom-control-input js-switch-setting-first question1" value="1">
                                            <label class="custom-control-label" for="switch"></label>
                                        </div>
                                    </div>
                                    <div class="myclass1  text-right col-md-6 offset-md-6" style="display:none" >
                                        <select required="" name="age" id="purpose" class="form-control select2">
                                            <option value="Not set">{{ __("Select Age") }}</option>
                                            <option value="0-18">{{ __("0-18") }}</option>
                                            <option value="19-25">{{ __("19-25") }}</option>
                                            <option value="26-35">{{ __("26-35") }}</option>
                                            <option value="35-50">{{ __("35-50") }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-8 text-left">
                                        <h6 class="mb-0">{{ __("Occupation") }}</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="custom-switch">
                                            <input type="checkbox" id="switch-one" class="custom-control-input js-switch-setting-second question2" value="1">
                                            <label class="custom-control-label" for="switch-one"></label>
                                        </div>
                                    </div>
                                    <div  class="myclass2 text-right col-md-6 offset-md-6" style="display:none" >
                                        <select autofocus="" class="form-control select2" name="occupation_id">
                                            <option value="">{{ __("Select Occupation") }}</option>
                                            @foreach($occupations as $occupation)
                                            <option value="{{ $occupation->id }}">{{ $occupation->occupation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-8 text-left">
                                        <h6 class="mb-0">{{ __("Status") }}</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="custom-switch">
                                            <input type="checkbox" id="switch-two" class="custom-control-input js-switch-setting-third question3" value="1">
                                            <label class="custom-control-label" for="switch-two"></label>
                                        </div>
                                    </div>
                                </div>
                                <div  class="myclass3  text-right col-md-6 offset-md-6" style="display:none">
                                    <select data-placeholder="{{ __("Please select status") }}" class="form-control select2"
                                    name="status">
                                    <option selected>{{ __("Please select status") }}</option>
                                    <option value="demo">{{ __("Demo") }}</option>
                                    <option value="close">{{ __("Close") }}</option>
                                    <option value="join">{{ __("Join") }}</option>
                                    <option value="pending">{{ __("Pending") }}</option>
                                </select>
                                </div>
                                <div class="row align-items-center pb-3">
                                    <div class="col-8 text-left">
                                        <h6 class="mb-0">{{ __("Purpose") }}</h6>
                                    </div>
                                    <div class="col-4 text-right">
                                        <div class="custom-switch">
                                            <input type="checkbox" id="switch-third" class="custom-control-input js-switch-setting-fourth question4" value="1">
                                            <label class="custom-control-label" for="switch-third"></label>
                                        </div>
                                    </div>
                                    <div   class="myclass4 text-right col-md-6 offset-md-6" style="display:none">
                                        <select required="" name="purpose" id="purpose" class="form-control select2">
                                            <option value="Not set">{{ __("Select Purpose") }}</option>
                                            <option value="Gym">{{ __("Gym") }}</option>
                                            <option value="Diet">{{ __("Diet") }}</option>
                                            <option value="Yoga">{{ __("Yoga") }}</option>
                                            <option value="Aerobics">{{ __("Aerobics") }}</option>
                                            <option value="Others">{{ __("Others") }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <button type="reset" class="btn btn-danger-rgba reset-btn"><i class="fa fa-ban"></i> {{ __("Disable Filter") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Apply Filter") }}</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="enquiry-main-block mb-5">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-12">
          <div class="card">
    <div class="card-header">
         <div class="row align-items-center">
            <div class="col-6">
                <h5 class="card-title mb-0">{{ __("All Enquiry") }}</h5>
            </div>
        </div>
         <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-borderd">
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
                            <th>{{ __("Enquiry Date") }}</th>
                            <th>{{ __("Enquiry ID") }}</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("Email") }}</th>
                            <th>{{ __("Mobile No.") }}</th>
                            <th>{{ __("Purpose") }}</th>
                            <th>{{ __("Age") }}</th>
                            <th>{{ __("Occupation") }}</th>
                            <th>{{ __("Cost") }}</th>
                            <th>{{ __("Health Issue") }}</th>
                            <th>{{ __("Status") }}</th>
                            @if(auth()->user()->can('enquiry.view'))
                            <th>{{ __("Actions") }}</th>
                            @endif
                        </tr>
                    </thead>
                    @if (isset($enquiry))
                    <tbody>
                        @foreach($enquiry as $key => $list)
                        <tr>
                            <td>
                                <div class='inline index-checkbox'>
                                    <input type='checkbox' form='bulk_delete_form'
                                        class='check filled-in material-checkbox-input' name='checked[]'
                                        value={{ $list->id }} id='checkbox{{ $list->id }}'>
                                    <label for='checkbox$row->enquiryid' class='material-checkbox'></label>
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
                                                    action="{{ route('enquiry.bulk_delete') }}">
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
                            <td>{{$list -> created_at}}</td>
                            <td>{{$list -> enid}}</td>
                            <td>{{ucfirst($list->name) }} </td>
                            <td>{{$list -> email}}</td>
                            <td>{{$list -> mobile }}</td>
                            <td>{{$list -> purpose}}</td>
                            <td>{{$list -> age}}</td>
                            <td>{{$list -> occupation['occupation'] ?? '-'}}</td>
                            <td>{{$list -> cost['cost'] ?? '-'}}</td>
                            <td>
                                @if($list->issue)
                                @foreach($list->issue as $key => $d)
                                @if($d == 'NO')
                                <span class="badge badge-success">{{ __("NO Health Issues") }}</span>
                                @else
                                @php
                                $issue = App\Enquiryhealth::find($d);
                                 @endphp
                                 @if(isset($issue))
                                 <span class="badge badge-primary">{{ ucfirst($issue->issue) }}</span>
                                 @endif
                                @endif
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if($list->status == 'demo') <span
                                    class="badge badge-primary">{{ $list->status == 'demo' ? "Demo" : "" }}</span>

                                @elseif($list->status == 'close') <span
                                    class="badge badge-danger">{{ $list->status == 'close' ? "Close" : "" }}</span>

                                @elseif($list->status == 'pending') <span
                                    class="badge badge-secondary">{{ $list->status == 'pending' ? "Pending" : "" }}</span>

                                @elseif($list->status == 'join') <span
                                    class="badge badge-success">{{ $list->status == 'join' ? "Join" : "" }}</span>
                                @else

                                @endif
                            </td>
                            @if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name ==
                            'Super Admin' )
                            <td>
                                 <div class="btn-group mr-2">
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-primary-rgba" type="button"
                                            id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                            <a class="dropdown-item" href="{{ route('enquiry.show',$list->id ) }}"
                                                class="btn btn-primary-rgba"><i class="feather icon-file mr-2"></i>{{ __("Show") }}</a>
                                            <a class="dropdown-item" href="{{ route('enquiry.edit',$list->id ) }}"
                                                class="btn btn-xs btn-success-rgba"><i
                                                    class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>
                                            <button class="dropdown-item" type="button" data-toggle="modal"
                                                class="btn btn-primary-rgba" data-target="#deleteModal{{$list->id}}"><i
                                                    class="feather icon-trash mr-2"></i>{{ __("Delete") }}</button>
                                            <a class="dropdown-item" href="{{ route('followup.index') }}"><i
                                                    class="fa fa-calendar mr-2"></i>{{ __("Followup") }}</a>
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
                                                <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-dark"
                                                    data-dismiss="modal">{{ __("No") }}</button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['enquiry.destroy',
                                                $list->id]]) !!}

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
                    @else()
                   {{ __(" 'No Result Found'") }}
                    @endif
                </table>
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
<script>
    $(document).ready(function(){
        $(".reset-btn").click(function(){
           var uri = window.location.toString();

            if (uri.indexOf("?") > 0) {

                var clean_uri = uri.substring(0, uri.indexOf("?"));

                window.history.replaceState({}, document.title, clean_uri);

            }

            location.reload();
        });
    });
</script>
<script type="text/javascript">
 $(".question1").click(function() {
    if($(this).is(":checked")) {
        $(".myclass1").show(300);
    } else {
        $(".myclass1").hide(200);
    }
});
</script>
<script type="text/javascript">
 $(".question2").click(function() {
    if($(this).is(":checked")) {
        $(".myclass2").show(300);
    } else {
        $(".myclass2").hide(200);
    }
});
</script>
<script type="text/javascript">
 $(".question3").click(function() {
    if($(this).is(":checked")) {
        $(".myclass3").show(300);
    } else {
        $(".myclass3").hide(200);
    }
});
</script>
<script type="text/javascript">
 $(".question4").click(function() {
    if($(this).is(":checked")) {
        $(".myclass4").show(300);
    } else {
        $(".myclass4").hide(200);
    }
});
</script>
@endsection