<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{


    public $fillable = ['nombre','slug','descripcion','perfil_ingreso','perfil_egreso','plan_estudio','tipo','id_universidad'];

    use HasFactory;

    public function universidad(){
        return $this->belongsTo(Universidad::class);
    }

}


