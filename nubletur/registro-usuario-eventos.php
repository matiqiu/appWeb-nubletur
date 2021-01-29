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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Bienvenido al formulario de registro para usuario eventos.</a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body text-justify">
                            Este registro le dará el privilegio de poder publicar eventos. Los datos que utilice para este 
                            registro NO serán públicos, por lo que si quiere agregar un tipo de contacto lo deberá hacer en
                             la descripción del evento que publique. Estos datos son de uso privado de la página de Ñubletur
                              sin ningún uso alguno. Los campos "empresa" y "rubro" son para registrar si su evento proviene 
                              de alguna empresa o persona particular. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4 contact-left">
            <h3>Complete con sus datos</h3>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Telefono de contacto:</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required data-validation-required-message="Porfavor ingrese su numero de telefono.">
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
                    <label>Empresa: (Opcional)</label>
                    <input type="text" class="form-control" id="empresa" name="empresa">
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <label>Rubro: (opcional)</label>
                    <input type="text" class="form-control" id="rubro" name="rubro" value="<?php echo $rubro; ?>">
                </div>
            </div>
            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>" />
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="button" onclick="Save()" style="margin-right: 100px" class="btn btn-primary" id="registro">Registrarse</button>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>

<script>
    function Save() {
        var id_usuario_send = $("#id").val();
        var telefono_send = $("#telefono").val();
        var comuna_send = $("#comuna").val();
        var localidad_send = $("#localidad").val();
        var empresa_send = $("#empresa").val();
        var rubro_send = $("#rubro").val();
        var validado = true;


        if (telefono_send == "" || comuna_send == "" || localidad_send == "") {
            alertify.error('Debe completar todos los campos que no son opcionales');
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
        } else if (empresa_send.length > 100) {
            alertify.error('El nombre de la empresa no puede tener más de 100 caracteres');
            validado = false;
        } else if (rubro_send.length > 100) {
            alertify.error('El rubro no puede tener más de 100 caracteres');
            validado = false;
        } else if (validado) {
            $.ajax({
                type: "POST",
                url: "ajax/usuarios/ajax_registroUsuarioEvento.php",
                data: {
                    id: id_usuario_send,
                    telefono: telefono_send,
                    comuna: comuna_send,
                    localidad: localidad_send,
                    empresa: empresa_send,
                    rubro: rubro_send
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