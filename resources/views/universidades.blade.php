@include("templates.cabecera")

  
  <div class="container">
    <div class="row">

        <center><h3 class="display-5"><br><br>Universidades de {{$datos->nombre}}<br><br></h3></center>

        <div class="d-flex justify-content-center flex-wrap gap-4 mt-5"">
          @foreach ($datos->universidades as $universidad)
          <div class="col-md-3">
            <div class="card">
                <a href="{{route("universidad",$universidad->slug)}}"><img class="card-img-top" src="{{asset('storage/'.$universidad->logo)}}" alt=""></a>
                <div class="card-body">
                    <center><h4 class="card-title">{{$universidad->nombre}}</h4></center>
                </div>
            </div>
        </div>
          @endforeach
        </div>

       
        



@include('templates.pie')