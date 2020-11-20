@include('partials.global.head')
@widget('header_menu')
{{--@include('partials.global.header')--}}
@widget('ad_banner')
@section('content')

@show

@include('partials.global.footer-content')
@section('modals')
    @include('partials.modals.login')
    @include('partials.modals.registration')
    @include('partials.modals.password')
@show
@section('scripts')
@endsection
@show
@include('partials.global.footer')

