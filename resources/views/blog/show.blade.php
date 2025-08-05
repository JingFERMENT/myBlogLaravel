@extends('base')

@section('title', $post->title)

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </article>

    {{-- @include: include a specific template --}}
@endsection
