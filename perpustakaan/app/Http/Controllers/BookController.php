<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Category;
use Illuminate\Http\Request;
use File;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->with('penerbit')->paginate(5);
        //dd($books);
        return view('book.index',[
            'title'=>'Buku',
            'books'=> $books
        ]);
    }

    public function create()
    {
        return view('book.create', [
            'pengarang'=>Pengarang::All(),
            'penerbit'=>Penerbit::All(),
            'category'=>Category::All(),
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            "judul"=> "required",
            "tahun"=> "required",
            "pengarang_id"=> "required",
            "penerbit_id"=> "required",
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            
        ]);
        
        
        $NamaGambar = time().'.'.$request->image->extension();  

        $request->image->move(public_path('image'), $NamaGambar);

        $book = new Book;
 
        $book->judul = $request->judul;
        $book->penerbit_id = $request->penerbit_id;
        $book->tahun = $request->tahun;
        $book->pengarang_id = $request->pengarang_id;
        $book->image = $NamaGambar;
        $book->status = '1';
 
        $book->save();
       
        return redirect()->route('book.index');
    }
}
