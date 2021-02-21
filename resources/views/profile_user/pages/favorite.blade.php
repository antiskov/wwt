@extends('profile_user.layouts.main')

@section('profile-content')
    <section class="profile prof-control">
        <div class="">
            <div class="container-wrap">
                @include('profile_user.partials.left_menu')
                <section class="favorite">
                    <div class="">
                        <div class="block-favorite">
                            <h2 class="name-lk">{{__('messages.favorite')}} (<span>67</span>)</h2>
                            <div class="radio-wrap">
                                @if($status == '1')
                                    <input type="radio" name="tab-btn" id="abu-1" value="1" checked>
                                    <label for="abu-1" class="anu-rad">{{__('messages.favorite_adverts')}}</label>
                                    <input type="radio" name="tab-btn" id="abu-2" value="2">
                                    <label for="abu-2" class="anu-rad">{{__('messages.favorite_search')}}</label>
                                @else
                                    <input type="radio" name="tab-btn" id="abu-1" value="1">
                                    <label for="abu-1" class="anu-rad">{{__('messages.favorite_adverts')}}</label>
                                    <input type="radio" name="tab-btn" id="abu-2" value="2" checked>
                                    <label for="abu-2" class="anu-rad">{{__('messages.favorite_search')}}</label>
                                @endif
                                @include('profile_user.partials.favorite_block')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.querySelectorAll('.radio-wrap input').forEach(function (item) {
            item.addEventListener('change', function (e) {
                document.cookie = "status="+this.value+"; max-age=600"
                $.ajax({
                    url: '/profile/favorite/'+this.value,
                    success: function (data) {
                        $('#favorite_block').empty();
                        $('#favorite_block').html(data.output);
                    },
                })
            })
        })
    });
</script>
@endsection
