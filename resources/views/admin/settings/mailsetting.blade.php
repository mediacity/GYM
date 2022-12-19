@extends('layouts.master')
@section('title',__('Mail Settings'))
<!-- Start Breadcrumbbar -->
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __("Mail Settings") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Mail Settings') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@endsection
@section('maincontent')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Mail Settings') }}</h5>
            </div>

            <div class="card-body">
                  <form class="form" action="{{ route('mail.setting.save') }}" method="POST" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-dark">{{ __('Sender Name:') }} <small
                                class="text-muted text-info">(<b>{{ __("eg.") }}</b>{{ __(" John Doe)") }}</small></label>
                        <input name="MAIL_FROM_NAME" autofocus="" type="text" class="form-control"
                            placeholder="{{ __("enter sender name") }}" required="" value="{{ env('MAIL_FROM_NAME') }}">
                        <div class="invalid-feedback">
                            {{ __('Please sender name !') }}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">{{ __('Sender Address:') }} <small
                                class="text-muted text-info">(<b>{{ __("eg.") }}</b>
                                {{ __("info@example.com)") }}</small></label>
                        <input name="MAIL_FROM_ADDRESS" autofocus="" type="text" class="form-control"
                            placeholder="{{ __("enter your mail address") }}" value="{{ env('MAIL_FROM_ADDRESS') }}">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">{{ __('Mail Host:') }} <small
                                class="text-muted text-info">(<b>{{ __("eg.") }}</b>
                                {{ __(" smtp.gmail.com)") }}</small></label>
                        <input placeholder="{{ __("enter mail host") }}" class="form-control" type="text" name="MAIL_HOST"
                            value="{{ env('MAIL_HOST') }}">
                        <div class="invalid-feedback">
                            {{ __('Please mail host !') }}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">{{ __('Mail Driver:') }} <small
                                class="text-muted text-info">(<b>{{ __("eg.") }}</b>
                                {{ __("  smtp,sendmail,mail)") }}</small></label>
                        <input placeholder="{{ __("enter mail driver") }}" class="form-control" type="text" name="MAIL_DRIVER"
                            value="{{ env('MAIL_DRIVER') }}">
                        <div class="invalid-feedback">
                            {{ __('Please mail driver !') }}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">{{ __('Mail Username:') }}</label>
                        <input placeholder="{{ __("enter mail username") }}" class="form-control" type="text" name="MAIL_USERNAME"
                            value="{{ env('MAIL_USERNAME') }}">
                        <div class="invalid-feedback">
                            {{ __('Please mail username !') }}.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">{{ __('Mail Password:') }}</label>
                        <input placeholder="{{ __("enter mail password") }}" class="form-control" type="text" name="MAIL_PASSWORD"
                            value="{{ env('MAIL_PASSWORD') }}">
                        <div class="invalid-feedback">
                            {{ __('Please mail mail password !') }}.
                        </div>
                        <small class="text-primary text-muted text-info">{{ __("(") }}<b>{{ __("Note.") }}</b> {{ __("IF gmail is using as mail provider mustenable ") }}<b><a class="underline" href="https://www.google.com/landing/2step/">{{ __("2 StepVerification") }}</a></b> {{ __("and Than") }}
                            <b>{{ __("Create a app password") }}</b> {{ __("which will use here.)") }}</small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark">{{ __('Mail Encryption:') }} <small
                                class="text-muted text-info">{{ __("(") }}<b>{{ __("eg.") }}</b>
                                {{ __("TLS,SSL or NULL)") }}</small></label>
                        <input placeholder="{{ __("enter mail encryption") }}" class="form-control" type="text"
                            name="MAIL_ENCRYPTION" value="{{ env('MAIL_ENCRYPTION') }}">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i>
                            {{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
<!-- End Contentbar -->
