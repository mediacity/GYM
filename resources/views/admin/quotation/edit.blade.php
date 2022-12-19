@extends('layouts.master')
@section('title',__('Edit Quotation :eid -',['eid' => $quotation->id]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Quotation") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Quotation') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block  text-right">
                <a href="{{route('quotation.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
 {!! Form::model($quotation, ['method' => 'PATCH', 'route' => ['quotation.update', $quotation->id], 'files' =>
            true , 'class' => 'form form-light' , 'novalidate']) !!}


    <!-- Start row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Date: ") }}<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input value="{{ $quotation->date }}" name="date" type="text" id="calendar"
                                        class="calendar form-control" placeholder="{{ __("yyyy/mm/dd") }}"
                                        aria-describedby="basic-addon2">
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

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group{{ $errors->has('Name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('name', null, ['class' => 'form-control',
                                'required','placeholder' => 'Please Enter Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Email:") }} <span class="text-danger">*</span></label>
                                <input value="{{ $quotation['email'] }}" autofocus="" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __("Enter Your email") }} required="">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Mobile:") }}<span class="text-danger">*</span></label>
                                <input value="{{ $quotation['mobile']}}" title="enter valid no." pattern="[0-9]{10}"
                                    type="text" class="form-control" placeholder="{{ __("Enter valid mobile no.") }}" required
                                    name="mobile">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Address: ") }}<span
                                        class="text-danger">*</span></label>
                                <textarea required="" class="@error('line1') is-invalid @enderror form-control"
                                    id="address" name="address"
                                    placeholder="{{ __("Enter Your Address here") }}">{{ $quotation['address'] }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select Country: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select country") }}" required="" name="country_id"
                                    id="country_id" class="country @error('country_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Select country") }}</option>
                                    @foreach ($countries as $country)
                                    <option {{ $quotation->country_id != '' && $quotation->country_id == $country->id ? "selected" : "" }}
                                        value="{{ $country->id }}"> {{ $country->nicename }} </option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="invalid-feedback">
                                    {{ __('Please select country') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select State: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select state") }}" required="" name="state_id" id="state_id"
                                    class="states @error('state_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Please select state") }}</option>
                                    @if(isset($quotation->country->states))
                                    @foreach ($quotation->country->states as $state)

                                    <option {{ $quotation->state_id == $state->id ? "selected" : "" }}
                                        value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="invalid-feedback">
                                    {{ __('Please select state') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select City: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select city") }}" required="" name="city_id" id="city_id"
                                    class="cities @error('city_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Please select city") }}</option>
                                    @if(isset($quotation->state->cities))
                                    @foreach ($quotation->state->cities as $city)
                                    <option {{ $quotation->city_id == $city->id ? "selected" : "" }} value="{{ $city->id }}">
                                        {{ $city->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                 <div class="invalid-feedback">
                                    {{ __('Please select city') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Pincode: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ $quotation['pincode'] }}" required="" type="text" pattern="[0-9]{6}"
                                placeholder="{{ __("enter pincode") }}" name="pincode" class="form-control" >
                                @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label class="text-dark">{{ __("Order Details: ") }}<span class="text-danger">*</span></label>
                                <table class="myTable table table-bordered table-responsive" id="table_field">
                                    <thead>
                                        <tr>
                                            <th>{{ __("ProductName") }}</th>
                                            <th>{{ __("Quantity") }}</th>
                                             <th>{{ __("Price") }}</th>
                                            <th>{{ __("Total") }}</th>
                                             <th> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotation->subquotation as $t)
                                        <tr id="tableBody" class="tbody">
                                            <td><input type="text" name="productname"
                                                    class="productname form-control @error('productname') is-invalid @enderror"
                                                    value="{{$t->productname}}">
                                                
                                            </td>
                                            <td><input type="number" min="1" name="quantity"
                                                    class="form-control quantity  @error('quantity') is-invalid @enderror"
                                                    value="{{$t->quantity}}">
                                            </td>
                                            <td><input type="number" min="1" name="price"
                                                    class="form-control price  @error('price') is-invalid @enderror"
                                                    value="{{$t->price}}">
                                            </td>

                                            <td><input type="text" name="total"
                                                    class="form-control total @error('total') is-invalid @enderror"
                                                    value="{{$t->total}}">
                                                </td>
                                            <td><button class="btn addNew btn-success" type="button" name="add" id="add"
                                                    value="+">
                                                    +</button>
                                            </td>
                                            <td><button class="btn removeBtn btn-danger" type="button">
                                                    -</button>
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('additionalnote') ? ' has-error' : '' }}">
                                {!! Form::label('additionalnote', 'Additionalnote',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::textarea('additionalnote', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Additionalnote']) !!}
                                <small class="text-danger">{{ $errors->first('additionalnote') }}</small>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <div class="form-group">
                                <label class="text-dark">{{ __("Subtotal:") }} <span class="text-danger">*</span></label>
                                <input value="{{ $quotation['subtotal'] }}" autofocus="" type="number" name="subtotal"  id="subtotal" 
                                    class="form-control @error('subtotal') is-invalid @enderror"
                                    placeholder={{ __("Enter Your Subtotal") }} required="">

                                @error('subtotal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                           
                            
                            <div class="form-group">
                                <label class="text-dark">{{ __("Tax: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ $quotation['tax'] }}" autofocus="" type="number" name="tax"  id="tax"  
                                    class="form-control @error('tax') is-invalid @enderror"
                                    placeholder={{ __("Enter Your Tax") }} required="">

                                @error('tax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label class="text-dark">{{ __("GrandTotal: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ $quotation['grandtotal'] }}" autofocus="" type="number" name="grandtotal"  id="grandtotal"
                                    class="form-control @error('grandtotal') is-invalid @enderror"
                                    placeholder="{{ __("Enter Your Grandtotal" ) }}"required="">

                                @error('grandtotal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                             <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                            <div class="custom-switch">
                                {!! Form::checkbox('is_active', 1,$quotation->is_active==1 ? 1 : 0, ['id' => 'switch1',
                                'class' => 'custom-control-input']) !!}
                                <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                            </div>
                        </div>
                         <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                {{ __("Update") }}</button>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
      {!! Form::close() !!}
</form>
    @endsection
        @section('script')
      
        <script>
            $(document).ready(function () {
                $(".details").each(function (index) {
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
    
                $('input.details').last().focus();
    
                enableAutoComplete($("input.details:last"));
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
    
                var price = +row.find("input.price").val();
                
                 row.find("input.total").val(qty * price);
    
    
            });
    
            $(".myTable").on('change', 'input.price', function () {
    
                var row = $(this).closest("tr");
    
                var qty = +row.find("input.quantity").val();
    
                var price = +$(this).val();
    
                row.find("input.total").val(qty * price);
    
            });
            $('.calendar').each(function () {
                $(this).datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });
            });
            var stateurl = @json(route('list.state'));
            var cityurl = @json(route('list.cities'));
            $(document).ready(function() {
            function compute() {
          var a = $('#subtotal').val();
          var b = $('#tax').val();
          var total = a*(b/100);
          var grandtotal=parseInt(a) + parseInt(total);;
          
          $('#grandtotal').val(grandtotal);
        }
  
        $('#subtotal, #tax').change(compute);

    // $("#tax, #subtotal").on('input', function(){
    // var su = $('#subtotal').val();
    // var ta = $('#tax').val();
    // var total = su*(ta/100);
    // var grandtotal = parseInt(su)+parseInt(total);
    // //document.getElementById("grandtotal").innerHTML = grandtotal;
    //     console.log(grandtotal);
    // // document.getElementById("grandtotal").innerHTML = grandtotal;
    // // $('#tax').html(grandtotal);
});
        </script>

        @endsection
        
