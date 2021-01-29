<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
include("header.php");
include("model/model_user.php");

$id = $_COOKIE['id_usuario'];

$stmt = selectUser($id);
$cuantas_rows = $stmt->rowCount();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
$id_usuario = $fila["id_usuario"];
$nombre_pyme = $fila["nombre_pyme"];
$descripcion_pyme = $fila["descripcion_pyme"];
$telefono = $fila["telefono"];
$comuna = $fila["comuna"];
$localidad = $fila["localidad"];
$rubro = $fila["rubro"];
$password = $fila["password"];
?>

<section class="content">
    <div class="container">
        <div class="row clearfix">

            <div class="team-members-box">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card profile-card">
                                <?php

                                if (file_exists('fotos-pymes/' . $id_usuario)) {
                                ?>
                                    <img class="img-fluid rounded" width="550px%" height="100%" src="<?php echo 'fotos-pymes/' . $id_usuario; ?>">
                                <?php
                                } else {
                                ?>
                                    <img class="img-fluid rounded" width="100%" src="images/ñuble/imagen-pyme.jpg" alt="" />
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
                                        <li><a href="#"><i style="margin-bottom: 2px" class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li style="margin-bottom: 10px"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 mb-8">
                        <div class="card">
                            <div class="body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mis productos</a>
                                        <a class="nav-item nav-link" id="nav-agregar-producto-tab" data-toggle="tab" href="#nav-agregar-producto" role="tab" aria-controls="nav-agregar-producto" aria-selected="false">Agregar producto</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Editar perfil</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Cambiar contraseña</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <br>
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="container-fluid">
                                            <?php
                                            include("model/model_producto.php");
                                            $id2 = $_COOKIE['id_usuario'];

                                            $stmt2 = selectProducto($id2);
                                            $cuantas_rows = $stmt2->rowCount();
                                            //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

                                            if ($cuantas_rows > 0) {
                                            ?>
                                                <table class="tabla-productos">
                                                    <tr class="tr-productos">
                                                        <th class="th-productos">Nombre</th>
                                                        <th class="th-productos">Descripción</th>
                                                        <th class="th-productos">Precio CLP</th>
                                                        <th class="th-productos">Eliminar</th>
                                                    </tr>

                                                    <?php
                                                    while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

                                                        echo '<tr class="tr-productos">';
                                                        echo '<td class="td-productos">' . $fila2['nombre'] . '</td>';
                                                        echo '<td class="td-productos">' . $fila2['descripcion'] . '</td>';
                                                        echo '<td class="td-productos">$' . $fila2['precio'] . '</td>';

                                                        echo '<td class="td-productos"> <button type="button" class="btn btn-default" onclick="Delete(' . $fila2["id_producto"] . ')"><i class="fa fa-trash"></i></button></td>';
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
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-10 mb-4 contact-left">
                                                    <br>
                                                    <br>
                                                    <form name="sentMessage" id="contactForm" novalidate>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Nombre del producto</label>
                                                                <input type="text" class="form-control" name="nombre" id="nombre" required data-validation-required-message="Ingresa tu correo electronico.">
                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Descripción</label>
                                                                <textarea type="text" rows="3" class="form-control" name="descripcion" id="descripcion" required data-validation-required-message="Ingresa tu correo electronico."></textarea>
                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Precio CLP</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">$</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="precio" id="precio" required data-validation-required-message="Ingresa tu correo electronico.">
                                                                </div>
                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="id_usuario2" name="id_usuario2" class="form-control" value="<?php echo $id_usuario; ?>" />
                                                        <div id="success"></div>
                                                        <!-- For success/fail messages -->
                                                        <button onclick="SaveProducto()" type="button" class="btn btn-primary">Guardar producto</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="container">
                                            <div class="row">
                                                <form id="frmSubirImagen" action="enviar-imagen-pyme.php" role="form" novalidate enctype="multipart/form-data" method="POST">
                                                    <div class="col-lg-6 mb-4 contact-left">
                                                        <br>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Nombre pyme:</label>
                                                                <input type="text" class="form-control" id="nombre_pyme" name="nombre_pyme" value="<?php echo $nombre_pyme; ?>" name required data-validation-required-message="Porfavor ingrese el nombre de la pyme.">
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Descripción de la pyme:</label>
                                                                <textarea type="text" rows="3" class="form-control" id="descripcion_pyme" name="descripcion_pyme" name required data-validation-required-message="Porfavor ingrese el nombre de la pyme."><?php echo $descripcion_pyme; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Telefono de contacto:</label>
                                                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required data-validation-required-message="Porfavor ingrese su numero telefono.">
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Comuna:</label>
                                                                <input type="text" class="form-control" id="comuna" name="comuna" value="<?php echo $comuna; ?>" required data-validation-required-message="Porfavor ingrese su nombre.">
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Localidad:</label>
                                                                <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $localidad; ?>" required data-validation-required-message="Porfavor ingrese su nombre.">
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <label>Rubro:</label>
                                                                <input type="text" class="form-control" id="rubro" name=" rubro" value="<?php echo $rubro; ?>" required data-validation-required-message="Porfavor ingrese su nombre.">
                                                            </div>
                                                        </div>
                                                        <label class=newbtn>
                                                            <div class="form-group">
                                                                Toca para cambiar tu foto de Pyme
                                                                <img id="blah" src="images/ñuble/logo-foto.png">
                                                                <input id="imagen_pyme" name="imagen_pyme" class='pis' onchange="readURL(this);" type="file">
                                                            </div>
                                                        </label>
                                                        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>">
                                                        <div id="success"></div>
                                                        <!-- For success/fail messages -->
                                                        <button type="submit" onclick="SaveUsuario()" style="margin-right: 100px" class="btn btn-primary" id="sendMessageButton">Guardar cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <br>
                                        <br>
                                        <div class="container">
                                            <form name="sentMessage2" method="POST" id="contactForm2" novalidate>
                                                <div class="control-group form-group">
                                                    <div class="controls">
                                                        <label>Contraseña actual</label>
                                                        <input type="password" class="form-control" name="password_old" id="password_old" required data-validation-required-message="Ingresa tu correo electronico.">
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <div class="controls">
                                                        <label>Nueva contraseña</label>
                                                        <input type="password" rows="3" class="form-control" name="password_new" id="password_new" required data-validation-required-message="Ingresa tu correo electronico.">
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                                <div class="control-group form-group">
                                                    <div class="controls">
                                                        <label>Confirmar nueva contraseña</label>
                                                        <input type="password" class="form-control" name="re_password" id="re_password" required data-validation-required-message="Ingresa tu correo electronico.">
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $id_usuario; ?>">
                                                <input type="hidden" id="password_old2" name="password_old2" class="form-control" value="<?php echo $password; ?>">
                                                <div id="success"></div>
                                                <!-- For success/fail messages -->
                                                <button onclick="SavePassword()" type="button" class="btn btn-primary">Guardar cambios</button>
                                            </form>
                                        </div>
                                        <br>
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

<script>
    function SaveProducto() {
        var id_usuario2_send = $("#id_usuario2").val();
        var nombre_send = $("#nombre").val();
        var descripcion_send = $("#descripcion").val();
        var precio_send = $("#precio").val();

        if (nombre_send == "" || descripcion_send == "" || precio_send == "") {
            alertify.error('Debes completar todos los campos.');
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/productos/ajax_nuevoProducto.php",
                data: {
                    id_usuario2: id_usuario2_send,
                    nombre: nombre_send,
                    descripcion: descripcion_send,
                    precio: precio_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify.success('Producto agregado con éxito.');
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
        }
    }
</script>
<script>
    /*function Confirmar() {
        //Ingresamos un mensaje a mostrar
        var mensaje = confirm("¿Quieres eliminar este producto?");
        //Detectamos si el usuario acepto el mensaje
        if (mensaje) {
            alert("¡Producto eliminar con éxito!");
        }
        //Detectamos si el usuario denegó el mensaje
        else {
            alert("¡Haz denegado el mensaje!");
        }
    }*/

    function Delete(cual) {
        alertify.confirm("¿Quiere eliminar este producto?",
            function() {
                $.ajax({
                    type: "POST",
                    url: "ajax/productos/ajax_deleteProducto.php",
                    data: {
                        id_delete: cual
                    },
                    dataType: 'html',
                    success: function(response) {
                        if (response == "ok") {
                            alertify.success('Producto eliminado con éxito.');
                            location.reload();
                        } else if (response == "security") {
                            alert("Error Grave de Seguridad");
                        } else {
                            alert("Error General");
                        }
                    },
                    error: function(response) {
                        alertify.message('Cancelado.');
                    }
                });
            },
            function() {
                alertify.message('Cancelado.');
            });
        //Detectamos si el usuario denegó el mensaje
    }
</script>
<script>
    function SaveUsuario() {
        var id_usuario_send = $("#id").val();
        var nombre_pyme_send = $("#nombre_pyme").val();
        var descripcion_pyme_send = $("#descripcion_pyme").val();
        var telefono_send = $("#telefono").val();
        var comuna_send = $("#comuna").val();
        var localidad_send = $("#localidad").val();
        var rubro_send = $("#rubro").val();
        var validado = true;


        if (nombre_pyme_send == "" || descripcion_pyme_send == "" || telefono_send == "" || comuna_send == "" || localidad_send == "" || rubro == "") {
            alertify.error('Todos los datos son necesarios.');
            validado = false;
        }


        if (validado) {
            $.ajax({
                type: "POST",
                url: "ajax/usuarios/ajax_editPyme.php",
                data: {
                    id: id_usuario_send,
                    nombre_pyme: nombre_pyme_send,
                    descripcion_pyme: descripcion_pyme_send,
                    telefono: telefono_send,
                    comuna: comuna_send,
                    localidad: localidad_send,
                    rubro: rubro_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify
                            .alert("Usuario modificado con éxito.", function() {
                                location.reload();
                            });
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
    $('.newbtn').bind("click", function() {
        $('#pic').click();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    $(document).ready(function() {
        var frm = $("#frmSubirImagen");
        frm.bind("submit", function() {

            var frmData = new FormData;
            frmData.append("imagen_pyme", $("input[name=imagen_pyme]")[0].files[0]);

            $.ajax({
                url: frm.attr("action"),
                type: frm.attr("method"),
                data: frmData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    location.reload(forceGet)
                }
            });
            return false;
        });

    });
</script>

<!-- Evita el enter con el submit -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[type=text]').forEach(node => node.addEventListener('keypress', e => {
            if (e.keyCode == 13) {
                e.preventDefault();
            }
        }))
    });
</script>

<script>
    function SavePassword() {
        var id_usuario_send = $("#id_usuario").val();
        var password_old_send = $("#password_old").val();
        var password_new_send = $("#password_new").val();
        var re_password_send = $("#re_password").val();
        var password_old2_send = $("#password_old2").val();

        if (password_old_send == "" || password_new_send == "" || re_password_send == "") {
            alertify.error('Debes completar todos los campos');

        } else if (password_new_send != re_password_send) {
            alertify.error('La contraseña nueva no coincide');
        } else {

            $.ajax({
                type: "POST",
                url: "ajax/usuarios/ajax_editPassword.php",
                data: {
                    id_usuario: id_usuario_send,
                    password_old: password_old_send,
                    password_new: password_new_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify
                            .alert("Contraseña modificada con éxito", function() {
                                location.reload();
                            });
                    } else if (response == "mal") {
                        alertify.error('Contraseña actual incorrecta');
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