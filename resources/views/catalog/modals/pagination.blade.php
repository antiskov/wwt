<div class="pagination-wrap">
    @auth
    <button data-fancybox data-src="#save-filter-modal" href="javascript:;" class="save-search" type="button">Сохранить поисковый запрос</button>
    @endauth
    <div class="pagination">
        <div class="link-wrap">
            {{$adverts->links('catalog.modals.custom_pagination')}}
        </div>
    </div>
</div>
