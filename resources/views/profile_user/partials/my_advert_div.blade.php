<div id="advert" class="items-anno">
    @foreach($adverts as $advert)
        <div class="items-wrap">
            <div class="announce-item">
                <div class="chek_cont_set">
{{--                    <label class="checkbox-other">--}}
{{--                        <input type="checkbox" checked>--}}
{{--                        <span></span>--}}
{{--                    </label>--}}
                </div>

                <!--    <div class="chek_cont">-->
                <!--        <input type="checkbox" id="check_per" required checked>-->
                <!--        <label for="check_per"></label>-->
                <!--    </div>-->

                <div class="cont">
                    <div class="img-wrap">
                        <img src="{{asset('/storage/'.$advert->photo)}}" alt="img">
                        <img src="{{asset('/storage/'.$advert->photo)}}" alt="img">
                    </div>
                    <div class="ad-cont">
                        <div class="name-block">
                            <h2>{{$advert->title}}</h2>
{{--                            <button class="advertice">Реклама</button>--}}
                            <div class="data">
                                {{--                                    <p>--}}
                                {{--                                        <span>С: 26. 07. 12</span>--}}
                                {{--                                        <span>По: 26. 07. 12</span>--}}
                                {{--                                    </p>--}}
{{--                                <button class="advertice">Реклама</button>--}}
                            </div>
                        </div>
                        <div class="price-block">
                            <div class="price">
                                <div class="new">
                                    {{$advert->price}}$
                                </div>
                                {{--                                    <div class="old">--}}
                                {{--                                        1500$--}}
                                {{--                                    </div>--}}
                                <div class="soc-block">
                                    <a href="#/" class="soc-icon"></a>
                                    <a href="#/" class="soc-icon"></a>
                                </div>
                            </div>
                            <div class="data">
                                <button class="advertice">Реклама</button>
                            </div>
                            <div class="set-block">
                                <a href="{{route('catalog.item-page', [$advert])}}" class="sett">{{__('messages.my_adverts_div_show')}}</a>
                                <a href="#/" class="sett">{{__('messages.my_adverts_div_edit')}}</a>
                                <a href="#/" class="sett">{{__('messages.my_adverts_div_close')}}</a>
                                <div class="soc-block">
                                    <input type="hidden" name="link-for-copy" value="{{route('catalog.item-page', [$advert])}}">
                                    <a href="#" class="sett btn-for-copy tooltip" title="Ссылка успешно скопирована в буффер обмена!">Поделиться</a>
                                </div>
                            </div>
                        </div>
                        <div class="statistics-cont">
                            <div class="set-mob">
                                <a href="#/" class="sett">{{__('messages.my_adverts_div_show')}}</a>
                                <a href="#/" class="sett">{{__('messages.my_adverts_div_edit')}}</a>
                                <a href="#/" class="sett">{{__('messages.my_adverts_div_close')}}</a>
                            </div>
                            <div class="static-items">
                                <div class="">{{__('messages.my_adverts_div_statics')}}</div>
                                <div class="text"><img src="/images/icons/viewing.svg" alt="img">
                                    <p>{{__('messages.my_adverts_div_views')}}</p><span>{{views($advert)->count()}}</span></div>
                                <div class="text"><img src="/images/icons/phone.svg" alt="img">
                                    <p>{{__('messages.my_adverts_div_calls')}}</p><span>{{$advert->number_phone_show}}</span></div>
                                <div class="text"><img src="/images/icons/lk-star.svg" alt="img">
                                    <p>{{__('messages.my_adverts_div_favorite')}} </p><span>{{$advert->favoriteAdverts->count()}}</span></div>
                                <div class="text"><img src="/images/icons/email.svg" alt="img">
                                    <p>: </p><span>7</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="statistics-cont">
                        <div class="set-mob">
                            <a href="#/" class="sett">{{__('messages.my_adverts_div_show')}}</a>
                            <a href="#/" class="sett">{{__('messages.my_adverts_div_edit')}}</a>
                            <a href="#/" class="sett">{{__('messages.my_adverts_div_close')}}</a>
                        </div>
                        <div class="static-items">
                            <div class="name-static">{{__('messages.my_adverts_div_statics')}}</div>
                            <div class="text"><img src="/images/icons/viewing.svg" alt="img">: <p>{{__('messages.my_adverts_div_views')}}</p><span>{{views($advert)->count()}}</span></div>
                            <div class="text"><img src="/images/icons/phone.svg" alt="img">: <p>{{__('messages.my_adverts_div_calls')}}</p><span>{{$advert->number_phone_show}}</span></div>
                            <div class="text"><img src="/images/icons/lk-star.svg" alt="img">: <p>{{__('messages.my_adverts_div_favorite')}}</p><span>{{$advert->favoriteAdverts->count()}}</span></div>
                            <div class="text"><img src="/images/icons/email.svg" alt="img">: <p>: </p><span>7</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
