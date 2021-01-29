<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");
include("header.php");
include("model/model_user.php");

$id_usuario = $_COOKIE['id_usuario'];

include("model/model_evento.php");

$stmt = selectUltimoEvento();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);
$ultimo_evento = $fila["max(id_evento)"];


$stmt2 = selectUltimoEventoMas();
$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$ultimo_evento_mas = $fila2["MAX($ultimo_evento+1)"];

?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=CLAVESECRETA"></script>
<script type="text/javascript">
    function initialize() {
        // Crea objeto de mapa
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 12,
            center: new google.maps.LatLng(-36.608644, -72.103408),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        // crea un marcador arrastrable a las coordenadas dadas
        var vMarker = new google.maps.Marker({
            position: new google.maps.LatLng(-36.608644, -72.103408),
            draggable: true
        });
        // agrega un oyente al marcador
        // obtiene las coordenadas cuando finaliza el evento de arrastre
        // luego actualiza la entrada con las nuevas coordenadas
        google.maps.event.addListener(vMarker, 'dragend', function(evt) {
            $("#latitud").val(evt.latLng.lat().toFixed(6));
            $("#longitud").val(evt.latLng.lng().toFixed(6));

            map.panTo(evt.latLng);
        });
        // centra el mapa en las coordenadas de los marcadores
        map.setCenter(vMarker.position);
        // agrega el marcador en el mapa
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
        <h1 class="mt-4 mb-3">Publicar evento
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
            <li class="breadcrumb-item active">Publicar evento</li>
        </ol>
    </div>
    <form id="frmSubirImagen" action="enviar-imagen.php" role="form" novalidate enctype="multipart/form-data" method="POST">
        <div class="row">

            <body onload="initialize();">
                <div class="col-lg-5 mb-4 contact-left">
                    <h3>Complete los datos del evento</h3>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre evento:</label>
                            <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Día inicio:</label>
                            <input type="date" class="form-control" id="dia_inicio" name="dia_inicio" min="2018-01-01" max="2040-12-31" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Día termino::</label>
                            <input type="date" class="form-control" id="dia_termino" name="dia_termino" min="2018-01-01" max="2040-12-31" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Hora inicio:</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Hora termino:</label>
                            <input type="time" class="form-control" id="hora_termino" name="hora_termino" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Región:</label>
                            <input type="text" class="form-control" id="region" name="region" value="Ñuble" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Localidad:</label>
                            <input type="text" list="localidades" class="form-control" id="localidad" name="localidad" required data-validation-required-message="Porfavor ingrese su nombre.">
                            <datalist id="localidades">
                                <option value='Gran Chillán'>
                                <option value='San Carlos'>
                                <option value='Bulnes'>
                                <option value='Coelemu'>
                                <option value='Yungay'>
                                <option value='Quirihue'>
                                <option value='Quillón'>
                                <option value='Coihueco'>
                                <option value='El Carmen'>
                                <option value='Pemuco'>
                                <option value='Pinto'>
                                <option value='San Ignacio'>
                                <option value='Pueblo Seco'>
                                <option value='Campanario'>
                                <option value='San Nicolás'>
                                <option value='Santa Clara'>
                                <option value='Puente Ñuble'>
                                <option value='Portezuelo'>
                                <option value='Cachapoal'>
                                <option value='Recinto-Los Lleuques'>
                                <option value='Cobquecura'>
                                <option value='San Fabián de Alico'>
                                <option value='Ninhue'>
                                <option value='Ñipas'>
                                <option value='Quinchamalí'>
                                <option value='Treguaco'>
                                <option value='Quiriquina'>
                                <option value='San Gregorio de Ñiquén'>
                                <option value='Ranguelmo'>
                                <option value='Las Mariposas'>
                                <option value='Minas del Prado'>
                                <option value='Ribera de Ñuble'>
                                <option value='Rucapequén'>
                                <option value='Zemita'>
                                <option value='Las Arboledas'>
                                <option value='Guarilihue Bajo'>
                                <option value='El Rosal'>
                                <option value='Tres Esquinas'>
                                <option value='Cholguán'>
                                <option value='Coyanco'>
                                <option value='Buli'>
                                <option value='Bustamante'>
                                <option value='Quinquegua'>
                                <option value='El Sauce'>
                                <option value='Virgüín'>
                                <option value='La Viñita'>
                                <option value='Las Quilas'>
                                <option value='Hernán Brañas'>
                                <option value='El Guape'>
                                <option value='El Emboque'>
                                <option value='San Miguel'>
                                <option value='Agua Buena'>
                                <option value='Coleal'>
                                <option value='Perales'>
                                <option value='Talquipén'>
                                <option value='Tanilvoro'>
                                <option value='Culenar'>

                            </datalist>
                        </div>
                    </div>
                    <!--
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Localidad:</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    -->
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Lugar o dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required data-validation-required-message="Porfavor ingrese su nombre.">
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="latitud" name="latitud" value="-36.608644" required data-validation-required-message="Porfavor ingrese su nombre.">
                    <input type="hidden" class="form-control" id="longitud" name="longitud" value="-72.103408" required data-validation-required-message="Porfavor ingrese su nombre.">
                </div>
                <div class="col-lg-7 text-center">
                    <br>
                    <h5>Marque en el mapa con el punto rojo el lugar en el que se realizará el evento</h5>
                    <div id="map_canvas" style="width: auto; height: 500px;">
                    </div>
                    <br>
                    <br>
                </div>
            </body>
        </div>
        <div class="row">
            <div class="col-lg-5 mb-4 contact-left">
                <label class=newbtn>
                    <div class="form-group">
                        Toca para agregar una foto referente al evento
                        <img id="blah" src="images/ñuble/logo-foto.png">
                        <input id="imagen_evento" name="imagen_evento" class='pis' onchange="readURL(this);" type="file">
                    </div>
                </label>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Descipción del evento:</label>
                        <textarea type="text" rows="5" class="form-control" id="contenido" name="contenido" required data-validation-required-message="Porfavor ingrese su nombre."></textarea>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Descipción de invitados: (opcional)</label>
                        <textarea type="text" rows="4" class="form-control" id="contenido2" name="contenido2" required data-validation-required-message="Porfavor ingrese su nombre."></textarea>
                    </div>
                </div>
                <input type="hidden" id="id_usuario" name="id_usuario" class="form-control" value="<?php echo $id_usuario; ?>">
                <input type="hidden" id="url_imagen" name="url_imagen" class="form-control" value="http://www.nubletur.es/fotos-eventos/<?php echo $ultimo_evento_mas;?>">
                <div id="success"></div>
                <!-- For success/fail messages -->
            </div>
        </div>
        <button type="submit" onclick="Save()" onload="initialize();" style="margin-right: 100px" class="btn btn-primary" id="sendMessageButton">Publicar evento</button>
    </form>
</div>
<br>

<?php
include("footer.php");
?>

<script>
    document.getElementById('region').disabled = true;

    function Save() {
        var id_usuario_send = $("#id_usuario").val();
        var nombre_evento_send = $("#nombre_evento").val();
        var dia_inicio_send = $("#dia_inicio").val();
        var dia_termino_send = $("#dia_termino").val();
        var hora_inicio_send = $("#hora_inicio").val();
        var hora_termino_send = $("#hora_termino").val();
        var direccion_send = $("#direccion").val();
        var localidad_send = $("#localidad").val();
        var region_send = $("#region").val();
        var latitud_send = $("#latitud").val();
        var longitud_send = $("#longitud").val();
        var contenido_send = $("#contenido").val();
        var contenido2_send = $("#contenido2").val();
        var url_imagen_send = $("#url_imagen").val();

        if (nombre_evento_send == "" || dia_inicio_send == "" || dia_termino_send == "" || hora_inicio_send == "" || hora_termino_send == "" || direccion_send == "" || localidad_send == "" || region_send == "" || latitud_send == "" || longitud_send == "" || contenido_send == "") {
            alertify
                .alert("Todos los datos son necesarios.", function() {});
        } else if (nombre_evento_send.length > 100) {
            alertify.error('El nombre no puede tener más de 100 caracteres');
        } else if (nombre_evento_send.length < 5) {
            alertify.error('El nombre no puede tener menos de 5 caracteres');
        } else if (region_send.length > 100) {
            alertify.error('La región no puede tener más de 100 caracteres');
        } else if (localidad_send.length > 100) {
            alertify.error('La localidad no puede tener más de 100 caracteres');
        } else if (direccion_send.length > 150) {
            alertify.error('La dirección no puede tener más de 150 caracteres');
        } else if (contenido_send.length > 1000) {
            alertify.error('La descripcion no puede tener más de 1000 caracteres');
        } else if (contenido_send.length < 30) {
            alertify.error('La descripción no puede tener menos de 30 caracteres');
        } else if (contenido2_send.length > 1000) {
            alertify.error('La descripción de invitados no puede tener más de 1000 caracteres');
        } else if (dia_inicio_send > dia_termino_send) {
            alertify.error('ERROR en las fechas');
        } else {
            $.ajax({
                type: "POST",
                url: "ajax/eventos/ajax_nuevoEvento.php",
                data: {
                    id_usuario: id_usuario_send,
                    nombre_evento: nombre_evento_send,
                    dia_inicio: dia_inicio_send,
                    dia_termino: dia_termino_send,
                    hora_inicio: hora_inicio_send,
                    hora_termino: hora_termino_send,
                    direccion: direccion_send,
                    localidad: localidad_send,
                    region: region_send,
                    latitud: latitud_send,
                    longitud: longitud_send,
                    contenido: contenido_send,
                    contenido2: contenido2_send,
                    url_imagen: url_imagen_send
                },
                dataType: 'html',
                success: function(response) {
                    console.log(response);
                    if (response == "ok") {

                        alertify
                            .alert("Evento creado con éxito.", function() {


                                location.href = "evento.php?id=<?php echo $ultimo_evento_mas; ?>";
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
            frmData.append("imagen_evento", $("input[name=imagen_evento]")[0].files[0]);

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
