<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session; //harus ditambahkan karena menggunakan fungsi dari Session yang dapat memunculkan Message
use Auth;

class ArticleController extends Controller
{
    private function is_login()
    {
        if(Auth::user()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function show()
    {
        $articles = DB::table('artikel')->orderby('id', 'desc')->get(); //ini tu select * from tabel artikel terus disimpan dalam array $articles
        return view('show', ['isiTabelArtikel'=>$articles]); // lalu array ini dikirim lewat variable isitabelartikel
    }

   
        public function add()
    {
        if($this->is_login())
        {
            return view('add');
        }
 
        else
        {
           return redirect('/login');
        }
    }
    

    public function add_process(Request $dataArtikel) //Request digunakan untuk menerima data dari method POST, $dataArtikel hanyalah variable yang digunakan untuk menyimpan setiap data dari hasil Request
    {
        DB::table('artikel')->insert([
            'judul'=>$dataArtikel->judul, // di dalam $dataArtikel ada data yang disimpan dalam id judul, data ini akan dimasukkan dalam kolom judul di tabel artikel
            'deskripsi'=>$dataArtikel->deskripsi
        ]);
        return redirect()->action('ArticleController@show');
    }

    public function detail($id)
    {
        $article = DB::table('artikel')->where('id', $id)->first(); //ngambil semua row yang isi ID sesuai dengan request
        return view('detail', ['article'=>$article]);
    }

    public function show_by_admin()
    {
        if($this->is_login())
        {
            $articles = DB::table('artikel')->orderby('id', 'desc')->get();
            return view('adminshow', ['articles'=>$articles]);
        }
 
        else
        {
           return redirect('/login');
        }
    }

    public function edit($id)
    {
        if($this->is_login())
        {
            $article = DB::table('artikel')->where('id', $id)->first();
            return view('edit', ['article'=>$article]);
        }
 
        else
        {
           return redirect('/login');
        }
    }

    public function edit_process(Request $article)
    {
        $id = $article->id;
        $judul = $article->judul;
        $deskripsi = $article->deskripsi;
        DB::table('artikel')->where('id', $id)
                            ->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        Session::flash('success', 'Artikel berhasil diedit');
        return redirect()->action('ArticleController@show_by_admin');
    }

    public function delete($id){
        if($this->is_login())
        {
             //menghapus artikel dengan ID sesuai pada URL
            DB::table('artikel')->where('id', $id)
                                ->delete();
 
            //membuat pesan yang akan ditampilkan ketika artikel berhasil dihapus
            Session::flash('success', 'Artikel berhasil dihapus');
            return redirect()->action('ArticleController@show_by_admin');
        }
 
        else
        {
           return redirect('/login');
        }
    }
}