@extends('templates.admin-base')

@section('content')
    

<form enctype="multipart/form-data" action="{{route("estados.store")}}" method="POST" class="w-2/4 m-auto shadow-xl p-10 rounded-lg mt-10" >
    @csrf
    @include('templates.forms.estado')
    
    <button type="submit" class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
  
    
</form>
  

@endsection