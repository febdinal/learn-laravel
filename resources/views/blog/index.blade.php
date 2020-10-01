@extends('master')
@section('title', 'Semua Blog')
@section('content')
<a class="btn btn-danger" href="{{ route('blog.create') }}"> Buat Blog </a>

@foreach ($blog as $item)
    <div class="blog-item">
        <div class="title">
            <h2>{{ $item->title }}</h2>
        </div>
        <div class="body">
            {{ $item->body }}
        </div>
        <div>
          <p>Nama : {{ $item->user->name }}</p> 
          <p>Email : {{ $item->user->email }}</p> 
        </div>
        <div>
        <p> Category : {{ $item->category->name}}</p>
        </div>
        <a href="{{ route('blog.edit', $item->id) }}">Edit</a>
        <a href="{{ route('blog.show', $item->id) }}">lihat</a>
        <td> 
            <form  method="POST" action="{{ route('blog.destroy', $item->id)}}">
                @method('DELETE')
                @csrf
                <button> Hapus</button>
            </form>
        </td>
    </div>
@endforeach

@endsection