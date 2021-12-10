<?php
    use Illuminate\Support\Facades\Crypt;
?>
@component('mail::message')
# Welcome {{$data->email}}
<p>
    Thank you for subscribing to our newsletter.
</p>
<p>
    We are delighted to have you with us
</p>

<small class="text-left text-xs bottom-0">You can <a href="{{route('newsletter.unsubscribe', [Crypt::encryptString($data->id),$data->email])}}" class="text-pink-400 underline">unsubscribe</a> at anytime</small>
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
