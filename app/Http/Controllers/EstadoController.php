<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Image;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepositories;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class EstadoController extends Controller
{

    private $estadoRepository;
    private $imageReository;

    public function __construct(EstadoRepository $estadoRepository,ImageRepository $imageReository)
    {
        $this->estadoRepository = $estadoRepository;
        $this->imageReository = $imageReository;
    }
    

    //

    public function index(){
        $data =$this->estadoRepository->allWithImage();

      
        return view("admin.estados.index",["data" => $data]);
    }


    public function create(){
        
        return view("admin.estados.create");
    }
    
    public function edit(int $id){
        
        $data = $this->estadoRepository->get($id);
        
        return view("admin.estados.edit",["data" => $data]);
    }




    public function store(Request $request){

        $this->validate($request,[
            'nombre' => ['required','unique:estados'],
            'image' => ['image','required'],
        ]);


        $datos = request()->except('_token');
        


        // Revisa si se envia la imagen
        if($request->hasFile('image')){

            // Guardamos la imagen
            $image['ruta'] = $request->file('image')->store('estados','public');
            $imageObj = new Image($image);
            //Guardamos la imagen a base de datos
            $this->imageReository->save($imageObj);

            // Creamos un Objeto estado y colocamos el ID de la image
            $datosObj = new Estado($datos);
            $datosObj->id_image = $imageObj->id;
            $datosObj->slug = Str::slug($request->nombre);

            //Se guarda en Base de Datos el Estado
            $this->estadoRepository->save($datosObj);
        }

        return redirect()->route('admin.estados');
    }

    public function update(Request $request,int $id){
        $this->validate($request,[
            'nombre' => ['required'],
            'image' => ['image'],
        ]);

        $estadoFind = $this->estadoRepository->get($id);

        $datos = request()->except('_token','_method','image');

        // Setteamos los valores
        $datos['id_image'] = $estadoFind->id_image;
        //Se coloca el SLUG
        $datos['slug'] = Str::slug($request->nombre);

        // Revisa si se envia la imagen
        if($request->hasFile('image')){

            //Buscamos la imagen en la base de datos
            $imageFind = $this->imageReository->get($estadoFind->id_image);

            //Eliminamos la imagen de Disco
            Storage::delete('public/'.$imageFind->ruta);

            // Guardamos la imagen en Disco
            $image['ruta'] = $request->file('image')->store('estados','public');
            $image['id'] = $imageFind->id;

            //Guardamos la imagen a base de datos
            $this->imageReository->updateDB($image,$imageFind->id);       
        }
        //Se guarda en Base de Datos el Estado
        $this->estadoRepository->updateDB($datos,$id);

        return redirect()->route('estados.edit',$id);
    }



    public function destroy($id){

        $estado = $this->estadoRepository->get($id);
        $image = $this->imageReository->get($estado->id_image);

        Storage::delete('public/'.$image->ruta);


        if($estado){
            $estado->delete();
        }

        
        return redirect()->route("admin.estados");
    }
}
