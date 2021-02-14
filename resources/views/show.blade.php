<!-- menggunakan kerangka dari halaman master.blade.php --> 
@extends('master')
 
<!-- membuat komponen title sebagai judul halaman -->
@section('title', 'Blog')
 
<!-- membuat header dan tombol tambah artikel di atas -->
@section('header')
    <center>
        <h2>Blog</h2>
        <a href="/add"><button class="btn btn-success">Tambah Artikel</button></a>
    </center>
@endsection
 
<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
@section('main')
    @foreach ($isiTabelArtikel as $articl) <!--$isitabelartikel itu Array dari ArticleController dan setiap isi array nya akan disimpan dlam variable articl sampai arraynya habis-->
    <div class="col-md-4 col-sm-12 mt-4">
        <div class="card">
            <img src="https://media.suara.com/pictures/480x260/2019/12/26/49091-gambar.jpg" class="card-img-top" alt="gambar" >
            <div class="card-body">
                <h5 class="card-title">{{ $articl->judul }}</h5> <!--di dalam $article ada data yang disimpan dalam id judul, maka akan dicari tuh id judul ada atau engga dan klo ada isinya akan diambil dan dimunculkan sebagai Heading 5-->
                <a href="/detail/{{ $articl->id }}" class="btn btn-primary">Baca Artikel</a>
            </div>
        </div>
    </div>
   @endforeach
@endsection