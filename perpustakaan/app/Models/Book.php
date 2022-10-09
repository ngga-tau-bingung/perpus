<?php

namespace App\Models;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class,'penerbit_id');
    } 
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class,'pengarang_id');
    }
}
