@extends('master')
@section('title', 'Semua Category Blog')
@section('content')

@foreach ($category as $nama)
    <div class="category-nama">
        <div class="nama">
            <h2>{{ $nama->name }}</h2>
        </div>
        <div class="slug">
            {{ $nama->slug }}
        </div>
    </div>
@endforeach

@endsection