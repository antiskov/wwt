@extends('layouts.main')
@section('content')
    @section('catalog-content')
    @show
@endsection
<script>
    // document.addEventListener("DOMContentLoaded", function(event) {
    // $('#filter').on('submit', function(e){
    //     e.preventDefault();
    //     $.ajax({
    //         type:"get",
    //         url: '/catalog/filter_json',
    //         data: $('#filter').serializeArray(),
    //         success: function (data) {
    //             console.log(1);
    //             $('#catalog-page').empty();
    //             $('#catalog-page').html(data.output);
    //         },
    //         error: function (xhr) {
    //             console.log(22);
    //             // if(xhr.status === 422) {
    //             //     $('#reg-form-email').addClass('form-elem_err').removeClass('form-elem_success');
    //             //     $('#reg-form-email + span').text(xhr.responseJSON.errors.email[0]);
    //             // }
    //         }
    //     }).done(function() {
    //         $( this ).addClass( "done" );
    //     })
    // })
    // });
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     $('#ajax_button').on('click', function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "get",
    //             url: '/catalog/save_search/',
    //             data: $('#filter').serializeArray(),
    //             success: function (data) {
    //                 console.log('success');
    //             },
    //             error: function (xhr) {
    //                 console.log('error');
    //             }
    //         }).done(function () {
    //             $(this).addClass("done");
    //         })
    //     })
    // });



    document.addEventListener("DOMContentLoaded", function(event) {
        document.querySelector('#button-save-search').addEventListener('click', function (e) {
            document.cookie = 'search_title='+$('#input-save-search').val()+'; max-age=600'
        })
        $('#sort-dear').on('click', function (e) {
            $.ajax({
                url: '/set_order_by/dear',
                success: function (){
                    document.location.reload()
                }
            })
        })
        $('#sort-cheap').on('click', function (e) {
            $.ajax({
                url: '/set_order_by/cheap',
                success: function (){
                    document.location.reload()
                }
            })
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
