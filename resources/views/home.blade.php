@extends('layout.main')

@section('content')

    <div class="block">
        <h2><a href="/">Головна</a> / Кабінет користувача</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h4>Привіт {{ Auth::user()->name }}, ви авторизовані</h4>
        <p>{{ Auth::user()->email }}</p>
    </div>

@if (count($articles) > 0)
    <div class="articles">
        @foreach ($articles as $el)
        <div class="post">
                <img src="/storage/img/articles/{{ $el->image }}" alt="">
                <h2> {{ $el->title }} </h2>
                <p> {{ $el->anons}} </p>
                <p><b>Автор: {{ $el->user->name }}</b></p>
                <a href="/article/{{ $el->id }}" class="art">Перейти на статтю</a>
        </div>
        @endforeach
    </div>
@endif

@endsection
