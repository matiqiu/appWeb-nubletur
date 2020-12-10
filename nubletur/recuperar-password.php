<?php
include("header.php");
?>
<!-- full Title -->
<div class="full-title">
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Recuperación de contraseña
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

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <form role="form" method="post" action="#">
                    <h2>Introduce tu email</h2>
                    <br>
                    <p>
                        Escribe tu dirección de correo electrónico y te enviaremos un email con la que podras restablecer tu contraseña.
                    </p>
                    <br>
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Ingresa tu correo electronico.">
                    <br>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php
include("footer.php");
?>