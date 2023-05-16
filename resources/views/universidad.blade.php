@include("templates.cabecera")


<div id="carouselExampleControls"  class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @for ($i = 0; $i < count($datos->images); $i++)
          
        <div  class="carousel-item {{$i ==1?"active":""}}">
          <img src="{{asset("storage/".$datos->images[$i]->ruta)}}" class="d-block w-100" alt="Imagen de Quintana Roo">
        </div>
        @endfor
      
        
      
 
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <div class="container">
    <div class="row">


      @auth
      <div class="w-3/4 m-auto mt-5 mb-5">
        <a style="background-color:#8D4A57;" href="{{route('carrera.create',$datos->id)}}" class="p-3 text-white btn">Añadir Carrera</a>
      </div>
      @endauth
      
      
      <center> <h1 class="display-3"><br><b>Universidad del Caribe</b><br><br></h1> </center>



      <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <center><h4 class="card-title">Misión</h4></center>
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p class="card-text"style="text-align:justify;">{!!$datos->mision!!}<br><br></p>
        </div>
      </div>
    </div>
  
    
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <center><h4 class="card-title">Visión</h4></center>
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <p class="card-text"style="text-align:justify;">{!!$datos->vision!!}</p>  
        
      </div>
      </div>
    </div>
  
  </div>
  

  <! –– inicio de las cartas de carreras ––>


  <center><h1 class="title"><br><br>Carreras<br><br></h3></center>


    <div class="d-flex justify-content-center flex-wrap gap-4 mt-1">

      @foreach ($datos->carreras as $carrera)
      <div class="col-md-3">
        <div class="card">
                    <div class="cardd" style="--i:url({{asset("storage/".$carrera->logo)}})">
                    <div class="content">
                        <br><center>
                        <h2>{{$carrera->nombre}}<br><br><br><br></h2>
                        <a href="{{route("carrera",[$datos->slug,$carrera->slug])}}">Ver Detalles</a><br><br><br></center>
                        @auth
                          <a href="{{route("carrera.edit",$carrera->id)}}">Editar</a>    
                          <form action="{{route("carrera.destroy",$carrera->id)}}" method="POST">
                             @csrf
                             @method("DELETE")
                            <input type="submit" value="Eliminar">
                          </form>
                          @endauth
                    </div>
                </div>
        </div>
    </div>
      @endforeach


    </div>
  

   

 


  <center><h1 class="card-title"><br><br>Ubicación<br><br></h1></center>

    <style>
      #map{
        height: 450px;
        width: 600px
        margin: 0 auto;
      }
    </style>
    <div class="m-auto" id="map"></div>

  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
        <script>

            const latitud = {!! $datos->latitud !!};
            const longitud = {!! $datos->longitud !!};

            const universidadValue = "{{$datos->nombre}}"
            console.log(universidadValue);

            const map = L.map('map').setView([latitud, longitud], 15);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            const marker = L.marker([latitud,longitud]).addTo(map);
            marker.bindPopup(`<h1>${universidadValue}</h1>`).openPopup();



        </script>
@include('templates.pie')