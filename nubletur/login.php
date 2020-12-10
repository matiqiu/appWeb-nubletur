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
    <div class="col-lg-2">

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
        <button type="submit" class="btn btn-primary" id="sendMessageButton" onclick="IniciarSesion()">Iniciar sesión</button>
      </form>
    </div>
    <div class="col-lg-1">

    </div>
    <div class="col-lg-4">
      <div id="socialLogin2">
        <button type="button" id="fblogin">
          f&nbsp;&nbsp;&nbsp;<em id="fbname"></em>
          <span id="fbtext">Facebook</span>
        </button>

        <button type="button" id="gpluslogin">
          g+<em id="gpname"></em>
          <span id="gptext">Google</span>
        </button>

        <button type="button" id="twtrlogin">
          t&nbsp;&nbsp;&nbsp;<em id="twtrname"></em>
          <span id="twtrtext">Twitter</span>
        </button>
      </div>
    </div>
    <div class="col-lg-1">

    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
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
      alert("Ingrese correo y password");
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
              alert("login ok");
              break;
            default:
              console.log(response);
              alert("Combinación errónea");
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