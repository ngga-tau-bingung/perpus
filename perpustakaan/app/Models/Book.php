<?php

namespace App\Models;
use App\Models\Penerbit;
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
}
