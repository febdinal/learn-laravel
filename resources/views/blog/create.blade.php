@extends('master')
@section('title', 'all Blog')
@section('content')

<form action="{{ route('blog.store') }}" method="POST">
    @csrf
    <div>
        @foreach($users as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </div>
    <div>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <textarea name="body" id="" cols="30" rows="10" placeholder="Content blog"></textarea>
    </div>
    <button>Submit blog</button>
</form>

@endsection