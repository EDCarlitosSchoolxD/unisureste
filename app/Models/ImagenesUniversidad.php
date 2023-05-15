<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesUniversidad extends Model
{

    public $fillable = ["ruta"];
    public $timestamps = false;
    use HasFactory;

    public function universidad(){
        return $this->belongsTo(Universidad::class,'id_universidad',"id");
    }
}
