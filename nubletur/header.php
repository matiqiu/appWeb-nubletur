<?php
header('Content-Type: text/html; charset=utf-8');



//Fechas

require_once 'vendor/autoload.php';

use Carbon\Carbon;

Carbon::setLocale('es');
setLocale(LC_TIME, 'es_CL');

//date_default_timezone_set("America/Santiago");

//Carbon::setLocale('es');

//$fecha = new Carbon('2020-12-10');

//echo $fecha->diffForHumans();


/////////////////

//Para segunda paginacion
$variable = $_SERVER['PHP_SELF'];
$variable = basename($variable);
//
error_reporting(0);

$array_privilegios = array();
//$array_privilegios = $_COOKIE["privilegio"];
$array_privilegios = explode(",", $_COOKIE["array_privilegios"]);


//echo $_COOKIE["id_usuario"];

//echo $_COOKIE["privilegio"];
//print_r($array_privilegios);

$estado_usuario = 0;

if (isset($_COOKIE['id_usuario'])) {
   $estado_usuario = $_COOKIE['id_usuario'];
} else {
   $estado_usuario = 0;
}

//[15][1][2][3]
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Ñubletur </title>

   <?php if ($nivel == 2) {
      $ruta = "../";
   } else {
      $ruta = "";
   }
   ?>

   <!-- Bootstrap core CSS -->
   <link href="<?= $ruta ?>css/bootstrap.min.css" rel="stylesheet">
   <!-- Fontawesome CSS -->
   <link href="<?= $ruta ?>css/all.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="<?= $ruta ?>css/style.css" rel="stylesheet">

   <!-- -->
   <link href="<?= $ruta ?>plugins/alertify.min.css" rel="stylesheet">
   <!-- -->
   <link href="<?= $ruta ?>plugins/default.min.css" rel="stylesheet">

</head>

<body>
   <!-- Navigation -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
      <div class="container">
         <a class="navbar-brand" href="index.php">
            <img src="<?= $ruta ?>images/ñuble/logo3.png" width="200" height="70" alt="logo" />
         </a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link <?php if ($variable == 'index.php') {
                                          echo 'active';
                                       } ?>" href="<?= $ruta ?>index.php">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if ($variable == 'eventos.php') {
                                          echo 'active';
                                       } ?>" href="<?= $ruta ?>eventos.php?pagina=1">Eventos</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link <?php if ($variable == 'caracteristicas.php' || $variable == 'linea-de-tiempo.php' || $variable == 'guia_del_turista.php') {
                                          echo 'active';
                                       } ?> dropdown-toggle" href="<?= $ruta ?>#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sobre Ñuble
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                     <a class="dropdown-item" href="<?= $ruta ?>caracteristicas.php">Características</a>
                     <a class="dropdown-item" href="<?= $ruta ?>linea-de-tiempo.php">Línea de tiempo</a>
                     <a class="dropdown-item" href="<?= $ruta ?>guia_del_turista.php">Guía del viajero</a>
                  </div>
               </li>
               <!--
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Portfolio
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                     <a class="dropdown-item" href="portfolio-1-col.php">1 Column Portfolio</a>
                     <a class="dropdown-item" href="portfolio-2-col.php">2 Column Portfolio</a>
                     <a class="dropdown-item" href="portfolio-3-col.php">3 Column Portfolio</a>
                     <a class="dropdown-item" href="portfolio-4-col.php">4 Column Portfolio</a>
                     <a class="dropdown-item" href="portfolio-item.php">Single Portfolio Item</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Blog
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                     <a class="dropdown-item" href="blog-home-1.php">Blog Home 1</a>
                     <a class="dropdown-item" href="blog-home-2.php">Blog Home 2</a>
                     <a class="dropdown-item" href="blog-post.php">Blog Post</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Pages
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                     <a class="dropdown-item" href="faq.php">FAQ</a>
                     <a class="dropdown-item" href="404.php">404</a>
                     <a class="dropdown-item" href="pricing.php">Pricing Table</a>
                  </div>
               </li>
               -->
               <?php
               if (!isset($_COOKIE['id_usuario'])) {
               ?>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($variable == 'login.php') {
                                             echo 'active';
                                          } ?>" href="<?= $ruta ?>login.php">Iniciar sesión</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($variable == 'registro.php') {
                                             echo 'active';
                                          } ?>" href="<?= $ruta ?>registro.php">Registrarse</a>
                  </li>
               <?php
               }
               ?>
               <?php
               if (in_array("2", $array_privilegios)) {
               ?>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= $ruta ?>publicar-evento.php">Publicar evento</a>
                  </li>
               <?php
               }
               ?>
               <?php
               if (in_array("3", $array_privilegios)) {
               ?>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= $ruta ?>mi-pyme.php">Mi Pyme</a>
                  </li>
               <?php
               }
               if (isset($_COOKIE['id_usuario'])) {
               ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong><i class="fa fa-user-circle"></i> <?php echo $_COOKIE['nombre']; ?></strong>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">


                        <?php
                        if (in_array("1", $array_privilegios) && in_array("3", $array_privilegios) && !in_array("2", $array_privilegios)) {
                        ?>
                           <a class="dropdown-item" href="<?= $ruta ?>registro-usuario-eventos.php">Publicar eventos</a>
                        <?php
                        }
                        ?>
                        <?php
                        if (in_array("1", $array_privilegios) && in_array("2", $array_privilegios) && !in_array("3", $array_privilegios)) {
                        ?>
                           <a class="dropdown-item" href="<?= $ruta ?>registro-pyme.php">Tengo una Pyme</a>
                        <?php
                        } else if (!in_array("2", $array_privilegios) && !in_array("3", $array_privilegios))  {
                        ?>
                           <a class="dropdown-item" href="<?= $ruta ?>registro-usuario-eventos.php">Publicar eventos</a>
                           <a class="dropdown-item" href="<?= $ruta ?>registro-pyme.php">Tengo una Pyme</a>
                        <?php
                        }
                        ?>

                        <a class="dropdown-item" onClick="CerrarSesion()" href="<?= $ruta ?>index.php"><i class="fa fa-sign-out-alt"></i> Cerrar sesión</a>

                     </div>
                  </li>
               <?php
               }
               ?>
            </ul>
         </div>
      </div>
   </nav>

   <script>
      function CerrarSesion() {
         $.ajax({
            type: "POST",
            url: "ajax/acceso/ajax_cerrarsesion.php",
            dataType: 'html',
            success: function(response) {
               console.log("ENTRO:" + response);
               window.location.replace("/");
            },
            error: function(response) {
               alert("ha ocurrido un error, por favor intentar nuevamente." + response);
            }
         });
      }
   </script>