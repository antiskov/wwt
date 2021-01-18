@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="profile prof-control">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')
                <div id="save-search-modal" class="modal">
                    <div class="modal__content">
                        <h5 class="modal__title">{{__('messages.payments_addition_cost')}}</h5>
                        <form id="save-search-form" class="change-pass-mail" method="post" action="{{route('set_transaction')}}"
                              accept-charset="utf-8">
                            @csrf
                            <input type="number" name="cost">{{$currency}}
                            <button class="replenish" type="submit">{{__('messages.payments_addition_button')}}</button>
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
                                        <div>На вашем счету:</div>
                                        <p>{{$score}}<span> {{$currency}}</span></p>
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
                                                    <p>{{__('messages.payments_price')}}</p>
                                                    <span>{{$payment->price}} {{$currency}}</span>
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
            </div>
        </div>
    </section>
@endsection

