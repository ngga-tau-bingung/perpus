<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::All();
        $data = [
            'data'=>$pengarang
        ];
        return view('pengarang.tampil', $data);
    }
}
