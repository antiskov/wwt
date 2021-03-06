@extends('layouts.main', ['pageTitle' => __('messages.404_error')])

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            <img src="/images/content/e404.png" alt="e404">
            <h2>
                {{__('messages.not_found_page')}}
            </h2>
        </div>
    </section>
@endsection
