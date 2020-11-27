<section class="main-slider swiper-container">
    <div class="swiper-wrapper">
        @if(isset($sliders))
            @foreach($sliders as $slider)
                <div class="main-slider-item swiper-slide">
                    <img src="{{asset('/storage/admin/sliders/'.$slider->image)}}" alt="фото слайдера 1" width="40%">
                    <div class="main-slider-item__content">
                        <div class="container">
                            <p>{{$slider->upper_text}}</p>
                            <h3>{{$slider->middle_text}}</h3>
                            <a href="{{$slider->link}}">Перейти</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</section>
