<?php
include("header.php");
?>

<!-- full Title -->
<div class="full-title">
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Registro
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


  <!-- Contact Form -->
  <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <div class="row">
    <div class="col-lg-5 mb-4 contact-left">
      <h3>Complete con sus datos</h3>
      <form name="sentMessage" id="registro">
        <div class="control-group form-group">
          <div class="controls">
            <label for="nombre" control-label required>Nombre:</label>
            <input type="text" class="form-control" id="nombre" minlength="2" maxlength="100" name="nombre" required title="Se necesita un nombre">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Email:</label>
            <input type="email" class="form-control" id="email" name="email" minlength="5" maxlength="100" required data-validation-required-message="Porfavor ingrese su correo electronico.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Contraseña:</label>
            <input type="password" class="form-control" id="password" minlength="6" maxlength="200" name="password" minlength="5" maxlength="40" password required data-validation-required-message="Porfavor ingrese su contraseña.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Confirme contraseña:</label>
            <input type="password" class="form-control" id="repassword" name="repassword" required data-validation-required-message="Porfavor confirme su contraseña.">
          </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="button" onclick="Save()" style="margin-right: 100px" class="btn btn-primary" id="registro">Registrarse</button>
        <div>
          <br>
          <a href="login.php">¿Ya tiene una cuenta?</a>
        </div>
      </form>
    </div>
    <div class="col-lg-1 mb-1 contact-left">

    </div>
    <!--
    <div class="col-lg-5 mb-4 contact-left">
      <h3>o registrese usando:</h3>
      <div class="container">
        <div class="row">
          <button href="?login=Facebook" type="button" class="btn btn-primary-face"><i class="fab fa-facebook-square"></i> Facebook</button>
        </div>
        <br>
        <div class="row">
          <button href="?login=Google" type="button" class="btn btn-primary-google"><i class="fab fa-google-plus-square"></i> Google</button>
        </div>
        <br>
        <div class="row">
          <button href="?login=Twitter" type="button" class="btn btn-primary-twitter"><i class="fab fa-twitter-square"></i> Twitter</button>
        </div>
        <br>
      </div>
    </div>
    -->
  </div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->
<?php
include("footer.php");
?>


<script>
  function Save() {
    var nombre_send = $("#nombre").val();
    var email_send = $("#email").val();
    var password_send = $("#password").val();
    var repassword_send = $("#repassword").val();

    if (nombre_send == "" || email_send == "" || password_send == "" || repassword_send == "") {
      alertify.error('Todos los datos son necesarios');
    } else if (nombre_send.length > 100) {
      alertify.error('El nombre no puede tener más de 100 caracteres');
    } else if (nombre_send.length < 2) {
      alertify.error('El nombre no puede tener menos de 2 caracteres');
    } else if (email_send.length > 100) {
      alertify.error('El email no puede tener más de 100 caracteres');
    } else if (email_send.length < 5) {
      alertify.error('El email no puede tener menos de 5 caracteres');
    } else if (password_send.length > 200) {
      alertify.error('La contraseña no puede tener más de 200 caracteres');
    } else if (password_send.length < 6) {
      alertify.error('La contraseña debe tener mas de 6 caracteres');
    } else if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(email_send)) {
      alertify.error('El formato del correo no es valido');
    } else if (password_send != repassword_send) {
      alertify.error('Las contraseñas deben ser identicas');
    } else {
      $.ajax({
        type: "POST",
        url: "ajax/usuarios/ajax_registro.php",
        data: {
          nombre: nombre_send,
          email: email_send,
          password: password_send
        },
        dataType: 'html',
        success: function(response) {
          console.log(response);
          if (response == "ok") {
            alertify
              .alert("Usuario registrado con éxito", function() {
                location.href = "tipo-usuario.php";
              });

          } else {
            if (response = "correo_existe") {
              alert("Este Correo ya existe.");
            } else {
              if (response == "security") {
                alert("Error Grave de Seguridad");
              } else {
                alert("Error General");
              }
            }
          }
        },
        error: function(response) {
          alert("Error técnico: " + textStatus);
        }
      });
    }
  }
</script>