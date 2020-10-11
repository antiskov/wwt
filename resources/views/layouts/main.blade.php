@include('partials.global.head')
@include('partials.global.header')


@include('partials.global.footer-content')
@section('modals')
    @include('partials.modals.login')
    @include('partials.modals.registration')
@show
@include('partials.global.footer')
