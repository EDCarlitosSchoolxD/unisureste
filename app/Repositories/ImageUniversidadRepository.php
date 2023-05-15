<?php
namespace App\Repositories;

use App\Models\Image;
use App\Models\ImagenesUniversidad;
use App\Models\Municipio;

class ImageUniversidadRepository extends BaseRepository{

    public function __construct(ImagenesUniversidad $imagenesUniversidad)
    {
        parent::__construct($imagenesUniversidad);
    }


    public function getWhereIdUniversidad($idUniversidad){
        return $this->model->where("id_universidad","=",$idUniversidad)->get();
    }
   
}