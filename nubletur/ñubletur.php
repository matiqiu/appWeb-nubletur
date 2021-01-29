<?php
include("header.php");
?>
<!-- full Title -->
<div class="full-title">
	<div class="container">
		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">Ñubletur
			<small>Subheading</small>
		</h1>
	</div>
</div>

<!-- Page Content -->
<div class="container">
	<div class="breadcrumb-main">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active">ñubletur</li>
		</ol>
	</div>

	<div class="faq-main">
		<div class="" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="card accordion-single">
				<div class="card-header" role="tab" id="headingOne">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">¿Qué es Ñubletur?</a>
					</h5>
				</div>

				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
					<div class="card-body">
						Ñubletur es una red que presta servicios a la Región de Ñuble, destinada a eventos y Pymes, donde toda persona puede publicar eventos de cualquier zona de la región, además cualquier persona con una pequeña empresa puede registrar su Pyme con todos los productos que esta ofrece y poder publicitarla creando asistencia en los eventos que participará y que estén registrados en esta página, plataforma que esta como sitio web y aplicación móvil, y que está completamente gratuita al servicio de todos los ciudadanos.
					</div>
				</div>
			</div>
			<div class="card accordion-single">
				<div class="card-header" role="tab" id="headingTwo">
					<h5 class="mb-0">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">¿Cómo nació?</a>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="card-body">
						Este proyecto nació como una idea de mejorar la economía de la Región de Ñuble, dado a que es una Región sin mucho tiempo de historia y por ser prácticamente la Región más reciente es que aún no cuenta con una economía sólida. Es por eso que se quiso aprovechar el turismo que existe en la zona para poder masificarlo dando a conocer los eventos y las Pymes que existen en la Región de Ñuble.
					</div>
				</div>
			</div>
			<div class="card accordion-single">
				<div class="card-header" role="tab" id="headingThree">
					<h5 class="mb-0">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">¿Quiénes somos?</a>
					</h5>
				</div>
				<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
					<div class="card-body">
						Somos un grupo pequeño de 3 personas, analistas y desarrolladores, que creó este proyecto como tesis para la carrera de Ingenieria en Computación e Informatica del Instituto Virginio Gómez-Chillán.
					</div>
				</div>
			</div>
			<div class="card accordion-single">
				<div class="card-header" role="tab" id="headingFor">
					<h5 class="mb-0">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFor" aria-expanded="false" aria-controls="collapseFor">Aplicación móvil Ñubletur</a>
					</h5>
				</div>
				<div id="collapseFor" class="collapse" role="tabpanel" aria-labelledby="headingFor">
					<div class="card-body">
						Scanea este codigo QR desde tu celular para descargar la aplicación móvil Ñubletur.
						<br>
						<div class="text-center">
							<img width="200px" hight="200px" src="images/ñuble/codigo-qr.jpg">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container -->
<?php
include("footer.php");
?>