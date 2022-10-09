<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'categorys'=>Category::orderBy('id', 'DESC')->paginate(), 
            'title'=>'Category'
        ];
        return view('category.tampil', $data);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate(["nama"=> "required"]);
        category::create($validasi);
        return redirect()->route('category.index')->with('success',"Created Successfully");
    }

    public function show($id)
    {
        return view('category.edit', [
            'category' => category::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {

        $validasi = $request->validate(["nama"=> "required"]);

        category::where('id', $id)->update($validasi);
        return redirect()->route('category.index')->with('success',"Updated Successfully");
    }

    public function destroy($id)
    {
        category::where('id', $id)->delete($id);
        return back()->with('success',"Deleted Successfully");
    }
}
