<?php

namespace App\Repositories;

use App\Models\Estado;

class ImageUniversidadRepository extends BaseRepository {


    public function __construct(Estado $estado)
    {
        parent::__construct($estado);
    }




}
