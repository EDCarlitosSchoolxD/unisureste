<?php

namespace App\Http\Controllers;

use App\Repositories\EstadoRepository;
use App\Repositories\MunicipioRepository;
use Illuminate\Http\Request;

class ViewRenderController extends Controller
{
    //
    private $municipioRepository;
    private $estadoRepository;

    public function __construct(MunicipioRepository $municipioRepository, EstadoRepository $estadoRepository)
    {
        $this->municipioRepository = $municipioRepository;
        $this->estadoRepository = $estadoRepository;
    }

    public function home(){
        return view("index");
    }

    public function municipios($slug){
        $datos = $this->estadoRepository->getWhereSlug($slug);
        return view("municipios",["datos" => $datos]);
    }
}
