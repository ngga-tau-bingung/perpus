<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::All();
        $data = [
            'data'=>$category
        ];
        return view('category.tampil', $data);
    }
}
