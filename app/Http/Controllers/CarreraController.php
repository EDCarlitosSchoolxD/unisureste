<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Repositories\CarreraRepository;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MunicipioRepository;
use App\Repositories\UniversidadRepository;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CarreraController extends Controller
{
    //
    private $estadoRepository;
    private $imageRepository;
    private $municipioRepository;
    private $universidadRepository;
    private $carreraRepository;

    public function __construct(EstadoRepository $estadoRepository,ImageRepository $imageRepository, MunicipioRepository $municipioRepository,UniversidadRepository $universidadRepository,CarreraRepository $carreraRepository){
        $this->estadoRepository = $estadoRepository;        
        $this->imageRepository = $imageRepository;
        $this->municipioRepository = $municipioRepository;
        $this->universidadRepository = $universidadRepository;
        $this->carreraRepository = $carreraRepository;
    }


    private const TIPOS = ["Ingeniería","Licenciatura","Maestria","Doctorado"];

    public function create($id){
        $universidad = $this->universidadRepository->get($id);

        return view("admin.carreras.create",[
            "tipos" => self::TIPOS,
            "id" => $id,
            "universidad" => $universidad,
        ]);
    }

    public function edit($id){


        $carrera = $this->carreraRepository->get($id);
        $universidad = $this->universidadRepository->get($carrera->id_universidad);

        return view("admin.carreras.edit",[
            "id" => $id,
            "tipos" => self::TIPOS,
            "data" => $carrera,
            "universidad" => $universidad,
        ]);
    }


    public function store(Request $request,$id){
        $request->validate([
            "nombre" => ["required",],
            "logo" => ["required","image"],
            "plan_estudio" => ["mimes:pdf"],
            "tipo" => ["required",Rule::in(self::TIPOS)],
        ]);

      

        $datosRequest = $request->except("_token");
        $datosRequest["likes"] = 0;
        $datosRequest["id_universidad"] = $id;

        if($request->hasFile('plan_estudio')){
            // Guardamos la imagen
            $datosRequest['plan_estudio'] = $request->file('plan_estudio')->store('carrera/plan_estudio','public');

        }

        if($request->hasFile('logo')){

            // Guardamos la imagen
            $datosRequest['logo'] = $request->file('logo')->store('carrera/logo','public');
            //Guardamos la imagen a base de datos

            // Creamos un Objeto Municipio y colocamos el ID de la image
            $datosObj = new Carrera($datosRequest);
            $datosObj->slug = Str::slug($request->nombre);

            //Se guarda en Base de Datos la universidad
            $this->carreraRepository->save($datosObj);
        }

        $universidad = $this->universidadRepository->get($id);
        
        return redirect()->route('universidad',$universidad->slug);
    }


    public function update(Request $request, $id){
        $request->validate([
            "nombre" => ["required"],
            "logo" => ["image"],
            "plan_estudio" => ["mimes:pdf"],
            "tipo" => ["required",Rule::in(self::TIPOS)],
        ]);

        $carreraFind = $this->carreraRepository->get($id);

        $datos = request()->except('_token','_method','image',"logo");

        // Setteamos los valores
        $datos['id_universidad'] = $carreraFind->id_universidad;
        //Se coloca el SLUG
        $datos['slug'] = Str::slug($request->nombre);

        if($request->hasFile('logo')){

            Storage::delete('public/'.$carreraFind->logo);
            // Guardamos la imagen en Disco
            $datos['logo'] = $request->file('logo')->store('carrera/logo','public');

        }

        if($request->hasFile('plan_estudio')){

            Storage::delete('public/'.$carreraFind->plan_estudio);
            // Guardamos la imagen en Disco
            $datos['plan_estudio'] = $request->file('plan_estudio')->store('carrera/plan_estudio','public');

        }
        $this->carreraRepository->updateDB($datos,$id);
        return redirect()->route('carrera.edit',$id);
    }


    public function destroy($id){
        $carrera = $this->carreraRepository->get($id);
        $universidad = $this->universidadRepository->get($carrera->id_universidad);

        Storage::delete("public/".$carrera->logo);
        Storage::delete("public/".$carrera->plan_estudio);


        $carrera->delete();

        return redirect()->route("universidad",$universidad->slug);
    }
}
