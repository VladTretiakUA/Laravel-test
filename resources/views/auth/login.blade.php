@extends('layout.main')

@section('title')
Увійти
@endsection

@section('content')
    <h1>Авторизація</h1>
    <a href="/" class="back-button">На головну</a>

    <form method="POST" action="/login" class="article-form">
        @csrf

        <label for="email">Електронна пошта</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">

        <label for="password">Пароль</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}">

        <input type="submit" value="Увійти" class="registr-btn">
    </form>
@endsection
