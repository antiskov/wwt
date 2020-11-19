@extends('catalog.layouts.main')

@section('catalog-content')
    @include('catalog.modals.filter')
    @include('catalog.modals.global.tabs')
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
    </script>
@endsection
