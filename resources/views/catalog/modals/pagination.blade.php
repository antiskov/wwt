<div class="pagination-wrap">
    @auth
        <a data-fancybox data-src="#save-filter-modal" href="javascript:;" class="save-search">Сохранить
            поисковый запрос</a>
    @endauth
    <div class="pagination">
        <div class="link-wrap">
            {{$adverts->links('catalog.modals.custom_pagination')}}
        </div>
    </div>
</div>
<br>
