@extends('catalog.layouts.main')

@section('catalog-content')
<section class="seller-ads">
    <div class="seller-prod">
        <div class="prs-cont">
            <div class="img-wrap">
                <img src="{{asset($linkAvatar)}}"
                     alt="img">
            </div>
            <div class="cont">
                <div class="person-name">{{$user->name}}</div>
                <span>{{$countUserAdverts->count}} {{__('messages.count_adverts')}}</span>
            </div>

        </div>
    </div>
    <section class="main-items">
        <div class="main-items-wrap">
            <div class="choose-filter">
                <ul class="choose-filter__content">
{{--                    <li class="active"><a href="#">Все</a></li>--}}
                    <li class="active"><a href="#">{{__('messages.watches')}}</a></li>
                    <li><a href="#">{{__('messages.accessories')}}</a></li>
                    <li><a href="#">{{__('messages.spare_parts')}}</a></li>
                </ul>
            </div>
            @include('catalog.modals.filter')
            @include('catalog.modals.global.tabs')
        </div>
    </section>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        function query() {
            $.ajax({
                type: "get",
                url: '{{route('catalog.seller-ads.count-results', [3, $user->id])}}',
                data: $('.filter-search').serializeArray(),
                success: function (data) {
                    console.log('success');
                    $('.filters-submit-btn').text('Применить (' + data.count + ")");
                },
                error: function (xhr) {
                    console.log('error');
                }
            }).done(function () {
                $(this).addClass("done");
            })
        };

        $('.watch-filter').on('click', query);
        $('.watch-filter').on('change', query);
    });
</script>
@endsection
