@extends('layouts.main')

@section('content')
    <section class="payment">
        <form id="payment" method="POST" action="{{$pay['url']}}" accept-charset="utf-8">
            <input type="hidden" name="data" value="{{$pay['data']}}"/>
            <input type="hidden" name="signature" value="{{$pay['signature']}}"/>
            <h1>{{__('messages.cost_pay')}}</h1>
            <p class="payment__total">{{$pay['amount']}} {{$currency}}</p>
            <div class="payment-buttons">
                <button class="primary-btn" type="submit">{{__('messages.additing_cost')}}</button>
                <a href="{{route('payments')}}" class="cancel-btn">{{__('messages.cancel')}}</a>
            </div>
        </form>
    </section>
@endsection
