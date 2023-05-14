<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Image;
use App\Models\Municipio;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MunicipioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MunicipioController extends Controller
{

    private $estadoRepository;
    private $imageRepository;
    private $municipioRepository;

    public function __construct(EstadoRepository $estadoRepository,ImageRepository $imageRepository, MunicipioRepository $municipioRepository){
        $this->estadoRepository = $estadoRepository;        
        $this->imageRepository = $imageRepository;
        $this->municipioRepository = $municipioRepository;
    }


    //
    public function index(){

        return view('admin.municipios.index');
    }

    public function create(){
        $estados = $this->estadoRepository->all();

        return view('admin.municipios.create',["estados" => $estados]);
    }



    public function store(Request $request){
        $request->validate([
            'nombre' => ["required","unique:municipios"],
            'id_estado' => ["required",'integer'],
            'image' => ["image","required"]
        ]);


        $datosRequest = $request->except("_token");


        if($request->hasFile('image')){

            // Guardamos la imagen
            $image['ruta'] = $request->file('image')->store('municipios','public');
            $imageObj = new Image($image);
            //Guardamos la imagen a base de datos
            $this->imageRepository->save($imageObj);

            // Creamos un Objeto Municipio y colocamos el ID de la image
            $datosObj = new Municipio($datosRequest);
            $datosObj->id_image = $imageObj->id;
            $datosObj->slug = Str::slug($request->nombre);

            //Se guarda en Base de Datos el Municipio
            $this->estadoRepository->save($datosObj);
        }

        return redirect()->route('admin.municipios');
    }


    public function allPaginate(){
        return $this->municipioRepository->allWithImageAndEstadoPaginate();
    }
}
