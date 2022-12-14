@extends('layouts.master')
@section('title',__('Edit Diet :eid -',['eid' => $diet->dietname]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Diet") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Diet') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('diet.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!--Section: Live preview-->
<form autocomplete="off" novalidate class="form-light" action="{{route('diet.update' , $diet->id)}}" method="POST" novalidate enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Edit your diet:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Diet Name: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ $diet->dietname }}" autofocus="" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __("Enter Diet name") }}" name="dietname" required="">
                                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i
                                        class="text-dark feather icon-help-circle"></i>{{ __("Enter your diet type eg : Weight Loss, Body Shaping ") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                    <label class="text-dark">{{ __('Diet Day:') }} <span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select day") }}" name="day_id[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value="">{{ __("Select Day") }}</option>
                                    @foreach(App\day::all() as $day)
                                        <option @if($diet->day != '') @foreach($diet->day as $dietday)
                                        {{ $dietday == $day->id ? "selected" : "" }} @endforeach @endif
                                        value="{{ $day->id }}"> {{ $day['day'] }} </option>
                                        @endforeach
                                </select>
                                @error('day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i
                                        class="text-dark feather icon-help-circle"></i>{{ __("Enter the day on which you have to eat the diet eg : Monday, Tuesday ") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                    <label class="text-dark">{{ __('Session:') }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __('Please select diet session') }}" name="session_id[]"
                                    id="session_id[]"{{ __("Please select diet session") }} class="form-control select2" multiple>
                                    <option value=""></option>
                                    @foreach(App\dietid::all() as $session_id)
                                        <option @if($diet->session_id != '') @foreach($diet->session_id as $session)
                                        {{ $session == $session_id->id ? "selected" : "" }} @endforeach @endif
                                        value="{{ $session_id->id }}"> {{ $session_id['session_id'] }} </option>
                                    @endforeach
                                </select>
                                @error('session_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __(" Selecting diet session eg : Morning, Afternoon") }} </small>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="text-dark">{{ __(" Follow Up Date: ") }}<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input value="{{$diet->followup_date}}" name="followup_date" type="text" id="calendar2"
                                    class="calendar form-control" placeholder="{{ __('yyyy/mm/dd') }}" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i
                                            class="feather icon-calendar"></i></span>
                                </div>
                            </div>
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                               {{ __(" Please Enter Next Followup Date ") }}</small>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description',['class'=>'required text-dark'])
                                !!} <span class="text-danger">*</span>
                                {!! Form::textarea('description', $diet->description, ['id' =>
                                'description','class' =>
                                'form-control' ,'required','placeholder' => 'Your Diet Description']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __("Describe your diet to eat eg : Rice ,Salad") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-3">
                            <label class="text-dark">{{ __("Diet Includes: ") }}<span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="myTable table table-bordered table-responsive" id="table_field">
                                            <thead>
                                                <tr>
                                                        <th>{{ __("Contents") }}</th>
                                                        <th>{{ __("Quantity") }}</th>
                                                        <th>{{ __("Single Calories") }}</th>
                                                        <th>{{ __("Total Calories") }}</th>
                                                        <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($diet->diethascontent)>0)
                                                @foreach($diet->diethascontent as $content)
                                                <tr id="tableBody" class="tbody">
                                                    <td><input type="text" name="content[]"
                                                            class="diet_content form-control" required=""
                                                            value="{{ $content->content }}">
                                                        <input class="dietcontentid" type="hidden" name="dietcontentid[]"
                                                            value="{{ $content->content }}">
                                                    </td>
                                                    <td><input type="number" min="1" name="quantity[]" value="{{ filter_var($content->quantity) }}" class="form-control quantity  @error('quantity') is-invalid @enderror" value="">
                                            </td>
                                            <td><input type="number" min="1" name="single_kal[]" value="{{ filter_var($content->calories/$content->quantity) }}" class="form-control single_kal  @error('single_kal') is-invalid @enderror" value="">
                                            </td>
                                            <td><input type="text" value="{{ filter_var( $content->calories) }}" name="dcalories[]" class="form-control dcalories @error('dcalories') is-invalid @enderror" value="">
                                            </td>
                                                    <td>
                                                        @if($loop->last)
                                                            <button class="btn btn-success addNew" type="button">
                                                                +
                                                            </button>
                                                        @endif
                                                        <button class="btn btn-danger removeBtn" type="button">
                                                            -
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr id="tableBody" class="tbody">
                                                    <td><input type="text" name="content[]"
                                                            class="diet_content form-control" required="">
                                                        <input class="dietcontentid" type="hidden" name="dietcontentid[]"
                                                            value="">
                                                    </td>
                                                    <td><input type="number" name="quantity[]" id="quantity" class="form-control quantity"
                                                            required="" value="">
                                                    </td>
                                                    <td><input type="number" min="1" name="single_kal[]"class="form-control single_kal  @error('single_kal') is-invalid @enderror" value="">
                                            </td>
                                            <td><input type="text" name="dcalories[]" class="form-control dcalories @error('dcalories') is-invalid @enderror" value="">
                                        </td>
                                                    <td><button class="btn addNew btn-success" type="button" name="add"
                                                            id="add" value="+">
                                                            +</button>
                                                    </td>
                                                    <td><button class="btn removeBtn btn-danger" type="button">
                                                            - </button>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                                </div>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the content and its calories which your diet need eg : Rice:130 kcal, Tomato:22 kcal") }}
                            </small>
                        </div>
                        @error('diet includes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                                {!! Form::label('image', 'Diet Image',['class'=>'text-dark']) !!}
                                {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <div class="text-dark"
                                    class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,$diet->is_active==1 ? 1 :0, ['id' =>
                                        'switch1', 'class' =>
                                        'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Update") }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $(".diet_content").each(function (index) {
            enableAutoComplete($(this));
        });
    });
    $(".myTable").on('click', 'button.addNew', function () {

        var n = $(this).closest('tr');
        addNewRow(n);

    });
    function addNewRow(n) {
        var $tr = n;
        var allTrs = $tr.closest('table').find('tr');
        var lastTr = allTrs[allTrs.length - 1];
        var $clone = $(lastTr).clone();
        $clone.find('td').each(function () {
            var el = $(this).find(':first-child');
            var id = el.attr('id') || null;
            if (id) {

                var i = id.substr(id.length - 1);
                var prefix = id.substr(0, (id.length - 1));
                el.attr('id', prefix + (+i + 1));
                el.attr('name', prefix + (+i + 1));
            }
        });
        $clone.find('input').val('');
        $tr.closest('table').append($clone);
        $('input.diet_content').last().focus();
        enableAutoComplete($("input.diet_content:last"));
    }
     function enableAutoComplete($element) {
          $element.autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('diet.fetch') }}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function (data) {
                          var resp = $.map(data, function (obj) {
                            return {
                                id: obj.id,
                                label: obj.label,
                                value: obj.value,
                                quantity: obj.quantity,
                                calories: obj.calories
                            }
                        });

                        response(resp);
                    }
                });
            },
            select: function (event, ui) {
                if (ui.item.value) {
                     this.value = ui.item.value.replace(/\D/g, '');
                    $(this).val(ui.item.value);
                    var row = $(this).closest("tr");
                     row.find("input.single_kal").val(ui.item.calories);
                    row.closest('input.dcalories').val(ui.item.id);
                    if(row.find("input.quantity").val() == ''){
                        row.find("input.quantity").val(ui.item.quantity);
                        }   
                    var qty = +row.find("input.quantity").val();
                    var kal = +row.find("input.single_kal").val();
                    row.find("input.dcalories").val(qty*kal);
                    console.log(qty*kal);
                      }
                       return false;
                        },
            minlength: 1,
            });
    }
    $('.myTable').on('click', 'button.removeBtn', function () {
        var d = $(this);
        removeRow(d);

    });
    function removeRow(d) {
        var rowCount = $('.myTable tr').length;
        if (rowCount !== 2) {
            d.closest('tr').remove();
        } else {
            console.log('Atleast one sell is required');
        }
    }
    $(".myTable").on('change', 'input.quantity', function () {
        var row = $(this).closest("tr");
        var qty = +$(this).val();
        var kal = +row.find("input.single_kal").val();
        row.find("input.dcalories").val(qty*kal);
    });
$(".myTable").on('change', 'input.single_kal', function () {
    var row = $(this).closest("tr");
    var qty = +row.find("input.quantity").val(); 
    var kal = +$(this).val();
    row.find("input.dcalories").val(qty*kal);
    });
$('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
@endsection
