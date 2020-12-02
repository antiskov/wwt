@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            @if($status == 1)
                <h1>Успешный платеж</h1>
            @else
                <h1>Неудачный платеж</h1>
            @endif
        </div>
    </section>
@endsection
