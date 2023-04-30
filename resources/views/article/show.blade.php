@extends('layout/main')

@section('title')
{{ $article->title }}
@endsection

@section('content')
    <h2> <a href="/">Головна</a> / {{ $article->title }}</h2>
    <div class="articles one">
           <div class="post">
                <img src="/storage/img/articles/{{ $article->image }}" alt="">

                <h2> {{ $article->title }} </h2><br>
                <h3>Тег:  {{ $article->article_tag }} </h3><br>

                <h2> @php
                    $a = $article->article_tag ;
                    echo preg_replace('/(\w| )(' . $a . ')\w+/iu', '<a href=\"' . '/article/{id}' . '\">\\0</a>', $article->text);
                  @endphp </h2>

                <p><b>Автор: {{ $article->user->name }}</b></p>
                <p> {{ $article->text }}</p>
                  
                @auth
                    @if(Auth::user()->id == $article->user_id)
                        <br><hr>
                        <a href="/article/{{ $article->id }}/edit" class="back-button">Змінити статтю</a>
                        <a onclick="return myFunction();" href="{{route('delete', $article->id)}}"  class="back-button delete">Видалити</a>
                    @endif
                @endauth
                <a href="/" class="back-button">На головну</a>
           </div>
    </div>
    
@endsection

<script>

function myFunction() {
      if(!confirm("Ви впевнені що хочете видалити цю статтю?"))
      event.preventDefault();
  }

</script>