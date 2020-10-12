@include('partials.global.head')
@include('partials.global.header')


@include('partials.global.footer-content')
@section('modals')
    @include('partials.modals.login')
    @include('partials.modals.registration')
    @include('partials.modals.password')
@show
@section('scripts')

@show
@include('partials.global.footer')
