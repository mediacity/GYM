@component('mail::message')
# {{ __('Registration successfull !') }}
{{ 'Welcome to '.config('app.name') }}
@component('mail::button', ['url' => config('app.url').'/login'])
{{ __('Login Now') }}
@endcomponent
{{ __('Thanks,') }}<br>
{{ config('app.name') }}
@endcomponent
