<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	include("../../_drivers/funciones.php");
    include("../../model/model_evento.php");

 	$retorno="mal";
    if(isset($_POST['id_usuario']))
    {  
        $id_usuario                   = htmlspecialchars($_POST['id_usuario'], ENT_QUOTES, 'UTF-8');
        $nombre_evento                  = htmlspecialchars($_POST['nombre_evento'], ENT_QUOTES, 'UTF-8');
        $dia_inicio             = htmlspecialchars($_POST['dia_inicio'], ENT_QUOTES, 'UTF-8'); 
        $dia_termino             = htmlspecialchars($_POST['dia_termino'], ENT_QUOTES, 'UTF-8');
        $hora_inicio             = htmlspecialchars($_POST['hora_inicio'], ENT_QUOTES, 'UTF-8');
        $hora_termino             = htmlspecialchars($_POST['hora_termino'], ENT_QUOTES, 'UTF-8');
        $direccion   = htmlspecialchars($_POST['direccion'], ENT_QUOTES, 'UTF-8'); 
        $localidad              = htmlspecialchars($_POST['localidad'], ENT_QUOTES, 'UTF-8'); 
        $region         = htmlspecialchars($_POST['region'], ENT_QUOTES, 'UTF-8'); 
        $latitud               = htmlspecialchars($_POST['latitud'], ENT_QUOTES, 'UTF-8'); 
        $longitud               = htmlspecialchars($_POST['longitud'], ENT_QUOTES, 'UTF-8'); 
        $contenido               = htmlspecialchars($_POST['contenido'], ENT_QUOTES, 'UTF-8'); 
        $contenido2               = htmlspecialchars($_POST['contenido2'], ENT_QUOTES, 'UTF-8');
        $imagen_evento               = htmlspecialchars($_POST['url_imagen'], ENT_QUOTES, 'UTF-8');
        $estado                        = "1";
        $retorno_query  = insertEvento($id_usuario, $nombre_evento, $dia_inicio, $dia_termino, $hora_inicio, $hora_termino, $direccion, $localidad, $region, $latitud, $longitud, $contenido, $contenido2, $imagen_evento, $estado);

		$retorno="ok";	
	}
	else
	{
		$retorno="security";
	}
	echo $retorno;
