@extends('layouts.master')
@section('title',__('Referal link'))
@section('maincontent')
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Referal Link') }}
@endslot

@slot('menu1')
{{ __('Referal Link') }}
@endslot
@endcomponent
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



