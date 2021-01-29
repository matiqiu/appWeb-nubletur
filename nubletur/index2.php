<?php
include("header.php");

?>

<div class="container">
<form id="frmSubirImagen" action="enviar-imagen-pyme.php" role="form" novalidate enctype="multipart/form-data" method="POST">
    <label class=newbtn>
        <div class="form-group">
            Toca para agregar una foto referente a la pyme
            <img id="blah" src="images/ñuble/logo-foto.png">
            <input id="imagen_pyme" name="imagen_pyme" class='pis' onchange="readURL(this);" type="file">
        </div>
    </label>
    <button type="submit" style="margin-right: 100px" class="btn btn-primary" id="sendMessageButton">Registrarse</button>
</form>

</div>
<br>
<br>
<br>

<?php
include("footer.php");
?>

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