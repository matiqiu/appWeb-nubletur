<?php
include("header.php");
?>
<!-- full Title -->
<div class="full-title">
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Crea una contraseña nueva
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
            <li class="breadcrumb-item active">Recuperar contraseña</li>
        </ol>
    </div>
    <div class="conainer">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <form role="form" method="post" action="#">
                    <br>
                    <div class="form-group">
                        <label for="clave">Nueva contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="Ingresa tu correo electronico." placeholder="Minimo 6 caracteres">
                    </div>
                    <div class="form-group">
                        <label for="clave2">Escribe de nuevo la contraseña</label>
                        <input type="password" class="form-control" name="password2" id="password2" required data-validation-required-message="Ingresa tu correo electronico." placeholder="Deben coincidir">
                    </div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Guardar contraseña</button>
                </form>
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