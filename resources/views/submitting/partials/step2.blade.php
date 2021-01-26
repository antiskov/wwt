<div class="tabs__content" data-tab="2">
    <div class="tabs-item" >
    <h2>{{__('messages.image_your_watch')}} <span>{{__('messages.modal_password_span')}}</span></h2>
        <p class="img-text">
            {{__('messages.image_watch_text')}}
        </p>
        <div class="add-img-wrap">
            <p data-id="step-3-title">{{__('messages.describe_downloading')}}</p>
            <div class="cont-img">
                <ul>
                    <li class="added-images">
                        <img src="/images/icons/add-img.svg" alt="img">
                        <span>{{__('messages.describe_downloading_here')}}</span>
                        <input type="file" id="addImages" name="advert_images[]" multiple
                               accept="image/x-png,image/gif,image/jpeg">
                    </li>
{{--                    <li class="item template">--}}
{{--                                        <span class="img-wrap">--}}
{{--                                            <img src="" alt="">--}}
{{--                                        </span>--}}
{{--                        <label class="main-radio">--}}
{{--                            <input  type="radio" name="main_photo">--}}
{{--                            <div></div>--}}
{{--                        </label>--}}
{{--                        <span class="delete-link delete-link_dark" title="Удалить"></span>--}}

{{--                        <span class="delete-link" title="Удалить"></span>--}}
{{--                    </li>--}}

                </ul>
                <ul id="uploadImagesList">
                    @include('submitting.partials.image_block')
                </ul>

            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                @if(isset($advert))
                document.querySelector('#addImages').onchange = function () {
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
                            $('#uploadImagesList').empty();
                            $('#uploadImagesList').html(data.output);
                            deletePhoto()
                        },
                    })
                }
                @endif
                function deletePhoto() {
                    document.querySelectorAll('.delete_photo').forEach(function (item){
                        item.onclick = function (e) {
                            console.log(this.getAttribute('data-id'));
                            $.ajax({
                                url: `/submitting/delete_photo/${this.getAttribute('data-id')}`,
                            })
                        }
                    })
                }

                deletePhoto();


            });
        </script>

        <div class="btn-cont step-2-cont">
            <button data-step="1" class="prev-step btn-hover" type="button">{{__('messages.go_to_step1')}}</button>

            <button class="save-edit btn-hover-w" type="submit">{{__('messages.save_like_draft')}}</button>

            <button  data-step="3" class="save-next btn-hover" type="button">{{__('messages.go_to_step3')}}</button>
        </div>
    </div>
</div>

