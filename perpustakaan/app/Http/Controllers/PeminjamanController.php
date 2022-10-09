<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{

    public function index()
    {
        $peminjaman = Peminjaman::All();
        $data = [
            'data'=>$peminjaman
        ];
        return view('peminjaman.index', $data);
    }
}
