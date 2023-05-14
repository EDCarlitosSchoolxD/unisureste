<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Image;
use App\Models\Municipio;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepository;
use App\Repositories\MunicipioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data = $this->municipioRepository->allWithImageAndEstadoPaginate();
        return view('admin.municipios.index',["data" => $data]);
    }

    public function create(){
        $estados = $this->estadoRepository->all();

        return view('admin.municipios.create',["estados" => $estados]);
    }

    public function edit($id){
        $estados = $this->estadoRepository->all();
        $data = $this->municipioRepository->get($id);

        return view('admin.municipios.edit',["estados" => $estados,"data"=>$data,"id"=>$id]);
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

    public function destroy($id){

        $municipio = $this->municipioRepository->get($id);
        $image = $this->imageRepository->get($municipio->id_image);
        


        if(Storage::delete('public/'.$image->ruta)){
            $municipio->delete();
        }

        return redirect()->route("admin.municipios");

    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'nombre' => ['required'],
            'image' => ['image'],
            'id_estado' => ["required","integer"]
        ]);

        $municipioFind = $this->municipioRepository->get($id);

        $datos = request()->except('_token','_method','image');

        // Setteamos los valores
        $datos['id_image'] = $municipioFind->id_image;
        //Se coloca el SLUG
        $datos['slug'] = Str::slug($request->nombre);

        if($request->hasFile('image')){


            //Buscamos la imagen en la base de datos
            $imageFind = $this->imageRepository->get($municipioFind->id_image);

            //Eliminamos la imagen de Disco
            Storage::delete('public/'.$imageFind->ruta);

            // Guardamos la imagen en Disco
            $image['ruta'] = $request->file('image')->store('municipios','public');
            $image['id'] = $imageFind->id;

            //Guardamos la imagen a base de datos
            $this->imageRepository->updateDB($image,$imageFind->id);       
        }
        $this->municipioRepository->updateDB($datos,$id);
        return redirect()->route('municipios.edit',$id);
    }

    

    public function allPaginate(){
        return $this->municipioRepository->allWithImageAndEstadoPaginate();
    }
}
