<!-- membuat kerangka dari master.blade.php -->
@extends('master')
 
<!-- membuat komponen title sebagai judul halaman -->
@section('title', 'Menambah Artikel')
 
<!-- membuat komponen main yang berisi form untuk mengisi judul dan isi artikel -->
@section('main')
<div class="col-md-8 col-sm-12 bg-white p-4">
    <form method="post" action="/add_process"> <!--action disini maksudnya klo tombol di klik akan menuju ke endpoint http://localhost:8000/add_process-->
    @csrf  <!--csrf=Cross-Site Request Forgery, artinya Pemalsuan permintaan lintas-situs, jd @csrf hrs ditambahkan untuk melindungi web karena adanya proses POST yang melakukan pengiriman data untuk menghindari Attack dari luar krn bisa jadi orng lain mgirim data berbahaya lewat request post kita-->
        <div class="form-group">
            <label>Judul Artikel</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul artikel">
        </div>
        <div class="form-group">
            <label>Isi Artikel</label>
            <textarea class="form-control" name="deskripsi" rows="15"></textarea>
        </div>
</div>
@endsection
 
<!-- membuat komponen sidebar yang berisi tombol untuk upload artikel -->
@section('sidebar')
<div class="col-md-3 ml-md-5 col-sm-12 bg-white p-4" style="height:120px !important">
    <div class="form-group">
        <label>Upload</label>
        <input type="submit" class="form-control btn btn-primary" value="Upload">
    </div>
</div>
</form>
@endsection