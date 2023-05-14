<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $timestamps = false;
    public $fillable = ['nombre','id_image','slug'];

    use HasFactory;


    public function municipios(){
        return $this->hasMany(Municipio::class,'id_estado','id');
    }

    public function image(){
        return $this->belongsTo(Image::class,'id_image');
    }

}
