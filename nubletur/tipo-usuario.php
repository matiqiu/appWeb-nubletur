<?php
include("header.php");
?>
<!-- full Title -->
<div class="full-title">
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Completar registro
            <small>Subheading</small>
        </h1>
    </div>
</div>

<!-- Page Content -->
<div class="container">
    <div class="breadcrumb-main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Tipo de usuario</li>
        </ol>
    </div>
    <br>
    <br>
    <br>
    <div class="text-center">
        <h3>Indiquenos su objetivo para otorgarle un privilegio:</h3>
    </div>
    <br>
    <br>
    <div class="container text-center">
        <div class="faq-main">
            <div class="" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" id="usuario-visitante">Usuario visitante</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" id="usuario-eventos">Publicador eventos</button>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" id="usuario-visitante">Pyme publicitario</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container text-center">
        <h4>Implicancias</h4>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a>Usuario visitante</a>
                        </h4>
                        <p class="card-text">Este es el usuario que visita la pagina con la intención de conocer, opinar y compartir.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a>Publicador eventos</a>
                        </h4>
                        <p class="card-text">Usuario que busca publicar eventos de las distintas zonas de la región, tanto de empresas publicas como privadas.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a>Pyme publicitario</a>
                        </h4>
                        <p class="card-text">Un usuario con una pyme que quiere agregar las asistencias que tendra en los eventos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<?php
include("footer.php");
?>