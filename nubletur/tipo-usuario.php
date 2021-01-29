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
        <h3>Indíquenos su objetivo para otorgarle un privilegio:</h3>
    </div>
    <br>
    <br>
    <div class="container text-center">
        <div class="faq-main">
            <div class="" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="row">
                    <div class="col-md-3">
                        <button role="link" onclick="window.location='index.php'" class="btn btn-primary" id="usuario-visitante">Usuario visitante</button>
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-3">
                        <button role="link" onclick="window.location='registro-usuario-eventos.php'" class="btn btn-primary" id="usuario-eventos">Publicador de eventos</button>
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-3">
                        <button role="link" onclick="window.location='registro-pyme.php'" class="btn btn-primary" id="usuario-visitante">Pyme publicitario</button>
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
                        <p class="card-text">Este es el usuario que visita la pagina con las intenciones de conocer, opinar y compartir.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a>Publicador de eventos</a>
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
                        <p class="card-text">Un usuario con una Pyme que busca dar a conocer los productos que ofrece y crear asistencias en los eventos que participará.</p>
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