@extends('layout/main')

@section('title')
Добавити статтю
@endsection

@section('content')
    <h1>Добавити статтю</h1>
    <a href="/" class="back-button">На головну</a>
    {{-- ['method' => 'POST', 'action' => ''] --}}
    {!! Form::open(['class' => 'article-form', 'enctype' => 'multipart/form-data']) !!} 
        {{  Form::label('title', 'Назва статті') }}
        {{  Form::text('title', '', ['placeholder' => 'Введіть назву статті']) }}

        {{  Form::label('anons', 'Анонс статті') }}
        {{  Form::textarea('anons', '', ['placeholder' => 'Введіть анонс статті']) }}

        {{  Form::label('article_tag', 'Виберіть теги') }}
        {{  Form::text('article_tag', '', ['placeholder' => 'Введіть назву тега (слово)', 'class' => 'tag']) }} <br>

        {{  Form::label('main_image', 'Фото статті') }}
        {{  Form::file('main_image') }}

        {{  Form::label('text', 'Повний текст статті') }}
        {{  Form::textarea('text', '', ['placeholder' => 'Введіть текст статті']) }}

        {{ Form::submit('Добавити', ['class' => 'add-button']) }}
    {!! Form::close() !!} 


    {{-- $('input[name="country"]').amsifySuggestags(); --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) );
        $('.tag[name="country"]').amsifySuggestags();
    </script>

@endsection
