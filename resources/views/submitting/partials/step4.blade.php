<div class="tabs-item">
    <h2>{{__('messages.personal_data')}}<span>{{__('messages.modal_password_span')}}</span></h2>
    <p class="tabs-item__subtitle">{{__('messages.preview')}}</p>
    @include('submitting.partials.preview_item_cart')

    <div class="ad-cost">
        <div class="ad-cost__price-block">
            <h2>{{__('messages.cost_advert')}}</h2>
            <div class="ad-cost-price ad-cost__price">
                <ul class="ad-cost-price__list">
                    <li>
                        <p>{{__('messages.cost_advert')}}</p>
                        <p>0.00 ₴</p>
                    </li>
                    <li>
                        <p>{{__('messages.show_date')}}</p>
                        <p>3 месяца</p>
                    </li>
                </ul>
            </div>
        </div>

        {{--        <input type="hidden" data-step-input>--}}

        <div class="sale-premium ad-cost__sale-premium">
            <h5 class="sale-premium__title">{{__('messages.sale_info')}}</h5>
            <p class="sale-premium__price">45</p>

            <ul class="sale-premium__list">
                <li>{{__('messages.vip_info')}}</li>
                <li>{{__('messages.vip_info')}}</li>
            </ul>
        </div>

        <div class="rules-user ad-cost__rules-user">
            <h5 class="rules-user__title">{{__('messages.wwt_rule_1')}}</h5>
            <ul class="rules-user__list">
                <li>{{__('messages.wwt_rule_2')}}</li>
                <li>{{__('messages.wwt_rule_3')}}</li>
                <li>{{__('messages.wwt_rule_4')}}</li>
                <li>{{__('messages.wwt_rule_5')}}</li>
            </ul>
        </div>
    </div>
    @if($advert->vip_status == 0 && ($advert->user_id == auth()->user()->id))
        <h3><a href="{{route('submitting.buy_vip', $advert)}}">{{__('messages.buy_vip')}}</a></h3>
    @elseif($advert->vip_status == 1)
        <h3>{{__('messages.bought_vip')}}</h3>
    @endif

    {{--    <div class="checkbox-block checkbox-block_submitting-page">--}}
    {{--        <label class="checkbox-block__label">--}}
    {{--            <input type="checkbox" name="Victorinox"--}}
    {{--                   value="Nouvelle Horlogerie Calabrese (NHC)">--}}
    {{--            <p><span>я не хочу, чтобы моя фамилия была указана в объявлении</span></p>--}}
    {{--        </label>--}}
    {{--    </div>--}}

    <div class="btn-cont step-4-cont">
{{--        <button data-step="3" class="prev-step btn-hover" type="button">Вернуться к шагу 3</button>--}}
        <button data-step="3" class="prev-step btn-hover" type="button">{{__('messages.go_to_step3')}}</button>

        <button class="save-edit btn-hover-w" type="submit">{{__('messages.save_like_draft')}}</button>

        <button id="publish" class="save-next btn-hover" type="button"><a
                href="{{route('submitting.publish', $advert)}}">{{__('messages.send_to_moderator')}}</a></button>
    </div>
</div>
<script>
    document.querySelector('#publish').onclick = function () {
        $.ajax({
            data: $('#create_advert').serializeArray(),
            type: 'post',
            url: "/submitting/draft/{{$advert->id}}",
        })
    }
</script>
