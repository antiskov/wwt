@extends('profile_user.layouts.main')

@section('profile-content')
    <div id="save-search-modal" class="modal">
        <div class="modal__content">
            <h5 class="modal__title">{{__('messages.payments_addition_cost')}}</h5>
            <form id="save-search-form" class="change-pass-mail" method="post" action="{{route('set_transaction')}}"
                  accept-charset="utf-8">
                @csrf
<<<<<<< HEAD
                <input type="number" name="cost">{{$currency}}
                <button class="replenish" type="submit">Пополнить</button>
=======
                <input type="number" name="cost"> долларов США
                <button class="replenish" type="submit">{{__('messages.payments_addition_button')}}</button>
>>>>>>> 8948a19f1a39f70d03b42d8e5eb19bb3d226483c
            </form>
        </div>
    </div>
    <section class="payments">
        <div class="">
            <div class="block-payment">
                <h2 class="name-lk">{{__('messages.payments_list')}}</h2>
                <div class="payment-cont">
                    <div class="cont">
                        <div class="money">
<<<<<<< HEAD
                            <div>На вашем счету:</div>
                            <p>{{$score}}<span> {{$currency}}</span></p>
=======
                            <div>{{__('messages.payments_your_cost')}}</div>
                            <p>{{$score}}<span>$</span></p>
>>>>>>> 8948a19f1a39f70d03b42d8e5eb19bb3d226483c
                        </div>
                        <button class="replenish" data-fancybox data-src="#save-search-modal" href="javascript:;" type="submit">{{__('messages.payments_addition_button')}}</button>
                    </div>
                    <div class="payment-items">
                        @foreach($payments as $payment)
                            <div class="item-payment">
                                <div class="info-cont">
                                    <div class="pay-info">
                                        <p>{{__('messages.payments_date')}}</p>
                                        <span>{{$payment->created_at}}</span>
                                    </div>
                                    <div class="pay-info">
                                        <p>{{__('messages.payments_order_id')}}</p>
                                        <span>{{$payment->order_id}}</span>
                                    </div>
                                </div>
                                <div class="info-cont">
                                    <div class="pay-info">
                                        <p>{{__('messages.payments_service')}}</p>
                                        <span>{{$payment->title}}</span>
                                    </div>
                                    <div class="pay-info">
<<<<<<< HEAD
                                        <p>Цена:</p>
                                        <span>{{$payment->price}} {{$currency}}</span>
=======
                                        <p>{{__('messages.payments_price')}}</p>
                                        <span>{{$payment->price}}$</span>
>>>>>>> 8948a19f1a39f70d03b42d8e5eb19bb3d226483c
                                    </div>
                                    <div class="pay-info">
                                        <p>{{__('messages.payments_status')}}</p>
                                        <span>{{$payment->status}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

