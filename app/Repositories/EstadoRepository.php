<?php

namespace App\Repositories;

use App\Models\Estado;

class EstadoRepository extends BaseRepository {


    public function __construct(Estado $estado)
    {
        parent::__construct($estado);
    }


    public function getWhereSlug($slug){
        return $this->model->with(['images','municipios' => function($query){
            $query->with("image");
        }])->where("slug",'=',$slug)->first();
    }
   
    public function allWithOneImage(){
        /*$universities = DB::table('universities')
        ->join('municipalities','universities.id_municipio','=','municipalities.id')
        ->select('universities.*','municipalities.municipio')
        ->simplePaginate(10);
        */
        return $this->model->with(["images"=> function($query){
            $query->take(1);
        }])
       ->paginate(15);

    }
}
