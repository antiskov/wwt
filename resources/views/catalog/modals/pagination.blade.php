<div class="pagination-wrap">
    @auth
        <a data-fancybox data-src="#save-filter-modal" href="javascript:;" class="save-search">{{__('messages.save_search_query')}}</a>
    @endauth
    <div class="pagination">
        <div class="link-wrap">
            {{$adverts->links('catalog.modals.custom_pagination')}}
        </div>
    </div>
</div>
<br>
