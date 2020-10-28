$(document).ready(function () {
    $('.favorite-icon').click(function () {
        $(this).toggleClass('active')
    });

    $('.mob-menu-btn').click(function () {
        $('.mob-menu').addClass('open');
    });

    $('.mob-menu-btn-close').click(function () {
        $('.mob-menu').removeClass('open');
        $('.catalog-mob__gen-list li').removeClass('active');
    });

    $('.link-items li').click(function () {
        $('.link-items li').removeClass('active')
        $(this).addClass('active')
    });

    $('.close').click(function () {
        $('.bg-cont').removeClass('active');
        $('.person-block').removeClass('active');
    });

    $('.search-input-holder input, .filters-search-field').on('focus', function () {
        $(this).parent().find('.clear-field-btn').addClass('showed');
    })
    $('.search-input-holder input, .filters-search-field').on('blur', function () {
        if ($(this).val().length > 0) {
            return;
        }
        $(this).parent().find('.clear-field-btn').removeClass('showed');
    })
    $('.clear-field-btn').on('click', function () {
        $(this).parent().parent().find('input').val('');
        $('.filters-mob li, .filters-desc li').css('display', '');
        $(this).removeClass('showed');
    })

    $(window).width(function () {
        let windowWidthMob = $('body').innerWidth();

        if (windowWidthMob < 1023) {
            $('.login-btn').click(function () {
                $('.bg-cont').addClass('active');
                $('.person-block').addClass('active');
            });
        }

        $('.item-messages').click(function () {
            $('.chat-cont').addClass('active')
            $('.chat-cont .cont').addClass('active')
        })

        $('.back-chat').click(function () {
            $('.chat-cont').removeClass('active')
            $('.chat-cont .cont').removeClass('active')
        })

    });

    // $('.input-search-modal').attr('placeholder', 'идентификационный номер,' + '\n' + 'марка, модель ...');

    // $('.input-search-modal').attr('placeholder', 'hello' + '\n' + 'world');


    $('.catalog-mob__gen-list li.has-menu > span').on('click', function (e) {
        e.stopPropagation();
        if ($(this).parent().hasClass('active')) {
            $(this).parent().find('li').removeClass('active');
            $(this).parent().removeClass('active');
        } else {
            $(this).parent().addClass('active');
        }
    });

    $('.filters-mob-list > li > p').on('click', function () {
        if ($(this).parent().hasClass('opened')) {
            $('.filters-mob-list > li').removeClass('opened');
        } else {
            $('.filters-mob-list > li').removeClass('opened');
            $(this).parent().addClass('opened');
        }
        $(this).parent().children('ul').toggleClass('opened');
    })

    function searchFiltersCheckboxes(input) {
        // Declare variables
        var filter, ul, li, checkbox;
        filter = input.val().toUpperCase();
        ul = $(`#${input.attr('data-search-list')}`);
        li = ul.find('li');

        // Loop through all list items, and hide those who don't match the search query

        li.each(function () {
            checkbox = $(this).find('input');
            console.log(ul)
            console.log(checkbox)
            if (checkbox.val().toUpperCase().indexOf(filter) !== -1) {
                $(this).css("display", "block");
            } else {
                $(this).css('display', 'none');
            }
        })
    }

    $('.filters-search-field').on('change keyup', function () {
        searchFiltersCheckboxes($(this))
    })

    $('.filters-mob-list > li').on('change', function () {
        if ($(this).find('input:checked').length > 0) {
            $(this).addClass('selected');
        } else {
            $(this).removeClass('selected');
        }
    })

    $('.filters-mob-list > li').each(function () {
        if ($(this).find('input:checked').length > 0) {
            $(this).addClass('selected');
        } else {
            $(this).removeClass('selected');
        }
    })

    var $priceRangeMob = $("#slider-price-mob"),
        $priceInputFromMob = $("#slider-price-mob-from"),
        $priceInputToMob = $("#slider-price-mob-to"),
        instance,
        min = $priceRangeMob.data('min'),
        max = $priceRangeMob.data('max'),
        from = $priceRangeMob.data('from'),
        to = $priceRangeMob.data('to');

    $priceRangeMob.ionRangeSlider({
        skin: "round",
        type: "double",
        hide_min_max: true,
        onStart: updateMobInputs,
        onChange: updateMobInputs,
    });
    instance = $priceRangeMob.data("ionRangeSlider");

    function updateMobInputs(data) {
        from = data.from;
        to = data.to;

        $priceInputFromMob.prop("value", from);
        $priceInputToMob.prop("value", to);
    }

    $priceInputFromMob.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < min) {
            val = min;
        } else if (val > to) {
            val = to;
        }

        instance.update({
            from: val
        });
    });

    $priceInputToMob.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < from) {
            val = from;
        } else if (val > max) {
            val = max;
        }

        instance.update({
            to: val
        });
    });

    var $priceRangeDesc = $("#slider-price-desc"),
        $priceInputFromDesc = $("#slider-price-desc-from"),
        $priceInputToDesc = $("#slider-price-desc-to"),
        instance,
        min = $priceRangeDesc.data('min'),
        max = $priceRangeDesc.data('max'),
        from = $priceRangeDesc.data('from'),
        to = $priceRangeDesc.data('to');

    $priceRangeDesc.ionRangeSlider({
        skin: "round",
        type: "double",
        hide_min_max: true,
        onStart: updateDescInputs,
        onChange: updateDescInputs,
    });

    function updateDescInputs(data) {
        from = data.from;
        to = data.to;

        $priceInputFromDesc.prop("value", from);
        $priceInputToDesc.prop("value", to);
    }

    instance = $priceRangeDesc.data("ionRangeSlider");

    $priceInputFromDesc.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < min) {
            val = min;
        } else if (val > to) {
            val = to;
        }

        instance.update({
            from: val
        });
    });

    $priceInputToDesc.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < from) {
            val = from;
        } else if (val > max) {
            val = max;
        }

        instance.update({
            to: val
        });
    });

    $('.change-input img').on('click', function () {

        const input = $(this).parent().children('input');

        input.prop('disabled') === true
            ? input.attr('disabled', false)
            : input.attr('disabled', true)
    })
    $(document).on('click', '.password-input img', function () {
        const passwordInputBlock = $(this).parent();
        const image = $(this).parent().children('img');
        const input = $(this).parent().children('input');

        passwordInputBlock.toggleClass('text');

        if (passwordInputBlock.hasClass('text')) {
            input.prop('type', 'text');
            image.prop('src', './images/icons/yey-open.svg');
        } else {
            input.prop('type', 'password');
            image.prop('src', './images/icons/yey-close.svg');
        }
    })

    $('.tabs__caption').hScroll(30);

    $('.reset-filters-btn').on('click', function () {
        $('.filters-mob li, .filters-desc li').css('display', '');
    })

    $('.open-mob-filter-btn').on('click', function () {
        $(this).toggleClass('opened');
        $('.filters-mob-content').toggleClass('opened');
    })

    $('ul.filters-desc-nav li').on('click', function () {
        var tab_id = $(this).attr('data-tab');

        if ($(this).hasClass('active')) {
            $('ul.filters-desc-nav li').removeClass('active');
            $('.filters-desc-category').removeClass('active');
            $('.filters-desc-categories').removeClass('active');
        } else {
            $('ul.filters-desc-nav li').removeClass('active');
            $('.filters-desc-category').removeClass('active');

            $(this).addClass('active');
            $('.filters-desc-categories').addClass('active');
            $("#" + tab_id).addClass('active');
        }
    })

    $('.filters-desc__close-btn').on('click', function () {
        $('ul.filters-desc-nav li').removeClass('active');
        $('.filters-desc-category').removeClass('active');
        $('.filters-desc-categories').removeClass('active');
    })

    $('.filters-more-item__list > p').on('click', function () {
        if ($(this).parent().hasClass('active')) {
            $('.filters-more-item__list').removeClass('active');
        } else {
            $('.filters-more-item__list').removeClass('active');
            $(this).parent().addClass('active')
        }
    })

    $('.rotate').click(function () {
        $('.value-items').removeClass('active')
        $('.rotate').removeClass('active')

        $(this).closest('.select-price').find('.value-items').addClass('active')
        $(this).closest('.select-price').find('.rotate').addClass('active')
    });

    $('.sep-cont').click(function () {
        $(this).closest('.sep-cont').find('.select-value-set').toggleClass('active')

        $(this).find('.value-items-set').toggleClass('active');
    });

    $('.value-items li').click(function () {
        $('.value-items').removeClass('active');
        $('.rotate').removeClass('active');

        $(this).parent().parent().find('span').text($(this).text())
        $(this).parent().parent().parent().find('input[type="hidden"]').val($(this).text())

        $('.value-items li').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on("click", function (e) {
        if ($(e.target).is(".select-value") === false) {
            $('.value-items').removeClass('active')
            $('.rotate').removeClass('active')
        }
    });

    $(".info-icon").hover(
        function () {
            $(this).closest('.select-price').find('.input-info').addClass('active')
        }, function () {
            $(this).closest('.select-price').find('.input-info').removeClass('active')
        }
    );

    $('.checkboxes-list input').on('click', function () {
        // console.log($(this).closest('.checkboxes-list').attr('id'))
    })

    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");

    $(".custom-select .select-items").on("click", function () {
        $(this).parent().children("select").removeClass("form-elem_err")
    })

    $('#login-form').validate({
        rules: {
            name: {
                required: true
            },
        },
        errorClass: 'form-elem_err',
        validClass: 'form-elem_success',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('#login-form input').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('#login-form input').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function (error, element) {

        }
    });

    $('#registration-form').validate({
        rules: {
            name: {
                required: true
            },
            password: {
                required: true
            },
            "repeat-password": {
                required: true,
                equalTo: "#reg-pass"
            },
            "data-protection": {
                required: true
            },
            mailing: {
                required: true
            }
        },
        errorClass: 'form-elem_err',
        validClass: 'form-elem_success',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('#registration-form input').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('#registration-form input').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function (error, element) {

        }
    });

    $('#registration-form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: '/register-user',
            data: $('#registration-form').serializeArray(),
            datatype: 'html',
            success: function (data) {
                $('#registration-form').empty();
                $('#registration-form').html(data.output);

                // console.log(data.output);
                // console.log(data.errors);
            },
            error: function (xhr) {
                if(xhr.status === 422) {
                    $('#reg-form-email').addClass('form-elem_err').removeClass('form-elem_success');
                    $('#reg-form-email + span').text(xhr.responseJSON.errors.email[0]);
                }
            }
        }).done(function() {
            $( this ).addClass( "done" );
        })
    });

    $('#login-form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url: '/check-login-email',
            data: $('#login-form').serializeArray(),
            datatype: 'html',
            success: function (data) {
                console.log('1');
                $('#login-form').empty();
                $('#login-form').html(data.output);

                console.log(data.output);
                //console.log(data.errors);
            },
            // error: function (xhr) {
            //     if(xhr.status === 422) {
            //         $('#login-email-form').addClass('form-elem_err').removeClass('form-elem_success');
            //         $('#login-email-form + span').text(xhr.responseJSON.errors.email[0]);
            //     }
            // }
        }).done(function() {
            $( this ).addClass( "done" );
        })
    });

    $('#password-form').validate({
        rules: {
            name: {
                required: true
            },
            password: {
                required: true
            }
        },
        errorClass: 'form-elem_err',
        validClass: 'form-elem_success',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('#password-form input').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('#password-form input').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function (error, element) {

        }
    });

    $('#change-pass-mail-form').validate({
        rules: {
            mail: {
                required: true
            },
        },
        errorClass: 'form-elem_err',
        validClass: 'form-elem_success',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('#change-pass-mail-form input').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('#change-pass-mail-form input').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function (error, element) {

        }
    });

    $('#change-pass-form').validate({
        rules: {
            password: {
                required: true
            },
            "repeat-password": {
                required: true,
                equalTo: "reg-pass"
            }
        },
        errorClass: 'form-elem_err',
        validClass: 'form-elem_success',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('#change-pass-form input').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('#change-pass-form input').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function (error, element) {

        }
    });

    $('#introduce-yourself-form').validate({
        rules: {
            name: {
                required: true
            },
            surname: {
                required: true
            },
            male: {
                required: true,
                valueNotEquals: "default"
            },
        },
        errorClass: 'form-elem_err',
        validClass: 'form-elem_success',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('#introduce-yourself-form input').addClass(errorClass).removeClass(validClass);
            $(element).closest('#introduce-yourself-form select').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('#introduce-yourself-form input').removeClass(errorClass).addClass(validClass);
            $(element).closest('#introduce-yourself-form select').removeClass(errorClass).addClass(validClass);
        },
        errorPlacement: function (error, element) {

        }
    });

    let nameQty = 1;
    $('.form-ref-number__plus-btn').on('click', function () {
        const name = $(this)
        .parent()
        .children('label')
        .children('input')
        .attr('name')
        .split('_')[0];

        nameQty++;

        $(this)
            .parent()
            .append(
                `<label>
                    <span class="form-ref-number__remove-btn"></span>
                    ref номер*
                    <input type="text" name="${name}_${nameQty}">
                </label>`
            );
    })

    $(document).on('click', '.form-ref-number__remove-btn', function() {
        $(this).parent().remove();
    })

    var mainSlider = new Swiper('.main-slider', {
        // Optional parameters
        loop: true,
        effect: 'fade',

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            renderFraction: function () {
                return '<span class="swiper-pagination-current"></span>' +
                    ' | ' +
                    '<span class="swiper-pagination-total"></span>';
            },
        },
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })

    $('.main-slider .main-slider-item').each(function () {
        $(this).attr('data-swiper-slide-index') % 2 != 0 && $(this).addClass('unpaired');
    });

    var brandsSlider = new Swiper('.brands-slider', {
        loop: true,
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1000,
        centeredSlides: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        breakpoints: {
            768: {
                slidesPerView: 6,
            },
            1024: {
                slidesPerView: 8,
            },
            1280: {
                slidesPerView: 10,
            },
        },
    })

    $('.seller-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<div class="prev-arrow"></div>',
        nextArrow: '<div class="next-arrow"></div>',
    })

    $('ul.tabs__caption').on('click', 'li:not(.active)', function () {
        $(this)
            .addClass('active').siblings().removeClass('active')
            .closest('.tabs-mess').find('.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
    });



    $('.currency-block a').click(function () {
        $('.currency-block a').removeClass('active')
        $(this).addClass('active')
    })

    $('.counter-more a').click(function () {
        $('.counter-more a').removeClass('active')
        $(this).addClass('active')
    })


    $('.item-messages').first().addClass('active') //---remove before back

    //---- slider item page
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 8,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        // direction: 'vertical',
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });

    // var galleryThumbsMod = new Swiper('.nav-nav', {
    //     spaceBetween: 10,
    //     slidesPerView: 5,
    //     freeMode: true,
    //     watchSlidesVisibility: true,
    //     watchSlidesProgress: true,
    //     direction: 'vertical',
    // });
    // var galleryTopMod = new Swiper('.nav-top', {
    //     spaceBetween: 10,
    //     navigation: {
    //         nextEl: '.swiper-button-next',
    //         prevEl: '.swiper-button-prev',
    //     },
    //     thumbs: {
    //         swiper: galleryThumbsMod
    //     }
    // });

    //---added images step 2
    $('#addImages').attr('title', '');

    var maxFileSize = 2 * 1024 * 1024; // (байт) Максимальный размер файла (2мб)
    var queue = {};
    var form = $('form#uploadImages');
    var imagesList = $('#uploadImagesList');

    var itemPreviewTemplate = imagesList.find('.item.template').clone();
    itemPreviewTemplate.removeClass('template');
    imagesList.find('.item.template').remove();


    $('#addImages').on('change', function () {
        var files = this.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if (!file.type.match(/image\/(jpeg|jpg|png|gif)/)) {
                // alert( 'Фотография должна быть в формате jpg, png или gif' );
                continue;
            }

            if (file.size > maxFileSize) {
                alert('Размер фотографии не должен превышать 2 Мб');
                continue;
            }

            preview(files[i]);
        }

        this.value = '';
    });

    // Создание превью
    function preview(file) {
        var reader = new FileReader();
        reader.addEventListener('load', function (event) {
            var img = document.createElement('img');

            var itemPreview = itemPreviewTemplate.clone();

            itemPreview.find('.img-wrap img').attr('src', event.target.result);
            itemPreview.data('id', file.name);

            imagesList.append(itemPreview);

            queue[file.name] = file;

        });
        reader.readAsDataURL(file);
    }

    // Удаление фотографий
    imagesList.on('click', '.delete-link', function () {
        var item = $(this).closest('.item'),
            id = item.data('id');

        delete queue[id];

        item.remove();
    });


    // Отправка формы
    form.on('submit', function (event) {

        var formData = new FormData(this);

        for (var id in queue) {
            formData.append('images[]', queue[id]);
        }

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            async: true,
            success: function (res) {
                alert(res)
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });



    $('.one-cont input[type="file"]').change(function () {
        var file = this.files; //Files[0] = 1st file
        if (file[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(file[0], 'UTF-8');
            reader.onload = function (event) {
                var result = event.target.result;
                $('.one-img').attr('src', event.target.result);

            };
        }
    })

    $('.two-cont input[type="file"]').change(function () {
        var file = this.files; //Files[0] = 1st file
        if (file[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(file[0], 'UTF-8');
            reader.onload = function (event) {
                var result = event.target.result;
                $('.two-img').attr('src', event.target.result);

            };
        }
    })

})

let prof = document.querySelector('.prof-control');

if (prof) {
    var el = document.getElementById('graph'); // get canvas

    var options = {
        percent: el.getAttribute('data-percent') || 25,
        size: el.getAttribute('data-size') || 100,
        lineWidth: el.getAttribute('data-line') || 5,
        rotate: el.getAttribute('data-rotate') || 0
    }

    var canvas = document.createElement('canvas');
    var span = document.createElement('span');
    span.textContent = options.percent + '%';

    if (typeof (G_vmlCanvasManager) !== 'undefined') {
        G_vmlCanvasManager.initElement(canvas);
    }

    var ctx = canvas.getContext('2d');
    canvas.width = canvas.height = options.size;

    el.appendChild(span);
    el.appendChild(canvas);

    ctx.translate(options.size / 2, options.size / 2); // change center
    ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg

    //imd = ctx.getImageData(0, 0, 240, 240);
    var radius = (options.size - options.lineWidth) / 2;

    var drawCircle = function (color, lineWidth, percent) {
        percent = Math.min(Math.max(0, percent || 1), 1);
        ctx.beginPath();
        ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
        ctx.strokeStyle = color;
        ctx.lineCap = 'round'; // butt, round or square
        ctx.lineWidth = lineWidth
        ctx.stroke();
    };

    drawCircle('#dededb ', options.lineWidth, 100 / 100);
    drawCircle('#e7c095', options.lineWidth, options.percent / 100);
}



// var el = document.getElementById('graph'); // get canvas
//
// var options = {
//     percent: el.getAttribute('data-percent') || 25,
//     size: el.getAttribute('data-size') || 100,
//     lineWidth: el.getAttribute('data-line') || 5,
//     rotate: el.getAttribute('data-rotate') || 0
// }
//
// var canvas = document.createElement('canvas');
// var span = document.createElement('span');
// span.textContent = options.percent + '%';
//
// if (typeof (G_vmlCanvasManager) !== 'undefined') {
//     G_vmlCanvasManager.initElement(canvas);
// }
//
// var ctx = canvas.getContext('2d');
// canvas.width = canvas.height = options.size;
//
// el.appendChild(span);
// el.appendChild(canvas);
//
// ctx.translate(options.size / 2, options.size / 2); // change center
// ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg
//
// //imd = ctx.getImageData(0, 0, 240, 240);
// var radius = (options.size - options.lineWidth) / 2;
//
// var drawCircle = function (color, lineWidth, percent) {
//     percent = Math.min(Math.max(0, percent || 1), 1);
//     ctx.beginPath();
//     ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
//     ctx.strokeStyle = color;
//     ctx.lineCap = 'round'; // butt, round or square
//     ctx.lineWidth = lineWidth
//     ctx.stroke();
// };
//
// drawCircle('#dededb ', options.lineWidth, 100 / 100);
// drawCircle('#e7c095', options.lineWidth, options.percent / 100);


//---accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.previousElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
