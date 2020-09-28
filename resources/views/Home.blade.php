<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>
    </head>
    <body>     
        <div class="name container">
            <h2> Silahkan Isi </h2>
        <form action="{{ route('') }}" method="POST"> 
            {{ csrf_field() }}
            <div class="form-group" >
                <label for="nama"> Nama Blog: </label>
                <input type="text" class="form-control" id="nama_blog" placeholder="Masukan Nama Blog" name="nama_blog">
            </div>
            <div class="form-group">
                <label for="Konten"> Konten: </label>
                <input type="text" class="form-control" id="konten" placeholder="Masukan Konten" name="konten">
            </div>
            <div class="form-group" >
                <label for="tlp"> No Telepon: </label>
                <input type="number" class="form-control" id="tlp_toko" placeholder="Enter No.Tlp" name="tlp_toko">
            </div>
            <div class="form-group" >
                <label for="pemilik"> Nama Pemilik: </label>
                <input type="text" class="form-control" id="pemilik_toko" placeholder="Enter nama pemilik" name="pemilik_toko">
            </div>
        <input type="submit" class="btn btn-primary">
        </div>
        
    </body>
</html>