@extends('profile_user.layouts.main')

@section('profile-content')

<div class="block-content">
    <h2 class="name-lk">Мои объявления </h2>
    <div class="radio-wrap">
        <input type="radio" name="tab-btn" id="abu-1" value="{{$statuses->where('title', 'moderation')->first()->id}}" checked>
        <label for="abu-1" class="anu-rad">{{__('messages.my_adverts_moderation')}}</label>
        <input type="radio" name="tab-btn" id="abu-2" value="{{$statuses->where('title', 'published')->first()->id}}" >
        <label for="abu-2" class="anu-rad">{{__('messages.my_adverts_active')}}</label>
        <input type="radio" name="tab-btn" id="abu-3" value="{{$statuses->where('title', 'draft')->first()->id}}" >
        <label for="abu-3" class="anu-rad">{{__('messages.my_adverts_draft')}}</label>
        <input type="radio" name="tab-btn" id="abu-4" value="{{$statuses->where('title', 'archive')->first()->id}}">
        <label for="abu-4" class="anu-rad">{{__('messages.my_adverts_archive')}}</label>
        @include('profile_user.partials.my_advert_div')
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.querySelectorAll('.radio-wrap input').forEach(function (item) {
            item.addEventListener('change', function (e) {
                $.ajax({
                    url: '/profile/my_adverts_change/'+this.value,
                    success: function (data) {
                        $('#advert').empty();
                        $('#advert').html(data.output);
                    },
                })
            })
        })
    });
</script>
@endsection
