@extends('profile_user.layouts.main')

@section('profile-content')
<section class="favorite">
    <div class="">
        <div class="container-wrap">

            <div class="block-favorite">
                <h2 class="name-lk">Избранное (<span>67</span>)</h2>
                <div class="radio-wrap">
                    <input type="radio" name="tab-btn" id="abu-1" value="1" checked>
                    <label for="abu-1" class="anu-rad">Избранные объявления</label>
                    <input type="radio" name="tab-btn" id="abu-2" value="2" >
                    <label for="abu-2" class="anu-rad">Избранные поиски</label>
                    @include('profile_user.partials.favorite_block')
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.querySelectorAll('.radio-wrap input').forEach(function (item) {
            item.addEventListener('change', function (e) {
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
