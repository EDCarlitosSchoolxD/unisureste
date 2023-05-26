<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageEstado extends Model
{
    use HasFactory;


    public $fillable = ["ruta",'id_estado'];
    public $timestamps = false;
    use HasFactory;

    public function estado(){
        return $this->belongsTo(Estado::class,'id_estado',"id");
    }
}
