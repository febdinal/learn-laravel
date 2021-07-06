@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 style="text-align:center">Selamat</h1>
                <h1 style="text-align:center">Berhasil Login</h1>
                <a class="btn btn-danger" href="{{ route('blog.index') }}"> Lihat Semua Blog </a>
            </div>
        </div>
    </div>
</div>
@endsection
