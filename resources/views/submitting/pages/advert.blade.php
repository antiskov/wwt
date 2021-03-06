@extends('layouts.main')

@section('content')
    <section class="submitting">
        <div class="form-cont">
            <div class="tabs-mess">
                <ul class="tabs__caption">
                    <li data-anchor="1" class="active">{{__('messages.step1')}}</li>
                    <li data-anchor="2" class="disabled">{{__('messages.step2')}}</li>
                    <li data-anchor="3" class="disabled">{{__('messages.step3')}}</li>
                    <li data-anchor="4" class="disabled">{{__('messages.step4')}}</li>
                </ul>
                @if(isset($advert))
                    <form id="create_advert" action="{{route('submitting.edit_draft', $advert)}}" method="post">
                @else
                    <form id="create_advert" action="{{route('submitting.create_draft')}}" method="post">
                @endif
                    @csrf
                    @include('submitting.partials.step1')
                    @include('submitting.partials.step2')
                    @include('submitting.partials.step3')
                    <div id="step4" class="tabs__content" data-tab="4"></div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <div id="save-success" class="" style="display: none;">
        <div class="modal-cont">
            <h2>Объявление сохранено</h2>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iamdustan-smoothscroll/0.4.0/smoothscroll.min.js" integrity="sha512-PQGSWbnnXnUjuWs360EBQTfInjWdrxv18r3Bp9b5LRtbP+rjPVvET4l/3bZQDrLKzLbbujjm3hveYvUQQcAxSQ==" crossorigin="anonymous"></script>
    <script src="/js/sub-steps.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(e){
            $('[data-src="#save-success"]').fancybox({
                afterShow: function (instance) {
                    setTimeout(() => {
                        instance.close()
                    }, 3000)
                },
                afterClose: function () {
                    @if(isset($advert))
                    window.location.replace('{{route('submitting.edit_draft', $advert)}}')
                    @endif
                    console.log(window.location.origin)
                }
            })
        });
    </script>
    <script src="https://maps.google.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}=places&language=ru"
            type="text/javascript"></script>
    <script src="/js/g-autocomplete.js"></script>
@endsection
