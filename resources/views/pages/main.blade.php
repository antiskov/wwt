@extends('layouts.main')
@section('content')
    <div class="site-holder">
        @widget('slider')
        @widget('man_woman_pictures')
        @widget('makers')
{{--        @include('catalog.modals.filter')--}}
{{--        @include('catalog.modals.global.tabs')--}}
    </div>
@endsection
