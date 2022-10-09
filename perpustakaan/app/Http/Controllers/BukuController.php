<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function index()
    {
        return view('buku.index',[

        ]);
    }
}
