@include("templates.cabecera")

  
  <div class="container">
    <div class="row">

        <center> <h1 class="display-3"><br>{{$datos->nombre}}<br></h1> </center>

        <p><br><br><br><br></p>
        
        @if (isset($datos->descripcion))
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <center><h4 class="card-title">Objetivos generales</h4></center>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <p class="card-text"style="text-align:justify;">
                     {!!$datos->descripcion!!}
                    <br></p>
                </div>
              </div>
            </div>
        @endif
        
        
        @if (isset($datos->perfil_ingreso))
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <center><h4 class="card-title">Perfil de Ingreso</h4></center>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p class="card-text"style="text-align:justify;">
        
               {!!$datos->perfil_ingreso!!}
              </p>      
            </div>
            </div>
          </div>
        @endif


          @if (isset($datos->perfil_egreso))
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <center><h4 class="card-title">Perfil de Egreso</h4></center>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
              <div class="accordion-body">
              <p class="lead"style="text-align:justify;">
        
                {!!$datos->perfil_egreso!!}
        
              </p>
              </div>
            </div>
          </div>
          @endif
        
          
        
        </div>
        
        <p><br><br><br></p>
        
        <div class="col-md-">
          <br>
            <div class="card">
              <div class="card-body">
              <center><h3 class="card-title">Plan de estudios<br><br></h4></center>
              <embed src="{{asset("storage/".$datos->plan_estudio)}}" type="application/pdf" width="100%" height="1260px"/>
        
        </div>
        </div>
        </div>
        
        <p><br><br></p>
        
        
        
        
        <a class="btn btn-secondary btn-lg" href="{{asset("storage/".$datos->plan_estudio)}}" download="{{$datos->nombre}}" id="pdf" style="background-color: #8D4A57;  border-color:#8D4A57;">Descargar plan de estudio</a>
        
@include('templates.pie')