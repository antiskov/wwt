@extends('catalog.layouts.main')

@section('catalog-content')
    @include('catalog.modals.filter')
    @include('catalog.modals.global.tabs')
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        function query() {
            $.ajax({
                type: "get",
                url: '/catalog/count_results',
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
