@extends('templates.admin-base')

@section('content')


    <div class="w-2/4 m-auto  rounded-lg mt-10">
        <a href="{{route('admin.estados')}}" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Regresar
        </a>
    </div>

    <section class="w-2/4 m-auto shadow-xl p-10 rounded-lg mt-10" >

        <div class="">
            @foreach ($errors->all() as $error)
            <p type="text" id="username-error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-lg rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 last:mb-0 mb-3" >
                {{$error}}
            </p>
            @endforeach
        </div>

        <form enctype="multipart/form-data" action="{{route("estados.update",1)}}" method="POST" >
            @method("PUT")
            @csrf
            @include('templates.forms.estado')
            
            <button type="submit" class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Modificar
            </button>
          
            
        </form>
    </section>

  

@endsection