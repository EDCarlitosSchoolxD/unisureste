<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUniversidad extends Model
{
    public $timestamps = false;
    use HasFactory;


    public function universidad(){
        return $this->belongsTo(Universidad::class,'id_universidad');
    }
    public function image(){
        return $this->belongsTo(Image::class,'id_image');
    }
}
