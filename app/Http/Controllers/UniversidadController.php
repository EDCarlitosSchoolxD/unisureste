<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImagenesUniversidad;
use App\Models\ImageUniversidad;
use App\Models\Universidad;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\ImageUniversidad as RepositoriesImageUniversidad;
use App\Repositories\ImageUniversidadRepository;
use App\Repositories\MunicipioRepository;
use App\Repositories\UniversidadRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        
        $datos = $this->universidadRepository->allWithOneImage();
        
        return view("admin.universidades.index",["datos"=>$datos]);
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
                $imageObj = new ImagenesUniversidad($imageD);
                //Guardamos la imagen a base de datos
                $imageObj["id_universidad"] = $universidad->id;
                $this->imageUniversidadRepository->save($imageObj);


            }

            return redirect()->route('admin.universidades');
            
        }


        
    }

    public function destroy($id){
        $universidad = $this->universidadRepository->get($id);

        $images = $this->imageUniversidadRepository->getWhereIdUniversidad($universidad->id);
        

        foreach($images as $image){
            Storage::delete("public/".$image->ruta);
        }
        $universidad->delete();


        return redirect()->route("admin.universidades");
    }

}

