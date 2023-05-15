<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidades del Sureste</title>

    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../img/Logo_favicon.png" type="image/x-icon">
    

</head>
<body class="ex1">
    <div id="carouselExampleControls"  class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div  class="carousel-item active">
            <img src="{{asset("img/Logo2.png")}}" class="d-block w-100" alt="Logo">
          </div>
          <div class="carousel-item">
            <img src="{{asset("img/Quintana.png")}}"" class="d-block w-100" alt="Quintana Roo">
          </div>
          <div class="carousel-item">
            <img src="{{asset("img/Yucatan.png")}}" class="d-block w-100" alt="Yucatan">
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

@include("templates.navegacion")




    <div class="container">
        <div class="row">

<div class="jumbotron">




    <center><h1 class="display-3"><br>¿Quiénes somos?<br><br></h1></center>
  <p class="lead">Esta pagina web tiene el proposito de recaudar información de las Universidades que estan presentes en el sur de México,
    los estados que comprenden son: Yucatan y Quintana Roo.<br><br>
    Aquí encontraras información básica sobre las Universidades que se encuentran en dichos estados, entre la información que podras encontrar
    seran: Universidades por estado y por municipio, Universidades tanto públicas como privadas, planes de estudio de las carreras disponibles en l Universidad
    la mision y vision de la institución.<br><br>
    

    Hemos recopilado toda esta informacion para facilitar el conocimiento de las carreras y universidades en la peninsula de Yucatan 
    
    <br><br></p>
</div>

<center><h1 class="display-4"><br>Elección de carrera universitaria<br><br></h1></center>
      <img loading="lazy" src="{{asset("img/Eleccion.png")}}" alt="Imagen de dudas">

  <p class="lead"><br><br>
    La elección de una carrera universitaria es una de las decisiones más importantes que tomamos en nuestra adolescencia y
      es por ello que decidirnos por una puede llegar a ser una tarea sumamente complicada que nos lleve un tiempo de reflexión. Esto es así ya que existen muchas 
      presiones por parte de amigos y familiares que nos terminan llegando a confundir sobre nuestras elecciones.<br><br>

      Es impórtate evaluar bien lo que <b>nosotros queremos</b>, ya que nosotros somos los que ejercerán esa área y no los demás por lo que
      nunca hay que estudiar algo por presión y arriesgarnos a ser infelices.<br><br><br>


      Aqui dejamos un test de fortalezas que te puede ayudar a identificar las areas en las que destacas, esta es una pagina en donde despues de resgistrarte



      <br><br></p>


<div class="col-6"><p class="lead" style="text-align:justify;">
Para ayudarte a la elección de carrera te dejamos un test vocacional que te puede ayudar a identificar las áreas en las que destacas. Las respuestas de este test pueden ayudar a reafirmar las áreas de tu interés o dar más opciones de carreras que se adapten a mi tipo de persona.
<br><br></p></div>


<div class="col-6">
  
<div class="card">
  <div class="card-body"><center>
    <h4 class="card-title">Conócete || OLA</h4>
    <p class="card-text">Descubre tus intereses y habilidades</p>
    <a name="" id="" class="btn btn-secondary" href="https://www.observatoriolaboral.gob.mx/#/test-vocacional" role="button" style="background-color: #753442; border: #753442;">Ir al test</a>

</center></div>
</div>

</div>


<center><h1 class="display-4"><br>Universidades por estado<br><br></h1></center>



  <div class="col-md-6">
          <div class="card">
            <img loading="lazy" class="card-img-top" src="{{asset("img/yuc1.png")}}" alt="">
            <div class="card-body"><center>
              <a name="" id="" class="btn btn-secondary btn-lg" href="{{route("municipios","yucatan")}}" role="button" style="background-color: #753442; border: #753442;">Visitar</a>
              </center></div>
          </div>
      </div>


      <div class="col-md-6">
          <div class="card">
            <img loading="lazy" class="card-img-top" src="{{asset("img/quintana2.png")}}" alt="">
            <div class="card-body"><center>
              <a name="" id="" class="btn btn-secondary btn-lg" href="{{route("municipios","quintana-roo")}}" role="button" style="background-color: #753442; border: #753442;">Visitar</a>
              </center></div>
          </div>
      </div>




  <hr class="my-2">

@include("templates.pie")