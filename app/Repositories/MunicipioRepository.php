<?php
namespace App\Repositories;

use App\Models\Image;
use App\Models\Municipio;

class MunicipioRepository extends BaseRepository{

    public function __construct(Municipio $municipio)
    {
        parent::__construct($municipio);
    }


    public function allWithImageAndEstadoPaginate(){
        $municipio = $this->model->with(['estado','image'])->paginate(20);


        return $municipio;
    }
}