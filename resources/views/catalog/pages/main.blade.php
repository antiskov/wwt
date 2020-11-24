@extends('catalog.layouts.main')

@section('catalog-content')
    @include('catalog.modals.filter')
    <div id="save-search-modal" class="modal">
        <div class="modal__content">
            <h5 class="modal__title">Сохранить результат поиска</h5>
            <form id="save-search-form" class="change-pass-mail" action="#">
                <input name="search-result" type="text" placeholder="Название поиска" required>
                <span>Обязательное поле*</span>
                <div class="checkbox-block">
                    <label class="checkbox-block__label">
                        <input type="checkbox" name="newsletter">
                        <p><span>Получать новые объявления по эл. почте</span></p>
                    </label>
                </div>
                <div class="modal__buttons">
                    <a data-fancybox-close href="#">Отменить</a>
                    <button class="btn-arrow">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
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
        document.addEventListener("DOMContentLoaded", function (event) {
            $('#ajax_button').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: '/catalog/save_search/',
                    data: $('#filter').serializeArray(),
                    success: function (data) {
                        console.log('success');
                    },
                    error: function (xhr) {
                        console.log('error');
                    }
                }).done(function () {
                    $(this).addClass("done");
                })
            })
        });
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
        document.addEventListener("DOMContentLoaded", function (event) {
            if (!(window.location.href.indexOf("orderBy=dear") > -1) && !(window.location.href.indexOf("orderBy=cheap") > -1) && !(window.location.href.indexOf("page") > -1)) {
                document.cookie = "url_catalog="+window.location.href+"; max-age=600"
            }

            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ))
                return matches ? matches[1] : undefined
            }

            if (window.location.href.indexOf("?") > -1) {
                $('#sort-dear').on('click', function (e) {
                    window.location.replace(getCookie('url_catalog')+'&orderBy=dear')
                })
                $('#sort-cheap').on('click', function (e) {
                    window.location.replace(getCookie('url_catalog')+'&orderBy=cheap')
                })
            }
            if(!(window.location.href.indexOf("&") > -1)){
                $('#sort-dear').on('click', function (e) {
                    window.location.replace(getCookie('url_catalog')+'?orderBy=dear')
                })
                $('#sort-cheap').on('click', function (e) {
                    window.location.replace(getCookie('url_catalog')+'?orderBy=cheap')
                })
            }

            document.querySelector('#check_call').addEventListener('click', function (e) {
                if(!(window.location.href.indexOf("=new") > -1) && !(window.location.href.indexOf("page") > -1)) {
                    document.cookie = "for_check_age="+window.location.href+"; max-age=600"
                }
                if(document.getElementById("check_call").checked){
                    if (window.location.href.indexOf("?") > -1 && !(window.location.href.indexOf("=new") > -1)) {
                        window.location.replace(getCookie('for_check_age')+'&states%5B%5D=new');
                    }
                    if(!(window.location.href.indexOf("&") > -1) && !(window.location.href.indexOf("=new") > -1)){
                        window.location.replace(getCookie('for_check_age')+'?states%5B%5D=new');
                    }
                } else {
                    window.location.replace(getCookie('for_check_age'));
                }
            })
        });
    </script>
@endsection
