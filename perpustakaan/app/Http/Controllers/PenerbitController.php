<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    public function index()
    {
        return view('penerbit.tampil', [
            'penerbits' => Penerbit::orderBy('id', 'DESC')->paginate(5),
        ]);
    }

    public function create()
    {
        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate(["nama_penerbit"=> "required"]);
        Penerbit::create($validasi);
        return redirect()->route('penerbit.index')->with('success',"Created Successfully");
    }

    public function edit($id)
    {
        return view('penerbit.edit', [
            'penerbit' => Penerbit::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
//        return $request;
        $validasi = $request->validate(["nama_penerbit"=> "required"]);

        Penerbit::where('id', $id)->update($validasi);
        return redirect()->route('penerbit.index')->with('success',"Updated Successfully");
    }

    public function destroy($id)
    {
        Penerbit::where('id', $id)->delete($id);
        return back()->with('success',"Deleted Successfully");
    }
}
