<!-- menggunakan kerangka dari master.blade.php -->
@extends('master')
 
@section('header')
<h2><center>List Artikel</center></h2>
@if($message = Session::get('success')) <!--Ini adalah fungsi Session dari Laravel, sbiasanya utuk memunculkan pesan-->
    <div class="alert alert-success alert-block"> <!--Code Session ini sendiri akan memunculkan kotak pesan dengan kondisi bila menerima pesan Session sukses dari file lain seperti dari ArticleController@edit_process-->
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
    </div>
    @endif
 
@endsection
 
@section('title', 'Halaman Khusus Admin')
 
@section('main')
    <div class="col-md-12 bg-white p-4">
        <a href="/add"><button class="btn btn-primary mb-3">Tambah Artikel</button></a>
        <table class="table table-bordered table-hover table-stripped ">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="25%">Judul</th>
                    <th width="50%">Deskripsi</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $i => $article)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $article->judul }}</td>
                        <td>{{ $article->deskripsi }}</td>
                        <td>
                            <a href="/edit/{{ $article->id }}"><button class="btn btn-success">Edit</button></a>
                            <a href="/delete/{{ $article->id }}"><button class="btn btn-danger">Hapus</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection