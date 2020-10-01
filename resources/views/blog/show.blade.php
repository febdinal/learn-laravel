@extends('master')
@section('title', 'Blog')
@section('content')
<h1>{{ $blog->title }}</h1>
<p>{{ $blog->body}}</p>
@endsection