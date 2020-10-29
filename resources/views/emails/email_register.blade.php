@component('mail::message')
    # Link verification email

    {{$codeEmail}}

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,{{ config('app.name') }}
@endcomponent
