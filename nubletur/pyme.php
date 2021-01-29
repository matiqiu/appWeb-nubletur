<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
$nivel = 2;
include("header.php");
include("model/model_user.php");

$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

$stmt = selectPyme($id);
$cuantas_rows = $stmt->rowCount();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
$id_pyme = $fila["id_usuario"];
$nombre_pyme = $fila["nombre_pyme"];
$descripcion_pyme = $fila["descripcion_pyme"];
$telefono = $fila["telefono"];
$comuna = $fila["comuna"];
$localidad = $fila["localidad"];
$rubro = $fila["rubro"];
?>

<section class="content">
    <div class="container">
        <div class="row clearfix">

            <div class="team-members-box">
                <div class="row">
                    <div class="col-lg-5 mb-5">
                        <div class="card h-100">
                            <div class="card profile-card">
                                <?php

                                if (file_exists('fotos-pymes/' . $id_pyme)) {
                                ?>
                                    <img class="img-fluid rounded" width="550px%" height="100%" src="<?php echo 'fotos-pymes/' . $id_pyme; ?>">
                                <?php
                                } else {
                                ?>
                                    <img class="img-fluid rounded" width="100%" src="../images/ñuble/imagen-pyme.jpg" alt="" />
                                <?php
                                }
                                ?>
                                <div class="card-body text-center">
                                    <h4 class="card-title"><?php echo $nombre_pyme; ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $rubro; ?></h6>
                                    <p class="card-text"><?php echo $descripcion_pyme; ?></p>
                                </div>
                                <div class="profile-footer">
                                    <ul>
                                        <li>
                                            <span>Telefono</span>
                                            <span><?php echo $telefono; ?></span>
                                        </li>
                                        <li>
                                            <span>Localidad</span>
                                            <span><?php echo $localidad; ?></span>
                                        </li>
                                        <li>
                                            <span>Comuna</span>
                                            <span><?php echo $comuna; ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mb-7">
                        <div class="card">
                            <div class="body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Productos</a>
                                        <a class="nav-item nav-link" id="nav-agregar-producto-tab" data-toggle="tab" href="#nav-agregar-producto" role="tab" aria-controls="nav-agregar-producto" aria-selected="false">Galeria de fotos</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <br>
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="container-fluid">
                                            <?php
                                            include("model/model_producto.php");

                                            $stmt2 = selectProducto($id);
                                            $cuantas_rows = $stmt2->rowCount();
                                            //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

                                            if ($cuantas_rows > 0) {
                                            ?>
                                                <table class="tabla-productos">
                                                    <tr class="tr-productos">
                                                        <th class="th-productos">Nombre</th>
                                                        <th class="th-productos">Descripción</th>
                                                        <th class="th-productos">Precio CLP</th>
                                                    </tr>

                                                    <?php
                                                    while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                                        echo '<tr class="tr-productos">';
                                                        echo '<td class="td-productos">' . $fila2['nombre'] . '</td>';
                                                        echo '<td class="td-productos">' . $fila2['descripcion'] . '</td>';
                                                        echo '<td class="td-productos">$' . $fila2['precio'] . '</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                </table>
                                            <?php
                                            } else {
                                            ?>
                                                <br>
                                                <h4>¡Aún no tiene productos agregados!</h4>
                                            <?php
                                            }
                                            ?>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-agregar-producto" role="tabpanel" aria-labelledby="nav-agregar-producto-tab">
                                        <div class="container-fluid">
                                            <div class="portfolio-main">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 portfolio-item">
                                                        <div class="card h-100">
                                                            <div class="card-img">
                                                                <a href="#img-pyme">
                                                                    <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                                                                    <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                                                                </a>
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="#">Nombre pyme</a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>