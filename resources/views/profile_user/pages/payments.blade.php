@extends('profile_user.layouts.main')

@section('profile-content')
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
                        <form id="payment" method="POST" action="{{$pay['url']}}" accept-charset="utf-8">
                            <input type="hidden" name="data" value="{{$pay['data']}}"/>
                            <input type="hidden" name="signature" value="{{$pay['signature']}}"/>
                            <button class="replenish" type="submit">Пополнить</button>
                        </form>
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
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('#payment').on('click', function (e) {
                $.ajax({
                    url: '/set_transaction/{{$pay['order_id']}}',
                });
            });
        });
    </script>
@endsection

