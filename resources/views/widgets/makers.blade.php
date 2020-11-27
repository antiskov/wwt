<section class="brands-slider swiper-container">
    <div class="swiper-wrapper">
        @foreach($makers as $maker)
        <a href="{{route('catalog', ['brands[]' => $maker->title])}}" class="brands-slider-item swiper-slide">
            <img src="{{asset('/storage/admin/makers/'.$maker->logo)}}" alt="партнер">
        </a>
        @endforeach
    </div>
</section>
