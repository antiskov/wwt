@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            <h4>Новый пароль</h4>
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
                <input id="reg-pass" name="password" type="password" placeholder="Введите пароль" required>
                <input name="repeat-password" type="password" placeholder="Повторите пароль" required>
                <span>Пароли не совпадают</span>
                <button type="submit" class="btn-arrow">Сохранить</button>
            </form>
        </div>
    </section>
@endsection
