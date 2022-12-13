@component('mail::message')
# Introduction
{{  $details }}.
@component('mail::button', ['url' => '#'])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
