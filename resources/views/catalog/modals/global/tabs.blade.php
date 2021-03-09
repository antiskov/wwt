<section id="catalog-page" class="main-items">
    <div  class="main-items-wrap">
        <div class="tabs">
            <div class="change-option">
                <div class="chek_cont">
                    @if(Session::has('orderNew') && Session::get('orderNew') == 1)
                        <input type="checkbox" id="check_call" checked>
                    @else
                        <input type="checkbox" id="check_call">
                    @endif
                    <label class="caption placeholder" for="check_call"><p>Новые <span>/неношеные</span></p></label>
                </div>
            </div>
            <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
            <label for="tab-btn-1" class="block-1"><img src="/images/icons/block-item.svg" alt=""></label>
            <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
            <label for="tab-btn-2" class="block-2"><img src="/images/icons/line-item.svg" alt=""></label>

            <div class="wrap2">
                <div id="currencies" class="currency-block">
                    @foreach($currencies as $item)
                    <a href="{{route('catalog.set_rate', $item->title)}}"
                    @if(Session::get('currency') == $item->title)
                        class="active"
                    @endif
                    >{{$item->title}}</a>
                    @endforeach
                </div>

                <div class="select-price">
                    <p>{{__('messages.sort')}}</p>
                    <div class="select-value rotate">
                        @if(Session::has('orderPrice'))
                            @if(Session::get('orderPrice') == 'dear')
                                <span>{{__('messages.price_reduction')}}</span>
                            @else
                                <span>{{__('messages.rising_prices')}}</span>
                            @endif
                        @else
                            <span>{{__('messages.rising_prices')}}</span>
                        @endif
                        <ul class="value-items">
                            <li id="sort-dear">{{__('messages.price_reduction')}}</li>
                            <li id="sort-cheap">{{__('messages.rising_prices')}}</li>
                        </ul>
                    </div>
                </div>
            </div>


            <span class="vip">VIP</span>

            <div class="counter-more">
                @if(Cookie::has('countPagination'))
                    <a href="{{route('count-pagination', [50])}}"
                       class="item-more @if(Cookie::get('countPagination') == 50) active @endif">50</a>
                    <a href="{{route('count-pagination', [100])}}"
                       class="item-more @if(Cookie::get('countPagination') == 100) active @endif">100</a>
                    <a href="{{route('count-pagination', [150])}}"
                       class="item-more @if(Cookie::get('countPagination') == 150) active @endif">150</a>
                @else
                    <a href="{{route('count-pagination', [50])}}" class="item-more active">50</a>
                    <a href="{{route('count-pagination', [100])}}" class="item-more">100</a>
                    <a href="{{route('count-pagination', [150])}}" class="item-more">150</a>
                @endif
            </div>

            @include('catalog.modals.item-cart', ['adverts' => $adverts])
            @include('catalog.modals.inline-item-cart', ['adverts' => $adverts])

            @include('catalog.modals.pagination')
        </div>
    </div>
    <script>
        document.querySelector('#currencies').onclick = function () {
            document.cookie = "price_sort= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
        }
    </script>
</section>
