@extends('master')
@section('title', 'all Blog')
@section('content')   

    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <div>
            <p>Select user :</p>
            <select name="user_id">
                @foreach($users as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <p>Select category:</p>
            <select name="category_id">
                @foreach($categories as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="text" name="title" placeholder="Title" value="{{ old('title') }}">
        </div>
            @if ($errors->has('title'))
                <p> {{ $errors->first('title') }}</p>
            @endif
        <div>
            <textarea name="body" id="" cols="30" rows="10" placeholder="Content blog">{{ old('body') }}</textarea>
        </div>
            @if ($errors->has('body'))
                <p> {{ $errors->first('body') }}</p>
            @endif
        <button>Submit blog</button>
    </form>

@endsection