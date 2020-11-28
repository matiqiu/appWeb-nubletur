<?php
include("header.php");
?>

<!-- full Title -->
<div class="full-title">
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Inicio de sesión
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
      <li class="breadcrumb-item active">Inicio sesión</li>
    </ol>
  </div>

  <br>
  <!-- Contact Form -->
  <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4 mb-4 contact-left">
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group form-group">
          <div class="controls">
            <label>Correo electronico</label>
            <input type="text" class="form-control" name="email" id="email" required data-validation-required-message="Ingresa tu correo electronico.">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="Ingresa tu contraseña.">
          </div>
        </div>

        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Iniciar sesión</button>
      </form>
      <br>
      <div class="text-center">
        <a href="#">¿Aún no tienes cuenta?</a>
      </div>
      <br>
      <div class="text-center">
        <a href="#">¿Olvidaste tu contraseña?</a>
      </div>
    </div>
    <div class="col-lg-4">

    </div>
  </div>
  <!-- /.row -->
  <br>
</div>
<!-- /.container -->
<?php
include("footer.php");
?>