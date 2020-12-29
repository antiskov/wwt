<section class="two-categories">
    <div class="gradient gradient_two-categories">
        <div class="two-categories__content">
            <div class="two-categories__item">
                <a href="{{route('catalog', ['sexes[]' => 'man'])}}&" class="two-categories-item">
                    <div class="two-categories-item__content">
                        <img src="{{asset($man)}}" alt="Мужские часы">
                        <p>Мужские</p>
                    </div>
                </a>
            </div>
            <div class="two-categories__item">
                <a href="{{route('catalog', ['sexes[]' => 'woman'])}}&" class="two-categories-item">
                    <div class="two-categories-item__content">
                        <img src="{{asset($woman)}}" alt="Женские часы">
                        <p>Женские</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
