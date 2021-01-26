<section class="two-categories">
    <div class="gradient gradient_two-categories">
        <div class="two-categories__content">
            <div class="two-categories__item">
                <a href="{{route('catalog', ['sexes[]' => 'man'])}}&" class="two-categories-item">
                    <div class="two-categories-item__content">
                        <img src="{{asset($man)}}">
                        <p>{{__('messages.man`s')}}</p>
                    </div>
                </a>
            </div>
            <div class="two-categories__item">
                <a href="{{route('catalog', ['sexes[]' => 'woman'])}}&" class="two-categories-item">
                    <div class="two-categories-item__content">
                        <img src="{{asset($woman)}}">
                        <p>{{__('messages.woman`s')}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
