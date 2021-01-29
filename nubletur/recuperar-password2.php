<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
$nivel = 2;

include("header.php");

include("model/model_user.php");
include("model/model_url_secreta.php");

$url_secreta = htmlspecialchars($_GET['url_secreta'], ENT_QUOTES, 'UTF-8');

$stmt = selectUrlSecreta($url_secreta);
$cuantas_rows = $stmt->rowCount();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
$id_usuario = $fila['id_usuario'];
$email = $fila['email_usuario'];

?>
<!-- full Title -->
<div class="full-title">
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Crea una contraseña nueva
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
            <li class="breadcrumb-item active">Recuperar contraseña</li>
        </ol>
    </div>
    <div class="conainer">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <form role="form" method="post" action="#">
                    <br>
                    <div class="form-group">
                        <label for="clave">Nueva contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" required data-validation-required-message="Ingresa tu correo electronico.">
                    </div>
                    <div class="form-group">
                        <label for="clave2">Escribe de nuevo la contraseña</label>
                        <input type="password" class="form-control" name="repassword" id="repassword" required data-validation-required-message="Ingresa tu correo electronico.">
                    </div>
                    <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $id_usuario; ?>">
                    <button type="button" onclick="SavePassword()" class="btn btn-primary" id="sendMessageButton">Guardar contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<?php
include("footer.php");
?>

<script>
    function SavePassword() {

        var password_send = $("#password").val();
        var repassword_send = $("#repassword").val();
        var id_usuario_send = $("#id_usuario").val();

        if (password_send == "" || repassword_send == "") {
            alertify.error('Debes completar todos los campos');

        } else if (password_send != repassword_send) {
            alertify.error('La contraseña nueva no coincide');
        } else if (password_send.length > 200) {
            alertify.error('La contraseña no puede tener más de 200 caracteres');
        } else if (password_send.length < 6) {
            alertify.error('La contraseña debe tener más de 6 caracteres');
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/usuarios/ajax_nuevaPassword.php",
                data: {
                    id_usuario: id_usuario_send,
                    password: password_send,
                    repassword: repassword_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {
                        alertify
                            .alert("Nueva contraseña creada con éxito.", function() {
                                location.href = "login.php";
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