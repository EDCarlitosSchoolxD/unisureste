<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{

    public $fillable = ['nombre','tipo','url_web','slug','mision','vision','objetivos','latitud','longitud','id_municipio','logo'];
    use HasFactory;



    public function municipio(){
        return $this->belongsTo(Municipio::class,'id_municipio');
    }

    public function images(){
        return $this->hasMany(ImagenesUniversidad::class,'id_universidad','id');
    }

    public function carreras(){
        return $this->hasMany(Carrera::class,'id_universidad','id');
    }

}
