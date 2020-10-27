@component('mail::message')
# Introduction

The body of your message.

password: {{ $passwordSend }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
