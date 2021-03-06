@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="profile prof-control">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')
                <section class="referral">
                    <div class="">
                        <div class="block-referral">
                            <h2 class="name-lk">{{__('messages.create_referral')}}</h2>
                            {{--                <p>--}}
                            {{--                    Если вы хотите порекомендовать кому-то нашу платформу ---}}
                            {{--                    вы можете создать реферальную ссылку введя данные нового пользователя--}}
                            {{--                </p>--}}
                            {{--                <form id="referral_from" action="{{route('create_referral')}}" method="post" class="referral">--}}
                            {{--                <form id="referral_from" type="get" class="referral">--}}
                            {{--                    @csrf--}}
                            {{--                    <label for="referral-email">--}}
                            {{--                        Введите email--}}
                            {{--                        <input type="email" name="email" id="referral-email">--}}
                            {{--                    </label>--}}
                            {{--                    <label for="referral-name">--}}
                            {{--                        Введите Имя--}}
                            {{--                        <input type="name" name="name" id="referral-name">--}}
                            {{--                    </label>--}}
                            {{--                    <button id="button_referral_from" class="referral-save btn-hover" type="submit">Сформировать--}}
                            {{--                    --}}
                            {{--                </form>--}}
                            {{--                <div class="referral">--}}
                            {{--                    <button id="button_referral_from" class="referral-save btn-hover" type="submit">Сформировать--}}
                            {{--                        ссылку--}}
                            {{--                    </button>--}}
                            {{--                </div>--}}
                            <div class="referral-link">
                                <a id="referral_link" href="{{$referral_link}}">
                                    {{$referral_link}}
                                </a>
                            </div>

                            <div class="block-thanks">
                                <p>
                                    {{__('messages.referral_thanks')}}
                                </p>
                                <p>
                                    {{__('messages.referral_info')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function (event) {--}}
{{--        console.log(111);--}}
{{--        $('#referral_from').on('submit', function(e){--}}
{{--            console.log(1);--}}
{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: {{route('create_referral')}},--}}
{{--                data: $('#referral_from').serializeArray(),--}}
{{--                success: function (data) {--}}
{{--                    $('#referral_link').empty();--}}
{{--                    $('#referral_link').html(data.link);--}}
{{--                }--}}
{{--            }).done(function () {--}}
{{--                $(this).addClass("done");--}}
{{--            })--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}
