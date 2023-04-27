@extends('layout.main')

@section('title')
Реєстрація
@endsection

@section('content')

    <h1>Реєстрація</h1>
    <a href="/" class="back-button">На головну</a>
    
    <form method="POST" action="/register" class="article-form">
        @csrf

        <label for="name">Ім'я користувача</label>
        <input id="name" type="text" name="name" value=" {{ old('name') }}">

        <label for="email">Електронна пошта</label>
        <input id="email" type="email" name="email" value=" {{ old('email') }}">

        <label for="password">Пароль</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}">

        <label for="password-confirm">Підтвердження пароля</label>
        <input id="password-confirm" type="password"  name="password_confirmation" value="{{ old('password_confirmation') }}">

        <input type="submit" value="Зареєструватись" class="registr-btn">
    </form>
@endsection
