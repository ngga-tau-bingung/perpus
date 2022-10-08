<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::All();
        $data = [
            'data'=>$penerbit
        ];
        return view('penerbit.tampil', $data);
    }
}
