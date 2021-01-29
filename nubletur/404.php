<?php
include("header.php");
?>
<!-- full Title -->
<div class="full-title">
	<div class="container">
		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">404
			<small>Page Not Found</small>
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
			<li class="breadcrumb-item active">404</li>
		</ol>
	</div>

	<div class="error-contents">
		<h3>¡Ups! No se puede encontrar la página.</h3>
		<div class="error-img">
			<img class="img-fluid" src="images/404.png" alt="" />
		</div>
		<p>No podemos encontrar la página que busca. Puede consultar nuestra página de <a href="#">Inicio.</a>.</p>
		<a class="btn btn-primary" href="index.php"> Volver a la pagina principal </a>
	</div>
	<!-- /.jumbotron -->

</div>
<!-- /.container -->
<?php
include("footer.php");
?>