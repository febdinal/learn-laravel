@extends('master')
@section('id','title','Blog')
@section('content')
<form action="{{ route('blog.update', $SatuToko->id) }}" method="POST">
    @method('PUT')
        {{ csrf_field() }}
        <div class="form-group" >
            <label for="title"> Title </label>
            <input type="text" class="form-control" required="required" name="nama_toko" value="{{ $SatuToko->nama_toko }}">
        </div>
        <div class="form-group" >
            <label for="user"> User Id: </label>
            <input type="text" class="form-control" required="required" name="user_id" value="{{ $SatuToko->alamat_toko }}">
        </div>
        <div class="form-group" >
            <label for="category"> Category Id </label>
            <input type="text" class="form-control" required="required" name="category_id" value="{{ $SatuToko->tlp_toko }}">
        </div>
        <div class="form-group" >
            <label for="deskripsi"> Deskripsi : </label>
            <input type="text" class="form-control" required="required" name="body" value="{{ $SatuToko->pemilik_toko }}">
        </div>
         <input type="submit" class="btn btn-primary">
    </form>
@endsection