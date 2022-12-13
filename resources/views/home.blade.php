@extends('layouts.app')
@section('content')
<!-- Start Contentbar -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('successMsg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('successMsg') }}
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contentbar -->
@if(auth()->user()->SuperAdmin)
@forelse($notifications as $notification)
<div class="alert alert-success" role="alert">
    [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) {{ __("has
    just registered.") }}
    <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
        {{ __("  Mark as read") }}
    </a>
</div>

@if($loop->last)
<a href="#" id="mark-all">
    {{ __("  Mark all as read") }}
</a>
@endif
@empty
{{ __("There are no new notifications") }}
@endforelse
@endif
@endsection