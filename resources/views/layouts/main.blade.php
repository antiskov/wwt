@include('partials.global.head')
@include('partials.global.header')
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
