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
            <li class="breadcrumb-item active">Registro</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-5 mb-4 contact-left">
            <h3>Complete con sus datos</h3>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Celular:</label>
                    <input type="tel" class="form-control" id="celular" required data-validation-required-message="Porfavor ingrese su numero celular.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Comuna:</label>
                    <input type="text" class="form-control" id="Comuna" required data-validation-required-message="Porfavor ingrese su nombre.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Localidad:</label>
                    <input type="text" class="form-control" id="localidad" required data-validation-required-message="Porfavor ingrese su nombre.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Empresa:</label>
                    <input type="text" class="form-control" id="empresa" required data-validation-required-message="Porfavor ingrese su nombre.">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Rubro:</label>
                    <input type="text" class="form-control" id="rubro" required data-validation-required-message="Porfavor ingrese su nombre.">
                </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" style="margin-right: 100px" class="btn btn-primary" id="sendMessageButton">Registrarse</button>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>