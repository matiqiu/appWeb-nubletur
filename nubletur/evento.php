<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

include("_drivers/funciones.php");
$nivel = 2;
include("header.php");
include("model/model_evento.php");
include("model/model_asistencia.php");

//fechas
require_once 'vendor/autoload.php';

use Carbon\Carbon;


Carbon::setLocale('es');
setLocale(LC_TIME, 'es_CL');

//

//$variable = $_SERVER['PHP_SELF'];
//$variable = basename($variable);

//$id = $variable;
$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

$stmt = selectEventos($id);
$cuantas_rows = $stmt->rowCount();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
$id_evento = $fila["id_evento"];
$id_usuario = $fila["id_usuario"];
$nombre_evento = $fila["nombre_evento"];
$dia_inicio = $fila["dia_inicio"];
$dia_termino = $fila["dia_termino"];
$hora_inicio = $fila["hora_inicio"];
$hora_termino = $fila["hora_termino"];
$localidad = $fila["localidad"];
$direccion = $fila["direccion"];
$contenido = $fila["contenido"];
$contenido2 = $fila["contenido2"];
$latitud = $fila["latitud"];
$longitud = $fila["longitud"];


include("model/model_user.php");

$stmt2 = selectUser($id_usuario);
$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$nombre_usuario_evento = $fila2["nombre"];
$nombre_pyme_asistencia = $fila2["nombre_pyme"];

?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeZlPcq4WMn39889TnQ3oT81N6ByBmGD8"></script>
<script type="text/javascript">
    function initialize() {
        // Creating map object
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 15,
            center: new google.maps.LatLng("<?php echo $latitud; ?>", "<?php echo $longitud; ?>"),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // creates a draggable marker to the given coords
        var vMarker = new google.maps.Marker({
            position: new google.maps.LatLng("<?php echo $latitud; ?>", "<?php echo $longitud; ?>"),
            draggable: false
        });

        // adds a listener to the marker
        // gets the coords when drag event ends
        // then updates the input with the new coords
        google.maps.event.addListener(vMarker, 'dragend', function(evt) {
            $("#latitud").val(evt.latLng.lat().toFixed(6));
            $("#longitud").val(evt.latLng.lng().toFixed(6));

            map.panTo(evt.latLng);
        });

        // centers the map on markers coords
        map.setCenter(vMarker.position);

        // adds the marker on the map
        vMarker.setMap(map);


        $("#localidad, #region, #direccion").change(function() {
            movePin();
        });

        function movePin() {
            var geocoder = new google.maps.Geocoder();
            var textSelectM = $("#localidad").val();
            var textSelectE = $("#region").val();
            var inputAdress = $("#direccion").val() + ' ' + textSelectM + ' ' + textSelectE;
            geocoder.geocode({
                "address": inputAdress
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    vMarker.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    map.panTo(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    $("#latitud").val(results[0].geometry.location.lat());
                    $("#longitud").val(results[0].geometry.location.lng());
                }
            });
        }
    }
</script>

