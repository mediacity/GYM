@extends("layouts.master")
@section('title','All Coupans')
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ config('app.name') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Coupans') }}
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
@endsection
@section("maincontent")
<div class="card">
  <div class="card-header with-border">

    <a title="Create new Coupon" href="{{ route('coupans.create') }}" class="btn btn-md float-right btn-primary-rgba">
      <i class="fa fa-plus"></i> {{__("Create")}}
    </a>

    <div class="card-title">
      
      <h5 class="card-title">{{ __('Coupans') }}</h5>
      
    </div>

    
    
    
   
  </div>

  <div class="card-body">
    <table class="staticDataTable table table-bordered table-striped">
      <thead>
        <th>ID</th>
        <th>CODE</th>
        <th>Amount</th>
        <th>Max Usage</th>
        <th>Detail</th>
        <th>Action</th>
      </thead>


      <tbody>
        @foreach($coupans as $key=> $cpn)
        <tr>
          <td>{{ $key+1 }}</td>
          <td>{{ $cpn->code }}</td>
          <td>@if($cpn->distype == 'fix') <i class="fa fa-dollar"></i> @endif
            {{ $cpn->amount }}@if($cpn->distype == 'per')% @endif </td>
          <td>{{ $cpn->maxusage }}</td>
          <td>
            <p>Expiry Date: <b>{{ date('d-M-Y',strtotime($cpn->expirydate)) }}</b></p>
            <p>Discount Type: <b>{{ $cpn->distype == 'per' ? "Percentage" : "Fixed Amount" }}</b></p>
          </td>
          <td>
           
            <a title="Edit coupon" href="{{ route('coupans.edit',$cpn->id) }}" class="btn btn-sm btn-primary-rgba">
              <i class="fa fa-pencil"></i>
            </a>
           
            <a title="Delete coupon" data-toggle="modal" data-target="#coupon{{ $cpn->id }}" class="btn btn-sm btn-danger-rgba">
              <i class="fa fa-trash"></i>
            </a>
           
          </td>
         
          <div id="coupon{{ $cpn->id }}" class="delete-modal modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div class="delete-icon"></div>
                </div>
                <div class="modal-body text-center">
                  <h4 class="modal-heading">Are You Sure ?</h4>
                  <p>Do you really want to delete this Coupon ? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                  <form method="post" action="{{route('coupans.destroy',$cpn->id)}}" class="pull-right">
                    {{csrf_field()}}
                    {{method_field("DELETE")}}

                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
</div>
@endsection