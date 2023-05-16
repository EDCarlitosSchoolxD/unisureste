<?php

namespace App\Repositories;

use App\Models\Estado;
use App\Models\Universidad;
use Illuminate\Support\Facades\DB;

class UniversidadRepository extends BaseRepository {


    public function __construct(Universidad $universidad)
    {
        parent::__construct($universidad);
    }


    public function allWithOneImage(){
        /*$universities = DB::table('universities')
        ->join('municipalities','universities.id_municipio','=','municipalities.id')
        ->select('universities.*','municipalities.municipio')
        ->simplePaginate(10);
        */
        return $this->model->with(["images"=> function($query){
            $query->take(1);
        }, "municipio"])
       ->paginate(15);

    }

    public function getCarrerasWhereSlug($slug){
        return $this->model->with(["images","carreras"])->where("slug",'=',$slug)->first();
    }
   

    
}
