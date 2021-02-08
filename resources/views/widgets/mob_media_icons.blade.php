<div class="mob-menu-social">
    <h3>{{__('messages.we_in_media')}}</h3>
    <div class="mob-menu-social__content">
        @foreach($mediaLinks as $mediaLink)
            <a href="http://{{$mediaLink->link_address}}" class="social-wrap_link" target="_blank">
                <img src="/images/icons/{{$mediaLink->path}}" alt="img">
            </a>
        @endforeach
    </div>
</div>
