@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __("Chart Demo") }}</div>
                 <div class="panel-body">
                    {!! $Chart->html() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{!! $Chart->script() !!}
@endsection
