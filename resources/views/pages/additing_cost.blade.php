@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            <form id="payment" method="POST" action="{{$pay['url']}}" accept-charset="utf-8">
                <input type="hidden" name="data" value="{{$pay['data']}}"/>
                <input type="hidden" name="signature" value="{{$pay['signature']}}"/>
                <h3>{{$pay['amount']}} {{$currency}}</h3>
                <button class="replenish" type="submit">Пополнить</button>
            </form>
        </div>
    </section>
@endsection
