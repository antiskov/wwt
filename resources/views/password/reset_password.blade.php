@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            <h4>{{__('messages.changing_password')}}</h4>
            @if(Session::has('status'))
            <p>{!! Session::get('status') !!}</p>
            @endif

            <br>
            <form action="{{route('forgot_password_store')}}" method="post">
                @csrf
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <input id="password-form-email" name="email" type="text" placeholder="{{__('messages.put_email')}}"
                       required>
                <br><br>
                <button type="submit" class="btn-arrow">{{__('messages.next')}}</button>
            </form>
        </div>
    </section>
@endsection
