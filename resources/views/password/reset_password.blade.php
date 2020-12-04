@extends('layouts.main')

@section('content')
    <section class="e404">
        <div class="e404-wrap">
            <h4>Востановление пароля</h4>
            <form action="{{route('forgot_password_store')}}" method="post">
                @csrf
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <input id="password-form-email" name="email" type="text" placeholder="Введите почту"
                       required>
                <br><br>
                <button type="submit" class="btn-arrow">Далее</button>
            </form>
        </div>
    </section>
@endsection
