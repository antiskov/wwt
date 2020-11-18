@extends('catalog.layouts.main')

@section('catalog-content')
    @include('catalog.modals.filter')
    <section class="main-items">
        <div class="main-items-wrap">
            <div class="tabs">
                <div class="change-option">
                    <div class="chek_cont">
                        <input type="checkbox" id="check_call" required checked>
                        <label class="caption placeholder" for="check_call"><p>Новые <span>/неношеные</span></p></label>
                    </div>
                </div>
                <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
                <label for="tab-btn-1" class="block-1"><img src="./images/icons/block-item.svg" alt=""></label>
                <input type="radio" name="tab-btn" id="tab-btn-2" value="" >
                <label for="tab-btn-2" class="block-2"><img src="./images/icons/line-item.svg" alt=""></label>

                <div class="wrap2">
                    <div class="currency-block">
                        <a href="#/">USD</a>
                        <a href="#/">UAH</a>
                        <a href="#/">EUR</a>
                    </div>

                    <div class="select-price">
                        <p>Сортировать:</p>
                        <div class="select-value">Самые дорогие</div>
                        <ul class="value-items">
                            <li><a href="#/">Самые дорогие</a></li>
                            <li><a href="#/">по релевантности</a></li>
                            <li><a href="#/">по возрастанию цены</a></li>
                            <li><a href="#/">по убыванию цены</a></li>
                            <li><a href="#/">по популярности</a></li>
                        </ul>
                    </div>
                </div>

                <span class="vip">VIP</span>

                <div class="counter-more">
                    <a href="#/" class="item-more">50</a>
                    <a href="#/" class="item-more">100</a>
                    <a href="#/" class="item-more">150</a>
                </div>

                @include('catalog.modals.item-cart', ['adverts' => $adverts])
                @include('catalog.modals.inline-item-cart', ['adverts' => $adverts])

                @include('catalog.modals.pagination')
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
        $('#filter').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url: '/catalog/',
                data: $('#filter').serializeArray(),
                datatype: 'html',
                success: function (data) {
                    console.log(1);
                    window.location.replace(document.location.href);
                    // window.location.reload()
                    // $('#fileter').empty();
                    // $('#fileter').html(data.output);

                    // console.log(data);
                    // console.log(data.errors);
                },
                error: function (xhr) {
                    console.log(22);
                    // if(xhr.status === 422) {
                    //     $('#reg-form-email').addClass('form-elem_err').removeClass('form-elem_success');
                    //     $('#reg-form-email + span').text(xhr.responseJSON.errors.email[0]);
                    // }
                }
            }).done(function() {
                $( this ).addClass( "done" );
            })
        })
        });
    </script>
@endsection
