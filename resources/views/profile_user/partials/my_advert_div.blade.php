    <div id="advert" class="items-anno">
    @foreach($adverts as $advert)
        <div class="items-wrap">
            <div class="announce-item">

{{--                <div class="chek_cont_set">--}}
{{--                    <label class="checkbox-other">--}}
{{--                        <input type="checkbox" checked>--}}
{{--                        <span></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
                <div class="cont">
                    <div class="img-wrap">
                        @if(isset($advert->photos->where('is_basic', 1)->first()->photo))
                            <img src="{{asset('/storage/images/notice_photos/'.$advert->type.'/number_'.$advert->id.'/'.$advert->photos->where('is_basic', 1)->first()->photo)}}">
                        @endif
                    </div>
                    <div class="ad-cont">
                        <div class="name-block">
                            <h2>{{$advert->title}}</h2>
                            <div class="data">
                                <p>
                                    <span>C: {{\Carbon\Carbon::create($advert->finish_date_active_status)->subMonth(2)->toDateString()}}</span>
                                    <span>По: {{$advert->finish_date_active_status}}</span>
                                </p>
                                @if($advert->vip_status == 1)
                                    <div>{{__('messages.bought_vip')}}</div>
                                @else
                                    <a href="{{route('submitting.buy_vip', $advert)}}" class="advertice">{{__('messages.ad')}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="price-block">
                            <div class="price">
                                <div class="new">
                                    {{$advert->getPrice()}} $
                                </div>
{{--                                <div class="old">--}}
{{--                                    1500$--}}
{{--                                </div>--}}
{{--                                <div class="soc-block">--}}
{{--                                    <a href="#/" class="soc-icon"></a>--}}
{{--                                    <a href="#/" class="soc-icon"></a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="data">
                                <p>
                                    <span>C: {{\Carbon\Carbon::create($advert->finish_date_active_status)->subMonth(2)->toDateString()}}</span>
                                    <span>По: {{$advert->finish_date_active_status}}</span>
                                </p>
                                @if($advert->vip_status == 1)
                                    <div>{{__('messages.bought_vip')}}</div>
                                @else
                                    <a href="{{route('submitting.buy_vip', $advert)}}" class="advertice">{{__('messages.ad')}}</a>
                                @endif
                            </div>
                            <div class="set-block">
                                <a href="{{route('catalog.item-page', [$advert])}}"
                                   class="sett">{{__('messages.my_adverts_div_show')}}</a>
                                @if($advert->status->title != 'moderation')
                                    <a href="{{route('submitting.get_draft', [$advert])}}"
                                       class="sett">{{__('messages.my_adverts_div_edit')}}</a>
                                    @if($advert->status->title != 'archive')
                                        <a href="{{ route('change_status', [$statuses->where('title', 'archive')->first()->id, $advert->id]) }}"
                                           class="sett">{{__('messages.my_adverts_div_close')}}</a>
                                    @endif
                                @endif
                                    <div class="soc-block">
                                        <input type="hidden" name="link-for-copy" value="{{route('catalog.item-page', [$advert])}}">
                                        <a href="#" class="sett btn-for-copy tooltip" title="{{__('messages.link_copied')}}">{{__('messages.share')}}</a>
                                    </div>
                            </div>
                        </div>
                        <div class="statistics-cont">
                            <div class="set-mob">
                                <a href="{{route('catalog.item-page', [$advert])}}"
                                   class="sett">{{__('messages.my_adverts_div_show')}}</a>
                                @if($advert->status->title != 'moderation')
                                    <a href="{{route('submitting.get_draft', [$advert])}}"
                                       class="sett">{{__('messages.my_adverts_div_edit')}}</a>
                                    @if($advert->status->title != 'archive')
                                        <a href="{{ route('change_status', [$statuses->where('title', 'archive')->first()->id, $advert->id]) }}"
                                           class="sett">{{__('messages.my_adverts_div_close')}}</a>
                                    @endif
                                @endif
                            </div>
                            <div class="static-items">
                                <div class="name-static">{{__('messages.my_adverts_div_statics')}}</div>
                                <div class="text"><img src="/images/icons/viewing.svg" alt="img">
                                    <p>{{__('messages.my_adverts_div_views')}}</p><span>{{views($advert)->count()}}</span></div>
                                <div class="text"><img src="/images/icons/phone.svg" alt="img">
                                    <p>{{__('messages.my_adverts_div_calls')}}</p><span>{{$advert->number_phone_show}}</span></div>
                                <div class="text"><img src="/images/icons/lk-star.svg" alt="img">
                                    <p>{{__('messages.my_adverts_div_favorite')}} </p><span>{{$advert->favoriteAdverts->count()}}</span></div>
                                <div class="text"><img src="/images/icons/email.svg" alt="img">
                                    <p>: </p><span>{{$advert->dialogsCount()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistics-cont">
                    <div class="set-mob">
                        <a href="{{route('catalog.item-page', [$advert])}}"
                           class="sett">{{__('messages.my_adverts_div_show')}}</a>
                        @if($advert->status->title != 'moderation')
                            <a href="{{route('submitting.get_draft', [$advert])}}"
                               class="sett">{{__('messages.my_adverts_div_edit')}}</a>
                            @if($advert->status->title != 'archive')
                                <a href="{{ route('change_status', [$statuses->where('title', 'archive')->first()->id, $advert->id]) }}"
                                   class="sett">{{__('messages.my_adverts_div_close')}}</a>
                            @endif
                        @endif
                    </div>
                    <div class="static-items">
                        <div class="name-static">{{__('messages.my_adverts_div_statics')}}</div>
                        <div class="text"><img src="/images/icons/viewing.svg" alt="img">
                            <p>{{__('messages.my_adverts_div_views')}}</p><span>{{views($advert)->count()}}</span></div>
                        <div class="text"><img src="/images/icons/phone.svg" alt="img">
                            <p>{{__('messages.my_adverts_div_calls')}}</p><span>{{$advert->number_phone_show}}</span></div>
                        <div class="text"><img src="/images/icons/lk-star.svg" alt="img">
                            <p>{{__('messages.my_adverts_div_favorite')}} </p><span>{{$advert->favoriteAdverts->count()}}</span></div>
                        <div class="text"><img src="/images/icons/email.svg" alt="img">
                            <p>: </p><span>7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        @if($adverts->count() >= 50)
            <div class="pagination">
                <div class="link-wrap">
                    {{$adverts->links('catalog.modals.custom_pagination')}}
                </div>
            </div>
        @endif
</div>
