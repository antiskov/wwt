@include('partials.global.head')
@widget('header_menu')
{{--@include('partials.global.header')--}}
@section('content')

@show

@include('partials.global.footer-content')
@section('modals')
    @include('partials.modals.login')
    @include('partials.modals.registration')
    @include('partials.modals.password')
    @include('partials.modals.need_authorization')
    @include('partials.modals.advertisement-modal')
    @include('partials.modals.success-modal')
@show
@section('scripts')

@endsection
@show
@include('partials.global.footer')

