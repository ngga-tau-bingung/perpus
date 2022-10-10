<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    public function index()
    {
        return view('pengarang.tampil', [
            'pengarangs'=>Pengarang::orderBy('id', 'DESC')->paginate(),
        ]);
    }

    public function create()
    {
        return view('pengarang.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate(["nama_pengarang"=> "required"]);
        Pengarang::create($validasi);
        return redirect()->route('pengarang.index')->with('success',"Created Successfully");
        
    }

    public function edit($id)
    {
        return view('pengarang.edit', [
            'pengarang' => Pengarang::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
//        return $request;
        $validasi = $request->validate(["nama_pengarang"=> "required"]);

        Pengarang::where('id', $id)->update($validasi);
        return redirect()->route('pengarang.index')->with('success',"Updated Successfully");
    }

    public function destroy($id)
    {
        Pengarang::where('id', $id)->delete($id);
        return response()->json(['status' => 'Delete Successfully']);
    }
}
