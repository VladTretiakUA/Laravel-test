
@extends('layout/main')

@section('title')
{{ $title }}
@endsection

@section('content')
    <h1>Про нас</h1>

    @if(count($params) > 0)
      <p> В нас більше ніж 0 елементів</p>
      <ul>
        @foreach ($params as $item)
            <li>
                {{ $item}}
            </li>
        @endforeach
      </ul>
    @endif
@endsection

<script></script>