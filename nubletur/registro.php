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
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group form-group">
          <div class="controls">
            <label>Nombre:</label>
            <input type="text" class="form-control" id="nombre" required data-validation-required-message="Porfavor ingrese su nombre.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Email:</label>
            <input type="email" class="form-control" id="email" required data-validation-required-message="Porfavor ingrese su correo electronico.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Celular:</label>
            <input type="tel" class="form-control" id="celular" required data-validation-required-message="Porfavor ingrese su numero celular.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Contraseña:</label>
            <input type="password" class="form-control" id="password" required data-validation-required-message="Porfavor ingrese su contraseña.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Confirme contraseña:</label>
            <input type="password" class="form-control" id="password" required data-validation-required-message="Porfavor ingrese su contraseña.">
          </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" style="margin-right: 100px" class="btn btn-primary" id="sendMessageButton">Registrarse</button>
          <a href="#">¿Ya tiene una cuenta?</a>
      </form>
    </div>
    <div class="col-lg-2 mb-4 contact-left">
      <div id="orSeparator">
        <div id="socialSeparatorTop"></div>
        <div id="socialSeparatorBottom"></div>
      </div>
    </div>
    <div class="col-lg-5 mb-4 contact-left">
      <h3>o registrese usando:</h3>
      <div id="socialLogin1">
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
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<?php
include("footer.php");
?>