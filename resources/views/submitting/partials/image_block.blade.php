<div class="saved-images">
    @if(isset($advert))
        @foreach($advert->photos as $photo)
            <li class="item saved-item">
        <span class="img-wrap">
            <img src="{{asset('/storage/images/advert_photos/watch/number_'.$photo->advert->id.'/'.$photo->photo)}}"                                                alt="">
        </span>
                <label class="main-radio">
                    @if($photo->is_basic == 1)
                        <input type="radio" name="main_photo" value="{{$photo->id}}" checked>
                    @else
                        <input type="radio" name="main_photo" value="{{$photo->id}}">
                    @endif
                    <div></div>
                </label>
                <span class="delete-link delete-link_dark" title="Удалить"></span>

                <span class="delete-link delete_photo" title="Удалить" data-id="{{$photo->id}}"></span>
            </li>
        @endforeach
    @endif
</div>


