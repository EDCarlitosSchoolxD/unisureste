<div class="mb-6">
    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del estado</label>
    <input 
  
    @if (old('nombre'))
        value="{{old('nombre')}}"

    @elseif (isset($data->nombre))
        value="{{$data->nombre}}"
   @endif
    
    type="text" name="nombre" id="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Ej; Cancún" required>
  </div>

<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Estado</label>
    <select class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitebg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_estado" id="id_estado">
        <option selected value="null" disabled>--Seleccionar Estado--</option>
        @foreach ($estados as $estado)
                @if (old('id_estado'))
                    <option
                     {{old('id_estado') == $estado->id?'selected':''}}
                    value="{{$estado->id}}">{{$estado->nombre}}</option>

                @elseif(isset($data->id_estado))
                    <option
                    {{$data->id_estado == $estado->id?'selected':''}}
                    value="{{$estado->id}}">{{$estado->nombre}}</option>
                @else
                    <option
                    value="{{$estado->id}}">{{$estado->nombre}}</option>
                @endif



        @endforeach
    </select>
</div>

<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Imagen</label>
    <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
</div>


  
  