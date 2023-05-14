<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $fillable = ['ruta'];


    public function estado(){
        return $this->hasOne(Estado::class,'id_image','id');
    }

}
