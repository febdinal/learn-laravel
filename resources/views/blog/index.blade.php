@extends('master')
@section('title', 'Semua Blog')
@section('content')
@auth
    <a class="btn btn-danger" href="{{ route('blog.create') }}"> Buat Blog </a>
        <form  action="{{ route('logout') }}" method="POST">
            @method('POST')
            @csrf
            <button>Logout</button>
        </form>
@endauth
@foreach ($blog as $item)
    <div class="blog-item">
        <div class="title">
            <h3>{{ $item->title }}</h3>
        </div>
        <div class="body">
            {{ $item->body }}
         </div>
        <div>
          <p> Nama : {{ $item->user->name }} </p> 
          <p> Email : {{ $item->user->email }} </p> 
        </div>
        <div>
            <p> Category : {{ $item->category->name }} </p>
        </div>
        <a href="{{ route('blog.show', $item->id) }}">lihat</a>
        @auth
            @if (Auth::user()->id == $item->user->id )
                <a href="{{ route('blog.edit', $item->id) }}">Edit</a>
                <td> 
                    <form  method="POST" action="{{ route('blog.destroy', $item->id)}}">
                        @method('DELETE')
                        @csrf
                        <button> Hapus </button>
                    </form>
                </td>
            @endif
        @endif
    </div>  
    @endforeach
    @auth
        <a href="{{ route('blog.sampah') }}"> Sampah </a>
    @endauth
@endsection