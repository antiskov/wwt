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
                            <p>1500 <span>UAH</span></p>
                        </div>
                        <form id="payment" method="POST" action="{{$url}}" accept-charset="utf-8">
{{--                        <form id="pay" method="POST"  accept-charset="utf-8">--}}
                            <input type="hidden" name="data" value="{{$data}}"/>
                            <input type="hidden" name="signature" value="{{$signature}}"/>
                            <button class="replenish" type="submit">Пополнить</button>
                        </form>
                    </div>
                    <div class="payment-items">
                        <div class="item-payment">
                            <div class="info-cont">
                                <div class="pay-info">
                                    <p>Дата:</p>
                                    <span>07. 09. 20</span>
                                </div>
                                <div class="pay-info">
                                    <p>Номер операции:</p>
                                    <span>076409820</span>
                                </div>
                            </div>
                            <div class="info-cont">
                                <div class="pay-info">
                                    <p>Услуга:</p>
                                    <span>Объявление VIP</span>
                                </div>
                                <div class="pay-info">
                                    <p>Цена:</p>
                                    <span>1500 UAH</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('#payment').on('click', function (e) {
                // e.preventDefault();
                $.ajax({
                    url: '/set_transaction',
                    data: $('#payment').serializeArray(),
                });
            });
        });
    </script>
@endsection

