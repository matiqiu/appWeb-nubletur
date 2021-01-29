<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
include("header.php");

require_once 'vendor/autoload.php';

use Carbon\Carbon;


Carbon::setLocale('es');
setLocale(LC_TIME, 'es_CL');

include("model/model_evento.php");

$stmt = selectEventos("");
$cuantas_rows = $stmt->rowCount();
//$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

$eventos_x_pagina = 3;
$paginas = $cuantas_rows / 3;
$paginas = ceil($paginas);
echo $paginas;

?>
<!-- full Title -->
<div class="full-title">
	<div class="container">
		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3">Todos los proximos eventos
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
			<li class="breadcrumb-item active">Eventos</li>
		</ol>
	</div>
	<?php
	if ($cuantas_rows > 0) {
	?>
		<div class="blog-entries">
			<?php
			if($_GET['pagina']>$paginas){
				echo '<script> 
				<!--
				window.location.replace("404.php"); 
				//-->
				</script>';
			}

			$iniciar = ($_GET['pagina']-1)*$eventos_x_pagina;
			//echo $iniciar;

			$stmt2 = selectEventosLista($iniciar, $eventos_x_pagina);
			while ($fila = $stmt2->fetch(PDO::FETCH_ASSOC)) {
			?>
				<!-- Blog Post -->
				<div class="card mb-4">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
								<a href="#">
									<?php

									if (file_exists('fotos-eventos/' . $fila["id_evento"])) {
									?>
										<img class="img-fluid rounded" width="400px" height="200px" src="<?php echo 'fotos-eventos/' . $fila["id_evento"]; ?>">
									<?php
									}
									?>
								</a>
							</div>
							<div class="col-lg-6">
								<h2 class="card-title"><?php echo $fila["nombre_evento"];  ?></h2>
								<p class="card-text text-justify"><?php echo $fila["contenido"];  ?></p>
								<?php echo '<a href="evento.php?id=' . $fila["id_evento"] . '" class="btn btn-primary">Ver más &rarr;</a> '; ?>
							</div>
						</div>
					</div>
					<?php
					$fila["dia_inicio"] = new Carbon($fila["dia_inicio"]);
					$nombre_dia1 = $fila["dia_inicio"]->formatLocalized('%A %d de %B %Y');
					?>
					<div class="card-footer text-muted">
						Fecha evento: <span style="font-weight: bold;"><?php echo $nombre_dia1;  ?></span>
					</div>
				</div>
			<?php
			}
			?>
			<div class="pagination_bar">
				<!-- Pagination -->
				<ul class="pagination justify-content-center">
					<li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
						<a class="page-link" href="eventos.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					<?php
					for ($i = 0; $i < $paginas; $i++) :
					?>
						<li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
							<a class="page-link" href="eventos.php?pagina=<?php echo $i + 1; ?>">
								<?php echo $i + 1; ?>
							</a>
						</li>
					<?php
					endfor
					?>
					<li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
						<a class="page-link" href="eventos.php?pagina=<?php echo $_GET['pagina'] + 1 ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	<?php
	} else {
	?>
		<br>
		<h2>¡Aún no hay eventos!</h2>
		<br>
		<br>
	<?php
	}
	?>
</div>

<?php

include("footer.php");

?>
<script>
	function Ver(id) {
		window.location.replace("evento.php/" + id);
	}
</script>