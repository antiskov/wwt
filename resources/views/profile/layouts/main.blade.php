@extends('layouts.main')

@section('content')
    <section class="setting">
        <div class="">
            <div class="container-wrap">
                @include('profile.modals.left-menu')
                @section('profile-content')
                @show
            </div>
        </div>
    </section>
@endsection
