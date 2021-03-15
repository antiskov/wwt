<div id="need_paid" class="modal">
    <div class="modal__content">
        <h5 class="modal__title">
            {{__('messages.need_paid_1').\App\Models\LimitNotVipAdvert::first()->value.__('messages.need_paid_2').
\App\Models\Price::where('title', 'notVip')->first()->value.__('messages.need_paid_3')}}</h5>
    </div>
</div>
