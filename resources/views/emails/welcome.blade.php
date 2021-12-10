@component('mail::message')
# Welcome to {{ config('app.name') }}

Hi name;<br>
Thank you for joining <b>{{ config('app.name') }}</b> Community.



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
