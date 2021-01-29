<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("header.php");
include("model/model_user.php");

?>

<!-- full Title -->
<div class="full-title">
  <div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Contactanos
      <small>Subheading</small>
    </h1>
  </div>
</div>

<!-- Page Content -->
<div class="container">
  <div class="breadcrumb-main">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Contacto</li>
    </ol>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Map Column -->
    <div class="col-lg-8 mb-4">
      <!-- Embedded Google Map -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d819267.8284705258!2d-71.99856851204666!3d-36.66813007741548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1610834129714!5m2!1ses-419!2scl" width="700" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Contact Details Column -->
    <div class="col-lg-4 mb-4 contact-right">
      <h3>Detalles de contacto</h3>
      <p>
        Chilán
        <br>Sin oficina establecida
        <br>
      </p>
      <p>
        <abbr title="Phone">P</abbr>: (123) 456-7890
      </p>
      <p>
        <abbr title="Email">E</abbr>:
        <a href="mailto:name@example.com">nubletur@gmail.com
        </a>
      </p>
      <p>
        <abbr title="Hours">H</abbr>: Lunes - Viernes: 9:00 AM to 5:00 PM
      </p>
    </div>
  </div>
  <!-- /.row -->

  <!-- Contact Form -->
  <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  <div class="row">
    <div class="col-lg-8 mb-4 contact-left">
      <h3>Envíanos un mensaje</h3>
      <form method="POST" action="correo.php">
        <div class="control-group form-group">
          <div class="controls">
            <label>Asunto:</label>
            <input type="text" class="form-control" id="asunto" name="asunto" required data-validation-required-message="Please enter your name.">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Mensaje:</label>
            <textarea rows="5" cols="100" class="form-control" id="message" name="mensaje" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
          </div>
        </div>
        <input type="hidden" class="form-control" id="name" name="name" value="<?php echo $nombre; ?>">
        <input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary" id="enviar" name="enviar">Enviar Mensaje</button>
      </form>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<?php
include("footer.php");
?>
<!--
<script>
  function EnviarCorreo() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    if (name !== null &&
      email !== null &&
      message !== null) {
      var json_object = {
        "name": name,
        "email": email,
        "message": message
      };
      $.ajax({
        cache: false,
        data: JSON.stringify(json_object),
        contentType: "application/json",
        dataType: "json",
        type: 'POST',
        url: 'https://awaayvlxma.execute-api.us-east-2.amazonaws.com/contacto-api',
        success: function() {
          document.getElementById("name").value = "";
          document.getElementById("email").value = "";
          document.getElementById("message").value = "";
          alert("Tu comentario fue enviado correctamente.");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          alert("Tuvimos un problema al recibir su solicitud, Favor de volver a intentar en unos minutos.");
        }
      });
    }
  }
</script>
-->