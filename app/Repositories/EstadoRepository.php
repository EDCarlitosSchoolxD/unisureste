<?php

namespace App\Repositories;

use App\Models\Estado;

class EstadoRepository extends BaseRepository {


    public function __construct(Estado $estado)
    {
        parent::__construct($estado);
    }


    public function allWithImage(){
        $estados = $this->model->with('image')->get();

        return $estados;

    }
    public function getWhereSlug($slug){
        return $this->model->with(['image','municipios' => function($query){
            $query->with("image");
        }])->where("slug",'=',$slug)->first();
    }
   

}
