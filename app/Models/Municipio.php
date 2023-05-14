<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public $timestamps = false;
    public $fillable = ['nombre','slug','id_image','id_estado'];
    
    use HasFactory;

    public function estado(){
        return $this->belongsTo(Estado::class,'id_estado');
    }

    public function image(){
        return $this->belongsTo(Image::class,'id_image');
    }

    public function universidades(){
        return $this->hasMany(Universidad::class,'id_municipio','id');
    }
}
