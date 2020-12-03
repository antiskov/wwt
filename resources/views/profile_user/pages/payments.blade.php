@extends('profile_user.layouts.main')

@section('profile-content')
    <div id="save-search-modal" class="modal">
        <div class="modal__content">
            <h5 class="modal__title">Пополнение счета</h5>
            <form id="save-search-form" class="change-pass-mail" method="post" action="{{route('set_transaction')}}"
                  accept-charset="utf-8">
                @csrf
                <input type="number" name="cost"> долларов США
                <button class="replenish" type="submit">Пополнить</button>
            </form>
        </div>
    </div>
    <section class="payments">
        <div class="">
            <div class="block-payment">
                <h2 class="name-lk">Платежи</h2>
                <div class="payment-cont">
                    <div class="cont">
                        <div class="money">
                            <div>На вашем счету:</div>
                            <p>{{$score}}<span>$</span></p>
                        </div>
                        <button class="replenish" data-fancybox data-src="#save-search-modal" href="javascript:;" type="submit">Пополнить</button>
                    </div>
                    <div class="payment-items">
                        @foreach($payments as $payment)
                            <div class="item-payment">
                                <div class="info-cont">
                                    <div class="pay-info">
                                        <p>Дата:</p>
                                        <span>{{$payment->created_at}}</span>
                                    </div>
                                    <div class="pay-info">
                                        <p>Номер операции:</p>
                                        <span>{{$payment->order_id}}</span>
                                    </div>
                                </div>
                                <div class="info-cont">
                                    <div class="pay-info">
                                        <p>Услуга:</p>
                                        <span>{{$payment->title}}</span>
                                    </div>
                                    <div class="pay-info">
                                        <p>Цена:</p>
                                        <span>{{$payment->price}}$</span>
                                    </div>
                                    <div class="pay-info">
                                        <p>Статус</p>
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

