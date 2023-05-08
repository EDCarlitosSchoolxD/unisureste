@extends('templates.admin-base')

@section('content')
    
    <section class="container flex flex-wrap  justify-center w-4/5 mx-auto mt-20  gap-10">
        <x-card-admin titulo="Administrar Estados" descripcion="Esta seccion es para administrar los distintos estados de la republica mexicana" href="{{route('admin.estados')}}"  />
        <x-card-admin titulo="Administrar Estados" descripcion="Esta seccion es para administrar los distintos estados de la republica mexicana" href="{{route('admin.estados')}}"  />
        <x-card-admin titulo="Administrar Estados" descripcion="Esta seccion es para administrar los distintos estados de la republica mexicana" href="{{route('admin.estados')}}"  />
    </section>




@endsection