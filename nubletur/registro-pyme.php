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
$telefono = $fila["telefono"];
$comuna = $fila["comuna"];
$localidad = $fila["localidad"];
$rubro = $fila["rubro"];
?>
<!-- full Title -->
<div class="full-title">
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Completar registro
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
    <div class="row">
        <div class="col-lg-5 mb-4 contact-left">
            <div class="faq-main">
                <div class="" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card accordion-single">
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Bienvenido al formulario de registro para Pymes.</a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body text-justify">
                                Este registro le dará el privilegio de poder crear un perfil de pyme con todos los productos que ofrece como pequeña empresa,
                                 además podrá crear asistencia en los eventos que la Pyme estará, con el objetivo de crear publicidad de su empresa. Los datos que utilice para este registro 
                                 serán públicos en su perfil de Pyme, los cuales puede modificarlos en cualquier momento. Todos los datos de este formulario son necesarios por lo que es obligatorio completarlos todos.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 contact-left">
            <form id="frmSubirImagen" action="enviar-imagen-pyme.php" role="form" novalidate enctype="multipart/form-data" method="POST">

                <h3>Complete con los datos de la empresa</h3>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nombre Pyme:</label>
                        <input type="text" class="form-control" id="nombre_pyme" name="nombre_pyme" name required data-validation-required-message="Porfavor ingrese el nombre de la pyme.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Descripción de la Pyme:</label>
                        <textarea type="text" rows="3" class="form-control" id="descripcion_pyme" name="descripcion_pyme" name required data-validation-required-message="Porfavor ingrese el nombre de la pyme."></textarea>
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
                        Toca para agregar una foto referente a la pyme
                        <img id="blah" src="images/ñuble/logo-foto.png">
                        <input id="imagen_pyme" name="imagen_pyme" class='pis' onchange="readURL(this);" type="file">
                    </div>
                </label>
                <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>" />
                <input type="hidden" id="url_imagen_pyme" name="url_imagen_pyme" class="form-control" value="http://www.nubletur.es/fotos-pymes/<?php echo $id;?>">
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" onclick="Save()" style="margin-right: 100px" class="btn btn-primary" id="sendMessageButton">Registrarse</button>

            </form>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>

<script>
    function Save() {
        var id_usuario_send = $("#id").val();
        var nombre_pyme_send = $("#nombre_pyme").val();
        var descripcion_pyme_send = $("#descripcion_pyme").val();
        var telefono_send = $("#telefono").val();
        var comuna_send = $("#comuna").val();
        var localidad_send = $("#localidad").val();
        var rubro_send = $("#rubro").val();
        var url_imagen_pyme_send = $("#url_imagen_pyme").val();
        var validado = true;


        if (nombre_pyme_send == "" || descripcion_pyme_send == "" || telefono_send == "" || comuna_send == "" || localidad_send == "" || rubro_send == "") {
            alertify.error('Todos los campos son obligatorios');
            validado = false;
        } else if (nombre_pyme_send.length > 100) {
            alertify.error('El nombre de la Pyme no puede tener más de 100 caracteres');
            validado = false;
        } else if (nombre_pyme_send.length < 3) {
            alertify.error('El nombre de la Pyme no puede tener menos de 3 caracteres');
            validado = false;
        } else if (descripcion_pyme_send.length > 1500) {
            alertify.error('La descripción de la pyme no puede tener más de 1500 caracteres');
            validado = false;
        } else if (descripcion_pyme_send.length < 30) {
            alertify.error('La descripción de la pyme es muy corta, debe tener por lo menos 30 caracteres');
            validado = false;
        } else if (isNaN(telefono_send)) {
            alertify.error('El telefono de contacto solo acepta numeros');
            validado = false;
        } else if (telefono_send.length > 20) {
            alertify.error('El telefono de contacto no puede tener más de 20 numeros');
            validado = false;
        } else if (comuna_send.length > 100) {
            alertify.error('La comuna no puede tener más de 100 caracteres');
            validado = false;
        } else if (localidad_send.length > 150) {
            alertify.error('La localidad no puede tener más de 150 caracteres');
            validado = false;
        } else if (rubro_send.length > 100) {
            alertify.error('El rubro no puede tener más de 100 caracteres');
            validado = false;
        } else if (validado) {
            $.ajax({
                type: "POST",
                url: "ajax/usuarios/ajax_registroPyme.php",
                data: {
                    id: id_usuario_send,
                    nombre_pyme: nombre_pyme_send,
                    descripcion_pyme: descripcion_pyme_send,
                    telefono: telefono_send,
                    comuna: comuna_send,
                    localidad: localidad_send,
                    rubro: rubro_send,
                    url_imagen_pyme: url_imagen_pyme_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify
                            .alert("Registro completado con éxito.", function() {
                                location.href = "index.php";
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
                success: function(data) {}
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