<!-- full Title -->
<div class="full-title">
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"><?php echo $nombre_evento; ?>
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
            <li class="breadcrumb-item active">
                <a href="eventos.php">Eventos</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $nombre_evento; ?></li>
        </ol>
    </div>

    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Preview Image -->
            <?php

            if (file_exists('fotos-eventos/' . $fila["id_evento"])) {
            ?>
                <img class="img-fluid rounded" width="100%" height="100%" src="<?php echo '../fotos-eventos/' . $fila["id_evento"]; ?>">
            <?php
            }
            ?>
            <hr>
            <!-- Date/Time -->
            <div class="text-right">
                <div class="dropdown">
                    <button class="btn btn-success" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        if ($id_usuario == $estado_usuario) {
                        ?>
                            <a class="dropdown-item" href="editar-evento.php?id=<?php echo $fila['id_evento']; ?>">Modificar evento</a>
                            <a class="dropdown-item" href="javascript:;" onclick="DeleteEvento(<?php echo $fila['id_evento']; ?>)">Eliminar evento</a>
                        <?php
                        } else {
                        ?>
                            <a type="button" data-toggle="modal" data-target="#<?php echo $id_evento; ?>" data-whatever="@getbootstrap" class="dropdown-item" href="#">Reportar evento</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="<?php echo $id_evento; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reportar evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Motivo:</label>
                                    <input type="text" id="motivo" name="motivo" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Descripción:</label>
                                    <textarea class="form-control" id="descripcion_reporte" name="descripcion_reporte"></textarea>
                                </div>
                                <input type="hidden" id="id_evento2" name="id_evento2" class="form-control" value="<?php echo $id_evento; ?>" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="ReporteEvento()" class="btn btn-primary">Enviar reporte</button>
                        </div>
                    </div>
                </div>
            </div>
            <blockquote class="blockquote">
                <?php
                $fecha_faltante_evento = new Carbon($dia_inicio);

                $dia_inicio = new Carbon($dia_inicio);
                $nombre_dia1 = $dia_inicio->formatLocalized('%A %d de %B %Y');

                $dia_termino = new Carbon($dia_termino);
                $nombre_dia2 = $dia_termino->formatLocalized('%A %d de %B %Y');

                $hora_inicio = new Carbon($hora_inicio);
                $hora_inicio2 = $hora_inicio->isoFormat('HH:mm');

                $hora_termino = new Carbon($hora_termino);
                $hora_termino2 = $hora_termino->isoFormat('HH:mm');
                ?>
                <h3><span class="badge badge-dark">Falta <?php echo $fecha_faltante_evento->diffForHumans(); ?></span></h3>
                <p> Fecha inicio: <span class="badge badge-light"> <?php echo $nombre_dia1; ?></span></p>
                <p> Fecha termino: <span class="badge badge-light"> <?php echo $nombre_dia2; ?></span></p>

                <p class="text-justify"><span class="badge badge-secondary">De las <?php echo $hora_inicio2; ?> horas hasta las <?php echo $hora_termino2; ?> horas</span></p>
                <!-- <p class="mb-0"> -->
            </blockquote>

            <hr>
            <!-- Post Content -->
            <div class="texto-contenido">
                <p class="lead text-justify"><?php echo $contenido; ?></p>
            </div>

            <div class="texto-contenido">
                <p class="text-justify"><?php echo $contenido2; ?></p>
            </div>

            <blockquote class="blockquote">
                <footer class="blockquote-footer">Localidad:
                    <cite title="Source Title"><?php echo $localidad; ?></cite>
                </footer>
                <footer class="blockquote-footer">Donde:
                    <cite title="Source Title"><?php echo $direccion; ?></cite>
                </footer>
            </blockquote>
            <div class="text-right">
                <h5><span class="badge badge-light">Publicado por <i class="fa fa-user"></i><?php echo $nombre_usuario_evento; ?></span></h5>
            </div>

            <body onload="initialize();">
                <input type="hidden" class="form-control" id="latitud" name="latitud" value="<?php echo $latitud; ?>">
                <input type="hidden" class="form-control" id="longitud" name="longitud" value="<?php echo $longitud; ?>">
                <h5><i class="fa fa-map-marker-alt"></i> Ubicación</h5>
                <br>
                <div id="map_canvas" style="width: auto; height: 500px;">
                </div>
                <br>
            </body>

            <?php
            if (in_array("3", $array_privilegios)) {
            ?>
                <hr>
                <br>
                <?php
                $stmt5 = selectAsistenciaUsuarioEvento($_COOKIE['id_usuario'], $id_evento);
                $fila5 = $stmt5->fetch(PDO::FETCH_ASSOC);
                if (isset($fila5["id_usuario"])) {
                ?>
                    <form method="POST">
                        <div class="form-group">
                            <input type="hidden" id="id_asistencia" name="id_asistencia" class="form-control" value="<?php echo $fila5['id_asistencia']; ?>" />
                            <a class="btn btn-lg btn-secondary btn-block" style="color: white;" onclick="DeleteAsistencia(<?php $fila5['id_asistencia']; ?>)">Eliminar asistencia </a>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <form method="POST">
                        <div class="form-group">
                            <h3 class="text-center">¿Tu Pyme estará en este evento?</h3>
                            <input type="hidden" id="id_evento2" name="id_evento2" class="form-control" value="<?php echo $id_evento; ?>" />
                            <input type="hidden" id="id_usuario2" name="id_usuario2" class="form-control" value="<?php echo $_COOKIE['id_usuario']; ?>" />

                            <a class="btn btn-lg btn-secondary btn-block" style="color: white;" onclick="SaveAsistencia()">Haz clic aquí para crear asistencia</a>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
            <br>
            <?php
            $stmt3 = selectAsistencia($id_evento);
            $cuantas_rows3 = $stmt3->rowCount();
            //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

            if ($cuantas_rows3 > 0) {
            ?>
                <div class="container">
                    <div class="services-bar">
                        <h1 class="my-4">Algunas Pymes que asistirán </h1>
                        <!-- Services Section -->
                        <div class="row">
                            <?php
                            while ($fila3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                $id_pyme_asistencia = $fila3['id_usuario'];

                                $stmt4 = selectPyme($id_pyme_asistencia);
                                while ($fila4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
                                    $id_pyme = $fila4['id_usuario'];
                                    $nombre_pyme = $fila4['nombre_pyme'];
                                    $descripcion_pyme = $fila4['descripcion_pyme'];
                            ?>
                                    <div class="col-lg-4 mb-4">
                                        <div class="card h-100">
                                            <h4 style="color: white;" class="card-header"><?php echo $nombre_pyme; ?></h4>
                                            <input type="hidden" id="nombre_pyme" name="nombre_pyme" class="form-control" value="<?php echo $nombre_pyme; ?>" />
                                            <div class="card-img">
                                                <?php

                                                if (file_exists('fotos-pymes/' . $id_pyme)) {
                                                ?>
                                                    <img class="card-img-top" height="150px" src="<?php echo 'fotos-pymes/' . $id_pyme; ?>">
                                                <?php
                                                } else {
                                                ?>
                                                    <img class="card-img-top" height="150px" src="images/ñuble/imagen-pyme.jpg" alt="" />
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo $descripcion_pyme; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <?php
                                                if ($estado_usuario == $id_pyme) {
                                                ?>
                                                    <?php echo '<a href="mi-pyme.php?id=' . $id_pyme . '" class="btn btn-primary">Ver más &rarr;</a>'; ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <?php echo '<a href="pyme.php?id=' . $id_pyme . '" class="btn btn-primary">Ver más &rarr;</a>'; ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- About Section -->
                </div>
            <?php
            }
            ?>
            <hr>
            <div class="container">
                <h3>Compartir evento</h3>
                <ul class="social_footer_ul2">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <br>

            <div class="blog-right-side">
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Agregar comentario</h5>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <input type="hidden" id="id_evento" name="id_evento" class="form-control" value="<?php echo $id_evento; ?>" />
                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $_COOKIE['id_usuario']; ?>" />
                                <textarea id="contenido" name="contenido" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="button" <?php if (isset($_COOKIE['id_usuario'])) { ?> onclick="SaveComentario()" <?php } elseif (!isset($_COOKIE['id_usuario'])) { ?> onclick="noSesion()" <?php } ?> class="btn btn-primary">Comentar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Single Comment -->
            <?php

            include("model/model_comentario.php");
            $stmt4 = selectComentario($id);
            while ($fila4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {

                $contenido_comentario = $fila4["contenido"];
                $id_usuario_comentario = $fila4["id_usuario"];
                $fecha_comentario = $fila4["fecha"];
                $id_comentario = $fila4["id_comentario"];

                $fecha_comentario2 = new Carbon($fecha_comentario);


                $stmt3 = selectUser($id_usuario_comentario);
                while ($fila3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                    $nombre_usuario_comentario = $fila3["nombre"];


            ?>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="media mb-4">

                                <img class="d-flex mr-3 rounded-circle" src="images/ñuble/avatar2.png" width="50" height="50" alt="">

                                <div class="media-body" width="380px">

                                    <p><big><b><?php echo $nombre_usuario_comentario;    ?></b> </big> <?php echo $fecha_comentario2->diffForHumans(); ?></p>

                                    <div class="texto-contenido">
                                        <?php echo $contenido_comentario; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="text-right">
                                <div class="dropdown">
                                    <a href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h6><span class="fas fa-bars"></span></h6>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php
                                        if ($id_usuario_comentario == $estado_usuario) {
                                        ?>
                                            <a class="dropdown-item" onclick="DeleteComentario(<?php echo $id_comentario; ?>)" href="javascript:;">Eliminar comentario</a>

                                        <?php
                                        } else {
                                        ?>
                                            <a data-toggle="modal" data-target="#<?php echo $id_comentario; ?>" class="dropdown-item" href="#">Reportar</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="modal fade" id="<?php echo $id_comentario; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel2">Reportar comentario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Motivo:</label>
                                            <input type="text" id="motivo2" name="motivo2" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Descripción:</label>
                                            <textarea class="form-control" id="descripcion_reporte2" name="descripcion_reporte2"></textarea>
                                        </div>
                                        <input type="hidden" id="id_comentario" name="id_comentario" class="form-control" value="<?php echo $id_comentario; ?>" />
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" onclick="ReporteComentario()" class="btn btn-primary">Enviar reporte</button>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

            <br>
            <!-- Comment with nested comments -->
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4 blog-right-side">

            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">Buscar</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<?php
include("footer.php");
?>

<script>
    function SaveComentario() {
        var id_usuario_send = $("#id_usuario").val();
        var id_evento_send = $("#id_evento").val();
        var contenido_send = $("#contenido").val();

        if (contenido_send == "") {
            alert("Debes escribir algo");
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/comentarios/ajax_nuevoComentario.php",
                data: {
                    id_usuario: id_usuario_send,
                    id_evento: id_evento_send,
                    contenido: contenido_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        location.reload();
                        alertify.success('Comentario creado');
                    } else {
                        if (response == "security") {
                            alert("Error Grave de Seguridad");
                        } else {
                            alert("Error General");
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
<script>
    function noSesion() {
        alertify
            .alert("Debes iniciar sesión para comentar", function() {});
    }
</script>

<script>
    function SaveAsistencia() {
        var id_usuario_send = $("#id_usuario2").val();
        var id_evento_send = $("#id_evento2").val();
        var nombre_pyme_asistencia_send = $("#nombre_pyme_asistencia").val();
        var nombre_pyme_send = $("#nombre_pyme").val();



        alertify.confirm("¡Se usarán tus datos de Pyme para agregarlos a este evento!",
            function() {

                $.ajax({
                    type: "POST",
                    url: "ajax/asistencias/ajax_nuevaAsistencia.php",
                    data: {
                        id_usuario2: id_usuario_send,
                        id_evento2: id_evento_send
                    },
                    dataType: 'html',
                    success: function(response) {
                        console.log(response);
                        if (response == "ok") {

                            alertify.success("Asistencia creada con éxito");
                            location.reload();
                        } else {
                            if (response == "security") {
                                alert("Error Grave de Seguridad");
                            } else {
                                alert("Error General");
                            }
                        }
                    },
                    error: function(response) {
                        alert("Error técnico: " + textStatus);
                    }
                });
            },
            function() {

            });
    }
</script>
<script>
    function DeleteAsistencia(cual) {

        var id_asistencia_send = $("#id_asistencia").val();

        alertify.confirm("¿Deseas eliminar tu asistencia en este evento?",
            function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/asistencias/ajax_deleteAsistencia.php",
                    data: {
                        id_delete: cual,
                        id_asistencia: id_asistencia_send
                    },
                    dataType: 'html',
                    success: function(response) {
                        if (response == "ok") {
                            alertify.success("Asistencia eliminada con éxito");
                            location.reload();
                        } else if (response == "security") {
                            alert("Error Grave de Seguridad");
                        } else {
                            alert("Error General");
                        }
                    },
                    error: function(response) {
                        alert("Error técnico: " + textStatus);
                    }
                });
            },
            function() {
                alertify.message('Cancelado');
            });
        //Detectamos si el usuario denegó el mensaje
    }
</script>
<script>
    function DeleteEvento(cual) {

        var id_evento_send = $("#id_evento").val();

        alertify.confirm("¿Quieres eliminar este evento? Se perderán todos los datos.",
            function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/eventos/ajax_deleteEvento.php",
                    data: {
                        id_delete: cual
                    },
                    dataType: 'html',
                    success: function(response) {
                        if (response == "ok") {
                            alertify.success("Evento eliminado con éxito");
                            location.href = "index.php";
                        } else if (response == "security") {
                            alert("Error Grave de Seguridad");
                        } else {
                            alert("Error General");
                        }
                    },
                    error: function(response) {
                        alert("Error técnico: " + textStatus);
                    }
                });
            },
            function() {
                alertify.message('Cancelado');
            });



        //Detectamos si el usuario denegó el mensaje
    }
</script>
<script>
    function DeleteComentario(cual) {

        alertify.confirm("¿Seguro que quieres eliminar tu comentario?",
            function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/comentarios/ajax_deleteComentario.php",
                    data: {
                        id_delete: cual
                    },
                    dataType: 'html',
                    success: function(response) {
                        if (response == "ok") {
                            alertify.success('Comentario eliminado.');
                            location.reload();
                        } else if (response == "security") {
                            alert("Error Grave de Seguridad");
                        } else {
                            alert("Error General");
                        }
                    },
                    error: function(response) {
                        alert("Error técnico: " + textStatus);
                    }
                });
            },
            function() {
                alertify.message('Cancelado');
            });


        //Detectamos si el usuario denegó el mensaje
    }
</script>
<script>
    function ReporteEvento() {
        var motivo_send = $("#motivo").val();
        var descripcion_reporte_send = $("#descripcion_reporte").val();
        var id_evento_send = $("#id_evento2").val();

        if (motivo_send == "") {
            alertify
                .alert("Tiene que indicar el motivo de su reporte.", function() {});
            //if (password_send == "") {
            //alert("La password debe ser completada");
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/reportes/ajax_nuevoReporteEvento.php",
                data: {
                    motivo: motivo_send,
                    descripcion_reporte: descripcion_reporte_send,
                    id_evento: id_evento_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify
                            .alert("Reporte enviado.", function() {
                                location.reload();
                            });
                    } else {

                        if (response == "security") {
                            alertify
                                .alert("Error Grave de Seguridad.", function() {});
                        } else {
                            alertify
                                .alert("Error General.", function() {});
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
<script>
    function ReporteComentario() {
        var motivo_send2 = $("#motivo2").val();
        var descripcion_reporte_send2 = $("#descripcion_reporte2").val();
        var id_comentario_send2 = $("#id_comentario").val();

        if (motivo_send2 == "") {
            alertify
                .alert("Tiene que indicar el motivo de su reporte.", function() {});
            //if (password_send == "") {
            //alert("La password debe ser completada");
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/reportes/ajax_nuevoReporteComentario.php",
                data: {
                    motivo: motivo_send2,
                    descripcion_reporte: descripcion_reporte_send2,
                    id_comentario: id_comentario_send2
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify
                            .alert("Reporte enviado.", function() {
                                location.reload();
                            });
                    } else {

                        if (response == "security") {
                            alertify
                                .alert("Error Grave de Seguridad.", function() {});
                        } else {
                            alertify
                                .alert("Error General.", function() {});
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