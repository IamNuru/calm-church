@component('mail::message')
# Greetings from {{config('app.name')}}

Hi {{name}},
Thank you for subscribing to our news letter. <br>
We would keep you in the loop for any update concerning <b>{{config('app.name')}}</b> Church.

<p>
    You can unsubscribe anytime you want
</p>

<small class="text-center">
    Thank you once again for joining the family
</small>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
