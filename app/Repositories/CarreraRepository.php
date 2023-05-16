<?php

namespace App\Repositories;

use App\Models\Carrera;
use App\Models\Estado;

class CarreraRepository extends BaseRepository {


    public function __construct(Carrera $carrera)
    {
        parent::__construct($carrera);
    }


    public function getWhereIdUniversidad($id_universidad){
        return $this->model->where("id_universidad",'=',$id_universidad)
        ->first();;
    }
   

}
