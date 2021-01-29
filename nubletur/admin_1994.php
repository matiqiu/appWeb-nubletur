<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
include("header.php");

include("model/model_evento.php");
include("model/model_user.php");
include("model/model_comentario.php");
include("model/model_reporte.php");

if (in_array("1994", $array_privilegios)) {
?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h1><span class="badge badge-light">Admin</span></h1>
                <div class="card">
                    <div class="body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <h6>Reportes</h6>
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <h6>Eventos</h6>
                                </a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <h6>Comentarios</h6>
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"># Evento</th>
                                            <th scope="col"># Comentario</th>
                                            <th scope="col">Motivo</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Fecha reporte</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = selectReportes();
                                        $cuantas_rows = $stmt->rowCount();

                                        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $id_reporte = $fila['id_reporte'];
                                            $id_evento_reporte = $fila['id_evento'];
                                            $id_comentario_reporte = $fila['id_comentario'];
                                            $motivo_reporte = $fila['motivo'];
                                            $descripcion_reporte = $fila['descripcion_reporte'];
                                            $fecha_reporte = $fila['fecha'];
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $id_reporte; ?></th>
                                                <td><?php echo $id_evento_reporte; ?></td>
                                                <td><?php echo $id_comentario_reporte; ?></td>
                                                <td><?php echo $motivo_reporte; ?></td>
                                                <td><?php echo $descripcion_reporte; ?></td>
                                                <td><?php echo $fecha_reporte; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"># Evento</th>
                                            <th scope="col">Nombre evento</th>
                                            <th scope="col">Nombre usuario</th>
                                            <th scope="col">Ver evento</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $stmt2 = selectEventosTodos();
                                        $cuantas_rows2 = $stmt2->rowCount();

                                        while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                            $id_evento = $fila2['id_evento'];
                                            $nombre_evento = $fila2['nombre_evento'];
                                            $id_usuario_evento = $fila2['id_usuario'];

                                            $stmt3 = selectUser($id_usuario_evento);
                                            $fila3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                            $nombre_usuario_evento = $fila3['nombre'];
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $id_evento; ?></th>
                                                <td><?php echo $nombre_evento; ?></td>
                                                <td><?php echo $nombre_usuario_evento; ?></td>
                                                <td><button onclick=" location.href='evento.php?id=<?php echo $id_evento; ?>'" type="button" class="btn btn-default"><i class="fa fa-arrow-right"></i></button></td>
                                                <td><button onclick="DeleteEvento(<?php echo $id_evento; ?>)" type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"># Comentario</th>
                                            <th scope="col">Nombre usuario</th>
                                            <th scope="col">Comentario</th>
                                            <th scope="col"># Evento</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        error_reporting(0);
                                        $stmt4 = selectComentariosTodos();
                                        $cuantas_rows4 = $stmt4->rowCount();

                                        while ($fila4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
                                            $id_comentario = $fila4["id_comentario"];
                                            $contenido_comentario = $fila4["contenido"];
                                            $id_usuario_comentario = $fila4["id_usuario"];
                                            $id_evento_comentario = $fila4['id_evento'];

                                            $stmt5 = selectUser($id_usuario_comentario);
                                            $fila5 = $stmt5->fetch(PDO::FETCH_ASSOC);
                                            $nombre_usuario_comentario = $fila5['nombre'];

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $id_comentario; ?></th>
                                                <td><?php echo $nombre_usuario_comentario; ?></td>
                                                <td><?php echo $contenido_comentario; ?></td>
                                                <td><?php echo $id_evento_comentario; ?></td>
                                                <td><button onclick="DeleteComentario(<?php echo $id_comentario; ?>)" type="button" class="btn btn-default"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
    <br>
    <br>
<?php
} else {
?>
<?php
    echo '<script>
        window.location.replace("404.php");
        //-->
    </script>';
?>
<?php
}

include("footer.php");
?>

<script>
    function DeleteComentario(cual) {

        alertify.confirm("¿Eliminar este comentario?",
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
    function DeleteEvento(cual) {

        var id_evento_send = $("#id_evento").val();

        alertify.confirm("¿Eliminar evento?",
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