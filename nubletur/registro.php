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
    <div class="col-lg-8 mb-4 contact-left">
      <h3>Send us a Message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="control-group form-group">
          <div class="controls">
            <label>Full Name:</label>
            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Phone Number:</label>
            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Email Address:</label>
            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
          </div>
        </div>
        <div class="control-group form-group">
          <div class="controls">
            <label>Message:</label>
            <textarea rows="5" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
          </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
      </form>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<?php
include("footer.php");
?>