<div class="mb-6">
    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la universidad</label>
    <input 
  
    @if (old('nombre'))
        value="{{old('nombre')}}"

    @elseif (isset($data->nombre))
        value="{{$data->nombre}}"
   @endif
    
    type="text" name="nombre" id="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nombre de la universidad" required>
  </div>

  <div class="mb-6">
    <label for="url_web" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url web</label>
    <input 
  
    @if (old('url_web'))
        value="{{old('url_web')}}"

    @elseif (isset($data->url_web))
        value="{{$data->url_web}}"
   @endif
    
    type="text" name="url_web" id="url_web" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="ej; https://www.google.com/?hl=es" required>
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

<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="estado">Estado</label>
    <select id="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitebg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_estado" id="id_estado">
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
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="id_municipio">Municipio</label>
    <select class="block mb-2 text-sm font-medium text-gray-900 dark:text-whitebg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_municipio" id="id_municipio">
        <option id="id_municipio" selected value="null" disabled>--Seleccionar Municipio--</option>
        @foreach ($municipios as $municipio)
                @if (old('id_municipio'))
                    <option
                     {{old('id_municipio') == $municipio->id?'selected':''}}
                    value="{{$municipio->id}}">{{$municipio->nombre}}</option>

                @elseif(isset($data->id_municipio))
                    <option
                    {{$data->id_municipio == $municipio->id?'selected':''}}
                    value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                @else
                    <option
                    value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                @endif
        @endforeach
    </select>
</div>


<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="mision">Mision</label>
    <div class="h-32 border py-2 px-3 text-grey-800"  id="misionQuill">
        @if (old('mision'))
        {!!old('mision')!!}
        @elseif(isset($data->mision))
        {!! $data->mision !!}
        @endif

    </div>
</div>

<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="vision">Vision</label>
    <div class="h-32 border py-2 px-3 text-grey-800"  id="visionQuill">
        @if (old('vision'))
        {!!old('vision')!!}
        @elseif(isset($data->vision))
        {!! $data->vision !!}
        @endif

    </div>
</div>

<div class="flex flex-col mb-4">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="objetivos">Objetivos</label>
    <div class="h-32 border py-2 px-3 text-grey-800"  id="objetivosQuill">
        @if (old('objetivos'))
        {!!old('objetivos')!!}
        @elseif(isset($data->objetivos))
        {!! $data->objetivos !!}
        @endif

    </div>
</div>

<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Imagen</label>
    <input name="image[]" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
</div>

<div class="flex w-4/5 mx-auto justify-center flex-wrap gap-4">
    <div class="flex flex-col mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="url_web">Latitud:</label>
        <input class="border py-2 px-3 text-grey-800
        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
        type="text"
        name="latitud"
        id="latitud"
        @if (old("latitud"))
            value="{{old("latitud")}}"
        @elseif(isset($data->latitud))
            value="{{$data->latitud}}"
        @else
            value=""
        @endif
        >
    </div>
    <div class="flex flex-col mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="url_web">Longitud</label>
        <input class="border py-2 px-3 text-grey-800
        disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
        type="text"
        name="longitud"
        id="longitud"
        @if (old("longitud"))
            value="{{old("longitud")}}"
        @elseif(isset($data->longitud))
            value="{{$data->longitud}}"
        @else
            value=""
        @endif

        >
    </div>

</div>

<input type="hidden" id="mision"  name="mision" value="">
<input type="hidden" id="vision"  name="vision" value="">
<input type="hidden" id="objetivos"  name="objetivos" value="">


<div id="map"></div>


<style>
    #map{
        height: 400px;
        width: 100%
}
</style>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
    
    const quillOptions = {
        theme:'snow',
    }
    let misionQuill = new Quill("#misionQuill",quillOptions)
    let visionQuill = new Quill("#visionQuill",quillOptions)
    let objetivosQuill = new Quill("#objetivosQuill",quillOptions)

    
    
    const latitudDom = document.getElementById('latitud');
    const longitudDom = document.getElementById('longitud');
    const estadoDom = document.getElementById('estado');
    const municipiosDom = document.getElementById('id_municipio')
    let latitud = {{$data->latitud}} || 23.5540767 ;
    let longitud = {{$data->longitud}} || -102.6205;

    const MUNICIPIOS = {!!json_encode($municipios)!!};

    let map = L.map('map').setView([latitud, longitud], 6)

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);



    map.on('click',onMapClick);

    let marker;
    if(latitud && longitud){
        marker = L.marker([latitud,longitud]).addTo(map);
        marker.bindPopup(`<h1>{{$data->nombre}}</h1>`).openPopup();
    }

    estadoDom.addEventListener('change',changeMunicipios)

    function onMapClick(e){
        latitud = e.latlng.lat;
        longitud = e.latlng.lng;

        console.log({latitud,longitud});

        if(marker){
            marker.remove();
        }
        marker = L.marker([latitud,longitud]).addTo(map);
        latitudDom.value = latitud;
        longitudDom.value = longitud;

    }


    async function changeMunicipios(e){

        const value = parseInt(e.target.value)

        const municipalities = await MUNICIPIOS.filter(municipio=>municipio.id_estado === value)


        removeChildNodes(municipiosDom)


        const elements = municipalities.forEach(municipio=>{
                element = document.createElement('option');
                element.value =municipio.id;
                element.innerText = municipio.nombre
                municipiosDom.appendChild(element)
                return element;
        })




    }

    function removeChildNodes(element) {
        if ( element.hasChildNodes() )
        {
        while ( element.childNodes.length >= 1 )
        {
        element.removeChild( element.firstChild );
        }
        }
    }
</script>
  