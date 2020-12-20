<section id="catalog-page" class="main-items">
    <div  class="main-items-wrap">
        <div class="tabs">
            <div class="change-option">
                <div class="chek_cont">
                    @if($stateNew == 1)
                        <input type="checkbox" id="check_call" value="111" checked>
                    @else
                        <input type="checkbox" id="check_call" value="111">
                    @endif
                    <label class="caption placeholder" for="check_call"><p>Новые <span>/неношеные</span></p></label>
                </div>
            </div>
            <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
            <label for="tab-btn-1" class="block-1"><img src="/images/icons/block-item.svg" alt=""></label>
            <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
            <label for="tab-btn-2" class="block-2"><img src="/images/icons/line-item.svg" alt=""></label>

            <div class="wrap2">
                <div class="currency-block">
                    @foreach($currencies as $item)
                    <a href="{{route('catalog.set_rate', $item->title)}}">{{$item->title}}</a>
                    @endforeach
                </div>

                <div class="select-price">
                    <p>Сортировать:</p>
                    <div class="select-value rotate">
                        @if(isset($_COOKIE['price_sort']))
                            @if($_COOKIE['price_sort'] == 'dear')
                                <span>по возрастанию цены</span>
                            @else
                                <span>по убыванию цены</span>
                            @endif
                        @endif
                        <ul class="value-items">
                            <li id="sort-dear">по возрастанию цены</li>
                            <li id="sort-cheap">по убыванию цены</li>
                        </ul>
                    </div>
                </div>
            </div>


            <span class="vip">VIP</span>

            <div class="counter-more">
                <a href="{{route('count-pagination', [50])}}" class="item-more">50</a>
                <a href="{{route('count-pagination', [100])}}" class="item-more">100</a>
                <a href="{{route('count-pagination', [150])}}" class="item-more">150</a>
            </div>

            @include('catalog.modals.item-cart', ['adverts' => $adverts])
            @include('catalog.modals.inline-item-cart', ['adverts' => $adverts])

            @include('catalog.modals.pagination')
        </div>
    </div>
</section>
