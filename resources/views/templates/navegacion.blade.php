
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #753442;">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo "TILIN";?>"><h3>Universidades </h3></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
            
          <li class="nav-item">
            <a class="nav-link active" href="{{route("home")}}"><font size=4>Inicio</font>
              <span class="visually-hidden"></span>
            </a>
            <li class="nav-item">
            <a class="nav-link" href="{{route("municipios","campeche")}}"><font size=4>Campeche</font></a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route("municipios","yucatan")}}"><font size=4>Yucatan</font></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route("municipios","quintana-roo")}}"><font size=4>Quintana Roo</font></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://test-vocacional.uvm.mx/"><font size=4>Test Vocacional</font></a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>