@extends('layouts.main')

@section('content')
    <section class="submitting">
        <div class="form-cont">
            <div class="tabs-mess">
                <ul class="tabs__caption">
                    <li class="">шаг 1</li>
                    <li class="">шаг 2</li>
                    <li class="">шаг 3</li>
                    <li class="active">шаг 4</li>
                </ul>
                <form action="{{route('submitting.create_draft', $advert)}}" method="post">
                    @csrf
                    @include('submitting.partials.step1')
                    @include('submitting.partials.step2')
                    @include('submitting.partials.step3')
                    @include('submitting.partials.step4')
                </form>
            </div>
        </div>
        </div>
    </section>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmCYblB4cVMXS93Da6iBG1RFldOXY46hA&callback=initAutocomplete&libraries=places&v=weekly"
        defer
    ></script>
    <script src="js/g-autocomplete.js"></script>
@endsection
