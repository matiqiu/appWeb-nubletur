<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
      <br>
      <br>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group form-group">
          <div class="controls">
            <label>Correo electronico</label>
            <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Ingresa tu correo electronico.">
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
        <button type="button" class="btn btn-primary" onclick="IniciarSesion()">Iniciar sesión</button>
      </form>
    </div>
    <div class="col-lg-4">

    </div>
    <!--
    <div class="col-lg-4  mb-4 contact-left">
      <br>
      <br>
      <div class="container">
        <div class="row">
          <button href="#" type="button" class="btn btn-primary-face"><i class="fab fa-facebook-square"></i> Facebook</button>
        </div>
        <br>
        <div class="row">
          <button href="#" type="button" class="btn btn-primary-google"><i class="fab fa-google-plus-square"></i> Google</button>
        </div>
        <br>
        <div class="row">
          <button href="#" type="button" class="btn btn-primary-twitter"><i class="fab fa-twitter-square"></i> Twitter</button>
        </div>
      </div>
    </div>
    -->
  </div>
  <div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
      <br>
      <div class="text-center">
        <a href="registro.php">¿Aún no tienes cuenta?</a>
      </div>
      <br>
      <div class="text-center">
        <a href="recuperar-password.php">¿Olvidaste tu contraseña?</a>
      </div>
    </div>
    <div class="col-lg-4">

    </div>
  </div>
</div>
<!-- /.row -->
<br>
</div>
<!-- /.container -->
<?php
include("footer.php");
?>

<script>
  function IniciarSesion() {
    var email = $("#email").val();
    var password = $("#password").val();
    //alert("--"+correo+"--"+password);
    if (email == "" || password == "") {
      alertify.error('Ingrese correo y contraseña');
    } else {
      $.ajax({
        type: "POST",
        url: "ajax/acceso/ajax_login.php",
        data: {
          email_send: email,
          password_send: password
        },
        dataType: 'html',
        success: function(response) {
          switch (response) {
            case "ok":


              alertify
                .alert("Ingreso ok.", function() {
                  location.href = "index.php";
                });



              break;
            default:
              console.log(response);

              alertify.error('Combinación incorrecta');
              break;
          }
        },
        error: function(response) {
          alert("Request failed: " + response);
        }
      });
    }
  }
</script>