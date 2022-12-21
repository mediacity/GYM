@extends('layouts.master')
@section('title',__('Referal link'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Referal Link") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Referal Link') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="shadow-sm mt-3 card text-center">
    <div class="card-body">
        <div class="form-group">
            <input type="text" readonly class="text-dark text-center form-control cptext" value="{{ route('register',['refercode' => auth()->user()->refer_code ]) }}">
        </div>
      <a href="#" class="copylink btn btn-primary">
          {{ __("CopyLink") }}
      </a>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('.copylink').on('click', function () {
            $(this).text('Copied !');
            var copyText = $('.cptext').val();
            console.log(copyText);
            $('.cptext').select();
            document.execCommand("copy");
        });
    </script>
@endsection



