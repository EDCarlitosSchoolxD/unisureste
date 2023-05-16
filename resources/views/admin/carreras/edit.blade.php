@extends('templates.admin-base')

@section('content')


    <div class="w-2/4 m-auto  rounded-lg mt-10">
        <a href="{{route('universidad',$universidad->slug)}}" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Regresar
        </a>
    </div>


    <section class="w-2/4 m-auto shadow-xl p-10 rounded-lg mt-5"  >

        


        <div class="">
            @foreach ($errors->all() as $error)
            <p type="text" id="username-error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-lg rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 last:mb-0 mb-3" >
                {{$error}}
            </p>
            @endforeach
        </div>

        <form id="formulario" enctype="multipart/form-data" action="{{route("carrera.update",$id)}}" method="POST" >
            @csrf
            @method("PUT")
            @include('templates.forms.carrera')
            
            <button id="enviar" type="submit" class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar</button>
          
            
        </form>
    </section>

  
    <script>
        const btnEnviar = document.getElementById('enviar');

        btnEnviar.addEventListener('click',e=>{
            e.preventDefault();
            const descripcion = document.getElementById('descripcion').value = descripcionQuill.container.firstChild.innerHTML;
            const perfil_ingreso = document.getElementById('perfil_ingreso').value = perfil_ingresoQuill.container.firstChild.innerHTML;
            const perfil_egreso = document.getElementById('perfil_egreso').value = perfil_egresoQuill.container.firstChild.innerHTML;

            const form = document.getElementById('formulario').submit()


        })

</script>

@endsection