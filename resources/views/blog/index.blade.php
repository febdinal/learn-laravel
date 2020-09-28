@extends('master')
@section('title', 'all Blog')
@section('content')

@foreach ($blog as $item)
    <div class="blog-item">
        <div class="title">
            <h2>{{ $item->title }}</h2>
        </div>
        <div class="body">
            {{ $item->body }}
        </div>
    </div>
@endforeach

@endsection