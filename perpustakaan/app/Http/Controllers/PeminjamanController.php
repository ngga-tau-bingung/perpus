<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;

class PeminjamanController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(5);
        $data = [
            'title' =>'peminjaman',
            'users'=>$users
        ];
        return view('peminjaman.index', $data);
    }

    public function userpinjam($id)
    {
        $data = [
            'title' =>'peminjaman',
            'books'=>Book::orderBy('id', 'DESC')->with('penerbit')->paginate(5),
            'userbooks'=>Peminjaman::where('user_id', $id)->get(),
            'user'=>User::find($id),
        ];
        return view('peminjaman.userpinjam', $data);
    }

    public function meminjam(Request $request, $book_id)
    {
        $peminjaman = new Peminjaman;
 
        $peminjaman->user_id = $request->user_id;
        $peminjaman->book_id = $book_id;
        $peminjaman->tgl_pinjam = date('Y-m-d');
       
        $peminjaman->save();
        return redirect()->route('peminjaman.userpinjam', ['id'=>$request->user_id]);
    }

}
