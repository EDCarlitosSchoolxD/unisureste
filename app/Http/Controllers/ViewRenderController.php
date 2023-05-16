<?php

namespace App\Http\Controllers;

use App\Repositories\CarreraRepository;
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
    private $carreraRepository;

    public function __construct(MunicipioRepository $municipioRepository, EstadoRepository $estadoRepository,UniversidadRepository $universidadRepository,CarreraRepository $carreraRepository)
    {
        $this->municipioRepository = $municipioRepository;
        $this->estadoRepository = $estadoRepository;
        $this->universidadRepository = $universidadRepository;
        $this->carreraRepository = $carreraRepository;
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

    public function carrera($slug,$slug2){
        
        $universidad = $this->universidadRepository->getWhereSlugOne($slug);
        $carrera = $this->carreraRepository->getWhereIdUniversidad($universidad->id);

        return view("carrera",[
            "datos" => $carrera,
        ]);
        
    }
}
