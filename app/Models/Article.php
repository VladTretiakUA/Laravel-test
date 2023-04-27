<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // public $timestamps = false; //Якщо нема в таблтці $timestamps, то треба прописати цкй кусочок

    public function user()
    {
        return $this->belongsTo('App\Models\User'); //вказує що 1 стаття має 1 автора
    }
}
