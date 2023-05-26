<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Image;
use App\Models\ImageEstado;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageEstadoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class EstadoController extends Controller
{

    private $estadoRepository;
    private $imageEstadoRepository;

    public function __construct(EstadoRepository $estadoRepository, ImageEstadoRepository $imageEstadoRepository)
    {
        $this->estadoRepository = $estadoRepository;
        $this->imageEstadoRepository = $imageEstadoRepository;
    }
    

    //

    public function index(){

        $data = $this->estadoRepository->allWithOneImage();
        return view("admin.estados.index",["data" => $data]);
    }


    public function create(){
        
        return view("admin.estados.create");
    }
    
    public function edit(int $id){
        
        $data = $this->estadoRepository->get($id);
        
        return view("admin.estados.edit",["data" => $data,"id"=>$id]);
    }




    public function store(Request $request){

        $this->validate($request,[
            'nombre' => ['required','unique:estados'],
            "image" => ["required","array"],
            "images.*" => ["image"]
        ]);


        $datosRequest = request()->except('_token');
        $datosRequest["slug"] = Str::slug($request->nombre);
        
        if($request->hasFile('image')){
            
            $estado = new Estado($datosRequest);
            $estado = $this->estadoRepository->save($estado);


            foreach ($request->file("image") as $image) {
                // Guardamos la imagen
                $imageD['ruta'] = $image->store('estados','public');
                $imageObj = new ImageEstado($imageD);
                //Guardamos la imagen a base de datos
                $imageObj["id_estado"] = $estado->id;
                $this->imageEstadoRepository->save($imageObj);

            }

        }

        return redirect()->route('admin.estados');
    }

    public function update(Request $request,int $id){
        $this->validate($request,[
            'nombre' => ['required'],
            "image" => ["required","array"],
            "images.*" => ["image"]
        ]);

        $estadoFind = $this->estadoRepository->get($id);

        $datos = request()->except('_token','_method','image');

        //Se coloca el SLUG
        $datos['slug'] = Str::slug($request->nombre);

        // Revisa si se envia la imagen
        if($request->hasFile("image")){
            $images = $this->imageEstadoRepository->getWhereIdEstado($estadoFind->id);
            
            //Borramos todas las imagenes
            foreach ($images as $image) {
                Storage::delete("public/".$image->ruta);
                $image->delete();
            }

            // Guardamos las imagenes
            foreach($request->file("image") as $image){
                // Guardamos la imagen
                $imageD['ruta'] = $image->store('estados','public');
                $imageObj = new ImageEstado($imageD);
                //Guardamos la imagen a base de datos
                $imageObj["id_estado"] = $estadoFind->id;
                $this->imageEstadoRepository->save($imageObj);
            }
        }

        //Se guarda en Base de Datos el Estado
        $this->estadoRepository->updateDB($datos,$id);

        return redirect()->route('estados.edit',$id);
    }



    public function destroy($id){


        $estado = $this->estadoRepository->get($id);

        $images = $this->imageEstadoRepository->getWhereIdEstado($estado->id);
        
        Storage::delete("public/".$estado->logo);


        foreach($images as $image){
            Storage::delete("public/".$image->ruta);
        }
        $estado->delete();
        
        return redirect()->route("admin.estados");
    }
}
