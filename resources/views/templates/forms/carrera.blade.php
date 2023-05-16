<div class="mb-6">
    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la carrera</label>
    <input 
  
    @if (old('nombre'))
        value="{{old('nombre')}}"

    @elseif (isset($data->nombre))
        value="{{$data->nombre}}"
   @endif
    
    type="text" name="nombre" id="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nombre de la carrera" required>
  </div>


<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="tipo">Tipo</label>
    <select name="tipo" id="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitebg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($tipos as $tipo)
                @if (old('tipo'))
                    <option
                     {{old('tipo') == $tipo?'selected':''}}
                    value="{{$tipo}}">{{$tipo }}</option>

                @elseif(isset($data))
                    <option
                    {{$data->tipo == $tipo?'selected':''}}
                    value="{{$tipo}}">{{$tipo}}</option>
                @else
                    <option
                    value="{{$tipo}}">{{$tipo}}</option>
                @endif



        @endforeach
 
    </select>
</div> 




<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="mision">Objetivos generales</label>
    <div class="h-32 border py-2 px-3 text-grey-800"  id="descripcionQuill">
        @if (old('descripcion'))
        {!!old('descripcion')!!}
        @elseif(isset($data->descripcion))
        {!! $data->descripcion !!}
        @endif

    </div>
</div>

<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="perfil_ingreso">Perfil de Ingreso</label>
    <div class="h-32 border py-2 px-3 text-grey-800"  id="perfil_ingresoQuill">
        @if (old('perfil_ingreso'))
        {!!old('perfil_ingreso')!!}
        @elseif(isset($data->perfil_ingreso))
        {!! $data->perfil_ingreso !!}
        @endif

    </div>
</div>

<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="perfil_egreso">Perfil Egreso</label>
    <div class="h-32 border py-2 px-3 text-grey-800"  id="perfil_egresoQuill">
        @if (old('perfil_egreso'))
        {!!old('perfil_egreso')!!}
        @elseif(isset($data->perfil_egreso))
        {!! $data->perfil_egreso !!}
        @endif

    </div>
</div>


<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Imagen Logo</label>
    <input name="logo"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
</div>
<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="plan_estudio">Plan de estudio</label>
    <input name="plan_estudio" id="plan_estudio" accept="application/pdf" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
</div>

<input type="hidden" id="descripcion"  name="descripcion" value="">
<input type="hidden" id="perfil_ingreso"  name="perfil_ingreso" value="">
<input type="hidden" id="perfil_egreso"  name="perfil_egreso" value="">





<script>
    
    const quillOptions = {
        theme:'snow',
    }
    let descripcionQuill = new Quill("#descripcionQuill",quillOptions)
    let perfil_ingresoQuill = new Quill("#perfil_ingresoQuill",quillOptions)
    let perfil_egresoQuill = new Quill("#perfil_egresoQuill",quillOptions)

</script>
  