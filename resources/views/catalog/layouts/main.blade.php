@extends('layouts.main')
@section('content')
    @section('catalog-content')
    @show
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.querySelector('#button-save-search').addEventListener('click', function (e) {
            document.cookie = 'search_title='+$('#input-save-search').val()+'; max-age=600'
        })
        $('#sort-dear').on('click', function (e) {
            $.ajax({
                url: '/set_order_price/dear',
                success: function (){
                    document.location.reload()
                }
            })
        })
        $('#sort-cheap').on('click', function (e) {
            $.ajax({
                url: '/set_order_price/cheap',
                success: function (){
                    document.location.reload()
                }
            })
        })
        $('#check_call').on('click', function (){
            $.ajax({
                url: '/set_order_new/',
                success: function (){
                    document.location.reload()
                }
            })
        })
        $('.reset-filters-btn').on('click', function (){
            document.location.replace('/catalog');
        })
    });
    document.addEventListener("DOMContentLoaded", function(event) {
        document.querySelectorAll('.catalog-heart').forEach(function (item){
            item.addEventListener('click', function (e){
                if(!this.classList.contains('active')) {
                    console.log(this);
                    $.ajax({
                        url: `/catalog/item_page_favorite/${this.getAttribute('data-id')}/1`,
                    })
                } else {
                    $.ajax({
                        url: `/catalog/item_page_favorite/${this.getAttribute('data-id')}/0`,
                    })
                }
            })
        })
    });

</script>
