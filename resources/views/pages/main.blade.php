@extends('layouts.main')
@section('content')
    <div class="site-holder">
        @widget('slider')
        @widget('man_woman_pictures')
<<<<<<< HEAD
        @widget('makers')
{{--        @include('catalog.modals.filter')--}}
{{--        @include('catalog.modals.global.tabs')--}}
=======
        <section class="brands-slider swiper-container">
            <div class="swiper-wrapper">
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/1.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/2.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/3.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/5.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/7.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/8.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/9.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/1.png" alt="партнер">
                </a>
                <a href="#" class="brands-slider-item swiper-slide">
                    <img src="./images/content/partners/2.png" alt="партнер">
                </a>
            </div>
        </section>
        @include('catalog.modals.filter')
        @include('catalog.modals.global.tabs')
>>>>>>> b8ea1ad44c9ab7e155925f0ddd005c4695219d3e
    </div>
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

        document.addEventListener("DOMContentLoaded", function(event) {
            document.querySelector('#button-save-search').addEventListener('click', function (e) {
                document.cookie = 'search_title='+$('#input-save-search').val()+'; max-age=600'
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
            if (!(window.location.href.indexOf("orderBy=dear") > -1)
                && !(window.location.href.indexOf("orderBy=cheap") > -1)
                && !(window.location.href.indexOf("page") > -1))
            {
                document.cookie = "url_catalog="+window.location.href+"; max-age=600"
            }

            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ))
                return matches ? matches[1] : undefined
            }

            if(!(window.location.href.indexOf("&") > -1)){
                $('#sort-dear').on('click', function (e) {
                    window.location.replace(getCookie('url_catalog')+'?orderBy=dear')
                })
                $('#sort-cheap').on('click', function (e) {
                    window.location.replace(getCookie('url_catalog')+'?orderBy=cheap')
                })
            } else {
                if (window.location.href.indexOf("?") > -1) {
                    if(window.location.href.indexOf("=new") > -1 && window.location.href.indexOf("&") > -1){
                        if(getCookie('url_catalog').indexOf("?") > -1) {
                            $('#sort-dear').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '&states%5B%5D=new&orderBy=dear&')
                            })
                            $('#sort-cheap').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '&states%5B%5D=new&orderBy=cheap&')
                            })
                        } else {
                            $('#sort-dear').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '?states%5B%5D=new&orderBy=dear&')
                            })
                            $('#sort-cheap').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '?states%5B%5D=new&orderBy=cheap&')
                            })
                        }
                    } else {
                        if(window.location.href.indexOf("=new") > -1 && !(window.location.href.indexOf("&") > -1)){
                            $('#sort-dear').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '?states%5B%5D=new&orderBy=dear&')
                            })
                            $('#sort-cheap').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '?states%5B%5D=new&orderBy=cheap&')
                            })
                        } else {
                            $('#sort-dear').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '&orderBy=dear&')
                            })
                            $('#sort-cheap').on('click', function (e) {
                                window.location.replace(getCookie('url_catalog') + '&orderBy=cheap&')
                            })
                        }
                    }
                }
            }

            document.querySelector('#check_call').addEventListener('click', function (e) {
                if(!(window.location.href.indexOf("=new") > -1) && !(window.location.href.indexOf("page") > -1)) {
                    document.cookie = "for_check_age="+window.location.href+"; max-age=600"
                }
                if(document.getElementById("check_call").checked){
                    if (window.location.href.indexOf("?") > -1 && !(window.location.href.indexOf("=new") > -1)) {
                        window.location.replace(getCookie('for_check_age')+'&states%5B%5D=new&');
                        console.log(1);
                    } else {
                        if(!(window.location.href.indexOf("&") > -1) && !(window.location.href.indexOf("=new") > -1)){
                            window.location.replace(getCookie('for_check_age')+'?states%5B%5D=new&');
                            console.log(2);
                        }
                    }
                } else {
                    window.location.replace(getCookie('for_check_age'));
                }
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
@endsection

