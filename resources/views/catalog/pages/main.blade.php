@extends('catalog.layouts.main')

@section('catalog-content')
    @include('catalog.modals.filter')
    @include('catalog.modals.global.tabs')
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        function query() {
            $.ajax({
                type: "get",
                url: '/catalog/count_results/1',
                data: $('.filters-desc').serializeArray(),
                success: function (data) {
                    console.log('success');
                    $('.desc-submit-btn').text('Применить (' + data.count + ")");
                },
                error: function (xhr) {
                    console.log('error');
                }
            }).done(function () {
                $(this).addClass("done");
            })
        };

        function queryMobile() {
            $.ajax({
                type: "get",
                url: '/catalog/count_results/1',
                data: $('.filters-mob').serializeArray(),
                success: function (data) {
                    console.log('success');
                    $('.mobile-submit-btn').text('Применить (' + data.count + ")");
                },
                error: function (xhr) {
                    console.log('error');
                }
            }).done(function () {
                $(this).addClass("done");
            })
        };

        $('.desc-filter').on('click', query);
        $('.desc-filter').on('change', query);

        $('.mobile-filter').on('click', queryMobile);
        $('.mobile-filter').on('change', queryMobile);
    });
</script>
@endsection
