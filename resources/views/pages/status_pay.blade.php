@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            @if($status == 1)
                <h1>{{__('messages.success_payment')}}</h1>
            @else
                <h1>{{__('messages.failed_payment')}}</h1>
            @endif
        </div>
    </section>
@endsection
