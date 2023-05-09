<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Image;
use App\Repositories\EstadoRepository;
use App\Repositories\ImageRepositories;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
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
        return view("admin.estados.index");
    }


    public function create(){
        return view("admin.estados.create");
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
            $datosObj->slug = Str::slug($request->estado);

            //Se guarda en Base de Datos el Estado
            $this->estadoRepository->save($datosObj);
        }

        return redirect()->route('admin.estados');
    }

}
