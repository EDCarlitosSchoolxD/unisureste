@include("templates.cabecera")

<div id="carouselExampleControls"  class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div  class="carousel-item active">
        <img src="{{asset("img/quintana/1.png")}}" class="d-block w-100" alt="Imagen de Quintana Roo">
      </div>
      <div class="carousel-item">
        <img src="{{asset("img/quintana/1.png")}}" class="d-block w-100" alt="Imagen de Quintana Roo">
      </div>
      <div class="carousel-item">
        <img src="{{asset("img/quintana/1.png")}}" class="d-block w-100" alt="Imagen de Quintana Roo">
      </div>
      <div class="carousel-item">
        <img src="{{asset("img/quintana/1.png")}}" class="d-block w-100" alt="Imagen de Quintana Roo">
      </div>
    </div>
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


        <p><br><br></p>

        <center><h1 class="display-3">Universidades de Quintana Roo<br><br></h1></center>
        <p class="lead">En este apartado se encuentran los municipios de Quintana Roo en donde hay universidades. En total hay 23 universidades repartidas por el estado, pero consentradas mayormente en el municipio de Benito Juarez.<br><br><br></p>

<center><h3 class="display-5">Municipios de {{$datos->nombre}}</h3></center>

        <div class="d-flex justify-content-center flex-wrap gap-4 mt-5">
            @foreach ($datos->municipios as $municipio)
            <div class="col-md-3">
                <div class="card">
                    <a href="universidades/benito/index.php"><img class="card-img-top" src="{{asset("storage/".$municipio->image->ruta)}}" alt="{{$municipio->nombre}}"></a>
                    <div class="card-body">
                        <center><h4 class="card-title">{{$municipio->nombre}}</h4></center>
                    </div>
                </div>
            </div> 
        @endforeach
        </div>
        

    

 


<hr class="my-2">


@include('templates.pie')