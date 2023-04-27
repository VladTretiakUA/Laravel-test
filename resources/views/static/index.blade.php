@extends('layout/main')

@section('title')
Головна сторінка
@endsection

{{-- {{ Breadcrumbs::render('main') }} --}}

@section('content')
    <div class="presentation">
        <img src="img/news.jpg" alt="">
    </div>

    <div class="articles">
        @foreach ($articles as $el)
           <div class="post">
                <img src="/storage/img/articles/{{ $el->image }}" alt="">
                <p><b>Час публікації: </b> {{$el->created_at}} </p>
                <h2> {{ $el->title }} </h2>
                <p> {{ $el->anons}} </p>
                <p><b>Автор: {{ $el->user->name }}</b></p>
                <a href="/article/{{ $el->id }}" class="art">Перейти на статтю</a>
           </div>
        @endforeach
    </div>

    {{ $articles->links() }}
@endsection
