@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            <h4>{{__('messages.new_pass')}}</h4>
{{--            <form action="{{route('forgot_password_store')}}" method="post">--}}
{{--                @csrf--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <p class="text-danger">{{ $error }}</p>--}}
{{--                @endforeach--}}
{{--                <h3>{{$email}}</h3>--}}
{{--                <input id="password-form-email" name="email" type="text" placeholder="Введите почту"--}}
{{--                       required>--}}
{{--                <br><br>--}}
{{--                <button type="submit" class="btn-arrow">Далее</button>--}}


{{--            </form>--}}
            <form method='post' class="registration" action="{{route('save_new_password')}}">
                @csrf
                <div class="change-input">
                    <h3>{{$email}}</h3>
                </div>
                <input type="hidden" value="{{$email}}" name="email">
                <input id="reg-pass" name="password" type="password" placeholder="{{__('messages.put_password')}}" required>
                <input name="repeat_password" type="password" placeholder="{{__('messages.replay_password')}}" required>
                <span>{{__('messages.different_passwords')}}</span>
                <button type="submit" class="btn-arrow">{{__('messages.submit')}}</button>
            </form>
        </div>
    </section>
@endsection
