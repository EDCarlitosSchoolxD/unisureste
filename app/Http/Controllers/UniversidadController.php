<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageUniversidad;
use App\Models\Universidad;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ImageUniversidadRepository;
use App\Repositories\MunicipioRepository;
use App\Repositories\UniversidadRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
class UniversidadController extends Controller
{
    //
    private $municipioRepository;
    private $estadoRepository;
    private $imageRepository;
    private $universidadRepository;
    private $imageUniversidadRepository;
    private const TIPOS = ["Privada","Publica"];

    public function __construct(MunicipioRepository $municipioRepository, EstadoRepository $estadoRepository, ImageRepository $imageRepository, UniversidadRepository $universidadRepository,ImageUniversidadRepository $imageUniversidadRepository)
    {
        $this->municipioRepository = $municipioRepository;
        $this->estadoRepository = $estadoRepository;
        $this->imageRepository = $imageRepository;
        $this->universidadRepository = $universidadRepository;   
        $this->imageUniversidadRepository = $imageUniversidadRepository;
    }


    public function index(){
        
        return view("admin.universidades.index");
    }

    public function create(){
        $municipios = $this->municipioRepository->all();
        $estados = $this->estadoRepository->all();

        return view("admin.universidades.create",[
            "estados" => $estados,
            "municipios" => $municipios,
            "tipos" => self::TIPOS
        ]);
    }


    public function store(Request $request){
        $request->validate([
            "nombre" => ["required","unique:universidads"],
            "tipo" => ["required",Rule::in(self::TIPOS)],
            "url_web" => ["url"],
            "id_municipio" => ["required","integer"],
            "image" => ["required","array"],
            "images.*" => ["image"],
            "latitud" => ["required"],
            "longitud" => ["required"],
        ]);

        $datosRequest = $request->except("_token");
        $datosRequest["slug"] = Str::slug($request->nombre);


        if($request->hasFile('image')){
            $universidad = new Universidad($datosRequest);
            $universidad = $this->universidadRepository->save($universidad);


            foreach ($request->file("image") as $image) {
               

                // Guardamos la imagen
                $imageD['ruta'] = $image->store('universidades','public');
                $imageObj = new Image($imageD);
                //Guardamos la imagen a base de datos
                $this->imageRepository->save($imageObj);

                //Creamos un Objeto ImageUniversidad y colocamos el ID de la image

                $imageUniversidad = new ImageUniversidad();
                $imageUniversidad->id_image = $imageObj->id;
                $imageUniversidad->id_universidad = $universidad->id;

                //Se guarda en Base de Datos el Municipio
                $this->imageUniversidadRepository->save($imageUniversidad);

            }

            return redirect()->route('admin.universidades');
            
        }


        
    }
}
