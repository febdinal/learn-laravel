@extends('master')
@section('id','title','Blog')
@section('content')

<form action="{{ route('blog.update', $blog->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <input type="text" name="title" placeholder="Title" value="{{ $blog->title}}">
    </div>
    <div>
        <textarea name="body" id="" cols="30" rows="10" >{{ $blog->body }}
        </textarea>
    </div>
        <button>Submit blog</button>
</form>
    
@endsection