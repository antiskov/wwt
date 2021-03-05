@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="profile prof-control">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')
                <form action="{{ route('editing-profile-form') }}" method="post" class="block-profile"
                      enctype='multipart/form-data' id="profile_form">
                    @csrf
                    <h2 class="name-lk">{{__('messages.menu_editing_profile')}}</h2>
                    <div class="profile-header">
                        <div class="name-cont">
                            <h2>{{auth()->user()->name}} {{auth()->user()->surname}}</h2>
                            <div class="cont">
                                <div class="percent">
                                    <div class="chart" id="graph" data-percent="63"></div>
                                </div>
                                <div class="person-img">
                                    <img
                                        src="{{asset($avatarPath)}}"
                                        alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="name-setting">
                            <div class="photo-set">
                                <span>{{__('messages.editing_avatar')}}</span>
                                <input type="file" name="avatar" class="delete-photo" accept="image/x-png,image/gif,image/jpeg"
                                       id="input_avatar">
                            </div>
                            <div class="load-prof">
                                <p>{{__('messages.profile_filled')}}</p>
                                <p>на <span>{{$percentage + 10}}%</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="person-date">
                        <h2>{{__('messages.personal_data')}} </h2>
                        <label for="prof-surname">
                            {{__('messages.surname')}}
                            <input name="surname" type="text" id="prof-surname" value="{{auth()->user()->surname}}">
                        </label>
                        <label for="prof-name">
                            {{__('messages.name')}}
                            <input name="name" type="text" id="prof-name" value="{{auth()->user()->name}}">
                        </label>
                        <div class="select-price">
                            <p>{{__('messages.sex')}}</p>
                            <input name="sex" type="hidden" value={{auth()->user()->sex}}>
                            <div class="select-value rotate">
                                @if(auth()->user()->sex == 'man')
                                    <span>{{__('messages.sex_man')}}</span>
                                @else
                                    <span>{{__('messages.sex_woman')}}</span>
                                @endif
                                <ul class="value-items">
                                    <li>{{__('messages.sex_man')}}</li>
                                    <li>{{__('messages.sex_woman')}}</li>
                                </ul>
                            </div>
                        </div>
                        <label for="calendar">
                            {{__('messages.date_born')}}
                            <input name="birthday_date" type="date" id="calendar"
                                   value="{{auth()->user()->birthday_date}}">
                        </label>
                    </div>
                    <div class="contact-date">
                        <h2>{{__('messages.contacts')}}</h2>
                        <label for="prof-email">
                            {{__('messages.email')}} *
                            <input name="email" type="email" id="prof-email" value="{{ auth()->user()->email }}">
                        </label>
                        <label for="prof-phone">
                            {{__('messages.phone')}}
                            <input name="phone" type="tel" id="prof-phone" value="{{ auth()->user()->phone }}">
                        </label>
                    </div>
                    <div class="address-date">
                        <h2>{{__('messages.address_data')}}</h2>
                        <label for="route">
                            {{__('messages.put_address')}}
                            <input
                                id="autocomplete"
                                placeholder="{{__('messages.put_address')}}"
                                type="text"
                                autocomplete="nope"
                            />
                        </label>

                        <label for="route">
                            {{__('messages.street')}} *
                            <input type="text" id="route" readonly="true" name='street'
                                   value="{{ auth()->user()->street }}">
                        </label>
                        <label for="street_number">
                            {{__('messages.street_addition')}}
                            <input type="text" id="street_number" readonly="true" name="street_addition"
                                   value="{{auth()->user()->street_addition}}">
                        </label>
                        <label for="postal_code">
                            {{__('messages.mail_index')}}
                            <input type="text" id="postal_code" readonly="true" name="zip_code"
                                   value="{{auth()->user()->zip_code}}">
                        </label>
                        <label for="locality">
                            {{__('messages.town')}}
                            <input type="text" id="locality" readonly="true" name="city"
                                   value="{{auth()->user()->city}}">
                        </label>
                        <label for="street_number">
                            {{__('messages.country')}} *
                            <input type="text" id="country" readonly="true" name="country"
                                   value="{{auth()->user()->country}}">
                        </label>
                        <label for="street_number">
                            {{__('messages.region')}}
                            <input type="text" id="administrative_area_level_1" readonly="true" name="region"
                                   value="{{auth()->user()->region}}">
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

                        <input type="hidden" name="lat" data-id="lat">
                        <input type="hidden" name="lng" data-id="lng">

                    </div>
                    <div class="about-me">
                        <h2>{{__('messages.more_about_me')}}</h2>
                        <label for="prof-profession">
                            {{__('messages.professional')}}
                            <input name="specialisation" type="text" id="prof-profession"
                                   value="{{auth()->user()->specialisation}}">
                        </label>
                        <div class="select-price">
                            <p>{{__('messages.time_zone')}}</p>
                            <input name="timezone_id" type="hidden" name=""
                                   @if(auth()->user()->timezone_id)
                                   value="{{auth()->user()->timezone->title.' '.auth()->user()->timezone->time_difference}}"
                                   @else
                                   value=""
                                @endif>
                            <div class="select-value rotate">
                                @if(auth()->user()->timezone_id)
                                    <span>{{auth()->user()->timezone->title.' '.auth()->user()->timezone->time_difference}}</span>
                                @else
                                    <span>{{__('messages.settings_choose')}}</span>
                                @endif
                                <ul class="value-items">
                                    @foreach($timezones as $zone)
                                        <li>{{$zone->title.' '.$zone->time_difference}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="select-price aline">
                            <p>{{__('messages.language')}}</p>
                            <div class="lang-wrap">
                                <input type="hidden" name="" value="">
                                <div class="select-value select-value_multi rotate">
                                    <span>{{__('messages.add_language')}}</span>
                                    <ul class="value-items value-items_multi">
                                        <li>
                                            <label>
                                                <input name="lang[1]" type="checkbox" id="lang_1" value="Украинский"
                                                       @if(in_array('ua', $userLanguages))
                                                       checked
                                                    @endif
                                                >
                                                <span>{{__('messages.ukrainian')}}</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="lang[2]" type="checkbox" id="lang_2" value="Русский"
                                                       @if(in_array('ru', $userLanguages))
                                                       checked
                                                    @endif>
                                                <span>{{__('messages.russian')}}</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="lang[3]" type="checkbox" id="lang_3" value="English"
                                                       @if(in_array('en', $userLanguages))
                                                       checked
                                                    @endif>
                                                <span>{{__('messages.english')}}</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lang-result">
                                    @if(in_array('ua', $userLanguages))
                                        <label for="lang_1">
                                            <span>{{__('messages.ukrainian')}}</span>
                                            <img src="/images/icons/close.svg" alt="">
                                        </label>
                                    @endif
                                    @if(in_array('ru', $userLanguages))
                                        <label for="lang_2">
                                            <span>{{__('messages.russian')}}</span>
                                            <img src="/images/icons/close.svg" alt="">
                                        </label>
                                    @endif
                                    @if(in_array('en', $userLanguages))
                                        <label for="lang_3">
                                            <span>{{__('messages.english')}}</span>
                                            <img src="/images/icons/close.svg" alt="">
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <label for="description" class="textarea">
                            {{__('messages.description')}}
                            <textarea name="description" id="description">{{auth()->user()->description}}</textarea>
                        </label>
                    </div>
                    <div class="option-prof">
                        <div class="cont">
                            <a href="{{route('forgot_password')}}" class="change-pass">
                                {{__('messages.change_pass')}}
                            </a>
                        </div>
                        <button type="submit" class="save-profile btn-hover">
                            {{__('messages.save')}}
                        </button>
                    </div>
                    <a href="{{ route('delete-user') }}" class="delete-account-btn">
                        {{__('messages.delete_account')}}
                    </a>
                </form>
            </div>
        </div>
    </section>
    <script
        src="https://maps.google.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&libraries=places&language=ru"
        type="text/javascript"></script>
    <script src="/js/g-autocomplete.js"></script>
    <script>
        document.querySelector('#input_avatar').onchange = function () {
            const data = new FormData();
            const self = this;
            Object.keys(this.files).forEach((key, idx) => {
                data.append(`avatar`, self.files[idx])
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('upload_avatar')}}',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('.person-img').html(data.output);
                    $('.img-cont').html(data.output);
                },
            })
        }
    </script>
@endsection
