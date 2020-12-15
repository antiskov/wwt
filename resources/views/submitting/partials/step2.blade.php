<div class="tabs__content" data-tab="2">
    <div class="tabs-item" >
    <h2>Изображение ваших часов <span>* обязательное поле</span></h2>
        <p class="img-text">
            Хорошие фотографии залог быстрой продажи вашего объявления.
            Сфотографируйте ваши часы с разных ракурсов, чтобы предоставить
            вашему покупателю более полное впечатление о ваших часах.
        </p>
        <div class="add-img-wrap">
            <p data-id="step-3-title">Загрузите от 2х фотографий и выберите основную</p>
            <div class="cont-img">
                <ul id="uploadImagesList">
                    <li class="added-images">
                        <img src="/images/icons/add-img.svg" alt="img">
                        <span>Загрузить фото или вставить сюда</span>
                        <input type="file" id="addImages" name="advert_images[]" multiple
                               accept="image/x-png,image/gif,image/jpeg">
                    </li>
                    <li class="item template">
                                        <span class="img-wrap">
                                            <img src="" alt="">
                                        </span>
                        <label class="main-radio">
                            <input  type="radio" name="main_photo">
                            <div></div>
                        </label>
                        <span class="delete-link delete-link_dark" title="Удалить"></span>

                        <span class="delete-link" title="Удалить"></span>
                    </li>
                </ul>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                document.querySelector('#addImages').onchange = function () {
                    console.log(this.files);
                    const data = new FormData();
                    const self = this;
                    Object.keys(this.files).forEach((key, idx) => {
                        data.append(`advert_images[${idx}]`, self.files[idx])
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/submitting/upload_image/{{$advert->id}}",
                        type: "POST",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            console.log('success');
                        },
                    })
                }
            });
        </script>

        <!-- <p class="img-text">
            Просим Вас загрузить фото часов, на которых на
            часах установлено следующее время. Тем самым
            Вы докажете, что часы действительно находятся
            в Вашем владении.
        </p>

        <div class="control-block-wrap">
            <div class="control-photo">
                <h3>Загрузить 1 контрольную фотографию *</h3>
                <div class="head-cont">
                    <div class="info-cont">
                        <img src="./images/icons/watch-img.svg" alt="img">
                        <span>1 : 40 h</span>
                    </div>
                    <div class="person-cont one-cont">
                        <label for="lab"><img class="preview one-img"
                                src='./images/icons/add-img.svg'></label>
                        <span>Загрузить фото или вставить сюда</span>
                        <input type="file" class="load" id="lab">
                    </div>
                </div>
            </div>
            <div class="control-photo">
                <h3>Загрузить 2 контрольную фотографию *</h3>
                <div class="head-cont">
                    <div class="info-cont">
                        <img src="./images/icons/watch-img.svg" alt="img">
                        <span>1 : 50 h</span>
                    </div>
                    <div class="person-cont two-cont">
                        <label for="lab-2"><img class="preview two-img"
                                src='./images/icons/add-img.svg'></label>
                        <span>Загрузить фото или вставить сюда</span>
                        <input type="file" class="load" id="lab-2">
                    </div>
                </div>
            </div>
        </div> -->

        <div class="btn-cont step-2-cont">
            <button data-step="1" class="prev-step btn-hover" type="button">Вернуться к шагу 1</button>

            <button data-fancybox data-src="#save-success" class="save-edit btn-hover-w"  type="submit">Сохранить как черновик</button>

            <button data-step="3" class="save-next btn-hover" type="button">Перейти к шагу 3</button>
        </div>
    </div>
</div>

