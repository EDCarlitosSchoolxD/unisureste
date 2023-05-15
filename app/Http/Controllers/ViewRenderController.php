<?php

namespace App\Http\Controllers;

use App\Repositories\EstadoRepository;
use App\Repositories\MunicipioRepository;
use App\Repositories\UniversidadRepository;
use Illuminate\Http\Request;

class ViewRenderController extends Controller
{
    //
    private $municipioRepository;
    private $estadoRepository;
    private $universidadRepository;

    public function __construct(MunicipioRepository $municipioRepository, EstadoRepository $estadoRepository,UniversidadRepository $universidadRepository)
    {
        $this->municipioRepository = $municipioRepository;
        $this->estadoRepository = $estadoRepository;
        $this->universidadRepository = $universidadRepository;
    }

    public function home(){
        return view("index");
    }

    public function municipios($slug){
        $datos = $this->estadoRepository->getWhereSlug($slug);
        return view("municipios",["datos" => $datos]);
    }

    public function universidades($slug){
        $datos = $this->municipioRepository->getUniversidadesWhereSlug($slug);
        return view("universidades",["datos" => $datos]);
    }

    public function universidad($slug){
        $datos = $this->universidadRepository->getCarrerasWhereSlug($slug);

        return view("universidad",["datos" => $datos]);
    }
}
