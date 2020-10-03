@extends('master')
@section('title' , 'Sampah')
@section('content')
<a href="{{ route('blog.index') }}"> Kembali </a>

    @forelse($trash as $item)
        <div class="trash-item">
            <div class="title">
                <h3>{{ $item->title }}</h3>
            </div>
        <div class="body">
            {{ $item->body }}
        </div>
        <div>
            <p>Nama : {{ $item->user->name }}</p> 
            <p>Email : {{ $item->user->email }}</p> 
        </div>
        <div>
            <p> Category : {{ $item->category->name }}</p>
        </div>
        <form  method="POST" action="{{ route('blog.restore', $item->id)}}">
            @method('PUT')
            @csrf
            <button> Restore </button>
        </form>
        <form  method="POST" action="{{ route('blog.permanentdelete', $item->id)}}">
            @method('DELETE')
            @csrf
            <button> Delete Permanently </button>
        </form>
    @empty
        <p>Sampah kosong</p>
    @endforelse


@endsection 