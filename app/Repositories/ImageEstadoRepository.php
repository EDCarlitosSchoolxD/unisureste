<?php
namespace App\Repositories;

use App\Models\ImageEstado;

class ImageEstadoRepository extends BaseRepository{

    public function __construct(ImageEstado $image)
    {
        parent::__construct($image);
    }

    public function getWhereIdEstado($idEstado){
        return $this->model->where("id_estado","=",$idEstado)->get();
    }
    
}