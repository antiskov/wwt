<div class="tabs__content " data-tab="3">
    <div class="tabs-item">
        <h2>{{__('messages.personal_data')}}<span>{{__('messages.modal_password_span')}}</span></h2>
        <label for="prof-surname-sub">
            {{__('messages.surname')}} *
            @if(isset($advert) && $advert->surname)
                <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{$advert->surname}}">
            @else
                <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{auth()->user()->surname}}">
            @endif
        </label>
        <label for="prof-name-sub">
            {{__('messages.name')}} *
            @if(isset($advert) && $advert->name)
                <input data-step-input  type="text" id="prof-name-sub" name="name" value="{{$advert->name}}">
            @else
                <input data-step-input  type="text" id="prof-name-sub" name="name" value="{{auth()->user()->name}}">
            @endif
        </label>
{{--        <label for="calendar">--}}
{{--            Дата рождения--}}
{{--            @if(isset($advert  &&$advert->birthday_date)--}}
{{--                <input data-step-input type="text" id="prof-surname-sub" name="surname" value="{{$advert->birthday_date}}">--}}
{{--            @else--}}
{{--                <input data-step-input  type="date" id="calendar" name="birthday_date" value="{{auth()->user()->birthday_date}}">--}}
{{--            @endif--}}
{{--        </label>--}}
        <label for="prof-phone">
            {{__('messages.phone')}} *
            @if(isset($advert) && $advert->phone)
                <input data-step-input name="phone" type="tel" id="prof-phone"  value="{{$advert->phone}}">
            @else
                <input data-step-input name="phone" type="tel" id="prof-phone" value="{{ auth()->user()->phone }}">
            @endif
        </label>

        <div class="address-date">
            <h2>{{__('messages.space')}}</h2>

            <!--    Двіжуха з автокомплітами       -->
            <label for="route">
                {{__('messages.put_address')}}
                <input
                    id="autocomplete"
                    placeholder="{{__('messages.put_address')}} "
                    type="text"
                />
            </label>

            <label for="route">
                {{__('messages.street')}} *
                @if(isset($advert) && $advert->street)
                    <input type="text" id="route" readonly="true" name='street' value="{{ $advert->street }}">
                @else
                    <input type="text" id="route" readonly="true" name='street' value="{{ auth()->user()->street }}">
                @endif
            </label>
            <label for="street_number">
                {{__('messages.street_addition')}}
                @if(isset($advert) && $advert->street_additional)
                    <input type="text" id="street_number" readonly="true" name="street_additional"
                           value="{{$advert->street_additional}}">
                @else
                    <input type="text" id="street_number" readonly="true" name="street_additional"
                           value="{{auth()->user()->street_addition}}">
                @endif
            </label>
            <label for="postal_code">
                {{__('messages.mail_index')}}
                @if(isset($advert) && $advert->zip_code)
                    <input type="text" id="postal_code" readonly="true" name="zip_code" value="{{$advert->zip_code}}">
                @else
                    <input type="text" id="postal_code" readonly="true" name="zip_code" value="{{auth()->user()->zip_code}}">
                @endif
            </label>
            <label for="locality">
                {{__('messages.town')}}
                @if(isset($advert) && $advert->city)
                    <input type="text" id="locality" readonly="true" name="city" value="{{$advert->city}}">
                @else
                    <input type="text" id="locality" readonly="true" name="city" value="{{auth()->user()->city}}">
                @endif
            </label>
            <label for="street_number">
                {{__('messages.country')}}  *
                @if(isset($advert) && $advert->country)
                    <input type="text" id="country" readonly="true" name="country" value="{{$advert->country}}">
                @else
                    <input type="text" id="country" readonly="true" name="country" value="{{auth()->user()->country}}">
                @endif
            </label>
            <label for="street_number">
                {{__('messages.region')}}
                @if(isset($advert) && $advert->region)
                    <input type="text" id="administrative_area_level_1" readonly="true" name="region" value="{{$advert->region}}">
                @else
                    <input type="text" id="administrative_area_level_1" readonly="true" name="region" value="{{auth()->user()->region}}">
                @endif
            </label>



            <!--       автокоплит, вдруг надо будет             -->
            <!--                    <div class="autocomplete-input" data-autocomplete>-->
            <!--                        <p>Область</p>-->
            <!--                        <div class="autocomplete-input__block">-->
            <!--                            <div class="autocomplete-input__holder">-->
            <!--                                <input type="text">-->
            <!--                            </div>-->
            <!--                            <div class="autocomplete-input__content">-->
            <!--                                <ul data-id="dropdownContent"></ul>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->

            <!--   Двіжуха з корами               -->
            <input type="hidden" name="lat" data-id="lat">
            <input type="hidden" name="lng" data-id="lng">

        </div>


        <div class="check-cont">
            <label class="checkbox-other">
                @if(isset($advert) && $advert->is_publish_surname == 0)
                    <input type="checkbox" name="is_publish_surname" checked value="1">
                @else
                    <input type="checkbox" name="is_publish_surname" value="1">
                @endif
                <span>{{__('messages.shadow_surname')}} *</span>
            </label>
        </div>

        <div class="block-data-cont">
            <div class="text-cont">
                <h3>{{__('messages.security_personal_data')}}</h3>
                <p class="text-item">
                    {{__('messages.security_personal_data_1')}}
                </p>
                <p class="text-item">
                    {{__('messages.security_personal_data_2')}}
                </p>
                <div class="text-item">
                    {{__('messages.security_personal_data_3')}}
                    <div class="img-cont">
                        <img src="/images/icons/secure-data.svg" alt="img">
                        <img src="/images/icons/shild.svg" alt="img">
                    </div>
                </div>
            </div>
            <div class="img-cont">
                <img src="/images/icons/secure-data.svg" alt="img">
                <img src="/images/icons/shild.svg" alt="img">
            </div>
        </div>

        <div class="btn-cont step-3-cont">
            <button data-step="2" class="prev-step btn-hover" type="button">{{__('messages.go_to_step2')}}</button>
            @if(isset($advert))
            <button class="save-edit btn-hover-w" type="submit">{{__('messages.save_like_draft')}}</button>

            <button data-step="4" data-id-adv="{{$advert->id}}" class="save-next btn-hover" type="button">{{__('messages.go_to_step4')}}</button>
                @else
                <button class="save-edit btn-hover-w" type="submit">{{__('messages.save_like_draft')}}</button>
                @endif
        </div>
    </div>
</div>
