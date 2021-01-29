<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("_drivers/funciones.php");

include("header.php");
include("model/model_user.php");

require_once 'vendor/autoload.php';

use Carbon\Carbon;


Carbon::setLocale('es');
setLocale(LC_TIME, 'es_CL');

?>

<header class="slider-main">
   <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
         <!-- Slide One - Set the background image for this slide in the line below -->
         <div class="carousel-item active" style="background-image: url('images/ñuble/evento3.jpg')">
            <div class="carousel-caption d-none d-md-block">
               <h3>EVENTOS ÑUBLE</h3>
               <p>Eventos todo el año, los puedes conocer aquí</p>
            </div>
         </div>
         <!-- Slide Three - Set the background image for this slide in the line below -->
         <div class="carousel-item" style="background-image: url('images/ñuble/evento1.jpg')">
            <div class="carousel-caption d-none d-md-block">
               <h3>DA A CONOCER TUS EVENTOS</h3>
               <p>Registrate y comentanos lo que se viene</p>
            </div>
         </div>
         <div class="carousel-item" style="background-image: url('images/ñuble/evento2.jpg')">
            <div class="carousel-caption d-none d-md-block">
               <h3>PUBLICITA TU EMPRESA</h3>
               <p>¿Tienes una Pyme? Publicalo aquí y da a conocer tus productos</p>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</header>
<!-- Page Content -->
<div class="container">
   <?php
   include("model/model_evento.php");

   $stmt = select3eventos("");
   $cuantas_rows = $stmt->rowCount();
   //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

   if ($cuantas_rows > 0) {
   ?>
      <div class="services-bar">

         <h1 class="my-4">Los eventos más proximos </h1>
         <!-- Services Section -->
         <div class="row">
            <?php

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $id_evento = $fila['id_evento'];
               $id_usuario_evento = $fila['id_usuario'];

            ?>
               <div class="col-lg-4 mb-4">
                  <div class="card h-100">
                     <h4 class="card-header"><?php echo $fila["nombre_evento"];  ?></h4>
                     <div class="card-img">
                        <?php

                        if (file_exists('fotos-eventos/' . $fila["id_evento"])) {
                        ?>
                           <img class="card-img-top" height="300px" src="<?php echo 'fotos-eventos/' . $fila["id_evento"]; ?>">
                        <?php
                        }
                        ?>
                     </div>
                     <div class="card-body">
                        <?php
                        $fila["dia_inicio"] = new Carbon($fila["dia_inicio"]);
                        $nombre_dia1 = $fila["dia_inicio"]->formatLocalized('%A %d de %B %Y');
                        ?>
                        <h5><i class="fa fa-calendar-alt"></i> <?php echo $nombre_dia1; ?></h5>
                        <div class="text-justify">
                           <p class="max" class="card-text"><?php echo $fila["contenido"];  ?></p>
                        </div>
                     </div>
                     <div class="card-footer">
                        <?php echo '<a href="evento.php?id=' . $fila["id_evento"] . '" class="btn btn-primary">Ver más &rarr;</a> '; ?>
                     </div>
                  </div>
               </div>
            <?php
            }
            ?>
         </div>
         <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
               <a class="btn btn-lg btn-secondary btn-block" href="eventos.php?pagina=1">Ver todos los eventos</a>
            </div>
            <div class="col-lg-3">
            </div>
         </div>
         <!-- /.row -->

      </div>
      <!-- About Section -->
      <hr>
   <?php
   }
   ?>
   <br>
   <div class="about-main">
      <div class="row">
         <div class="col-lg-6">
            <h2>Bienvenido a la XVI Región de Ñuble</h2>
            <h6>Una Región que tiene en la diversidad su mayor riqueza de mar a cordillera, con sus 21 comunas,
               Ñuble se proyecta como un territorio único en Chile, por su identidad, historia, economía y alto valor natural.</h6>
            <br>
            <h5>Principales atractivos turísticos</h5>
            <ul>
               <li>Termas de Chillán.</li>
               <li>Cobquecura.</li>
               <li>Laguna Avendaño.</li>
               <li>San Fabián de Alico.</li>
               <li>Quinchamalí.</li>
            </ul>
            <p>La Región de Ñuble tiene 21 comunas y se divide en 3 provincias: Punilla, Itata y Diguillín.
               Chillán es su capital regional y las capitales provinciales son San Carlos, Quirihue y Bulnes, respectivamente.
            </p>
         </div>
         <div class="col-lg-6">
            <img class="img-fluid rounded" src="images/ñuble/termas.jpg" alt="" />
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- Portfolio Section -->
   <?php
   $stmt2 = selectPymeRandom();
   $cuantas_rows = $stmt2->rowCount();
   //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

   if ($cuantas_rows > 0) {
   ?>
      <hr>
      <div class="portfolio-main">
         <h2>Algunas de las Pymes que estan en ñubletur</h2>
         <div class="row">
            <?php

            while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

               $nombre_pyme = $fila2['nombre_pyme'];
               $id_pyme = $fila2['id_usuario'];
               $descripcion_pyme = $fila2['descripcion_pyme'];
               $rubro = $fila2['rubro'];
            ?>
               <div class="col-lg-4 col-sm-6 portfolio-item">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="" data-toggle="modal" data-target="#<?php echo $id_pyme; ?>">
                           <?php

                           if (file_exists('fotos-pymes/' . $id_pyme)) {
                           ?>
                              <img class="card-img-top" height="200px" src="<?php echo 'fotos-pymes/' . $id_pyme; ?>">
                           <?php
                           } else {
                           ?>
                              <img class="card-img-top" height="200px" src="images/ñuble/imagen-pyme.jpg" alt="" />
                           <?php
                           }
                           ?>
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="" data-toggle="modal" data-target="#<?php echo $id_pyme; ?>"><?php echo $nombre_pyme; ?></a>
                        </h4>
                     </div>
                  </div>
               </div>
               <!-- Modal -->
               <div class="modal fade" id="<?php echo $id_pyme; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" id="<?php echo $id_pyme; ?>">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Pyme</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">

                           <div class="row">

                              <div class="card h-100">
                                 <div class="card profile-card">
                                    <?php

                                    if (file_exists('fotos-pymes/' . $id_pyme)) {
                                    ?>
                                       <img class="card-img-top" height="250px" src="<?php echo 'fotos-pymes/' . $id_pyme; ?>">
                                    <?php
                                    } else {
                                    ?>
                                       <img class="card-img-top" height="250px" src="images/ñuble/imagen-pyme.jpg" alt="" />
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <div class="text-center">
                                       <h4 class="card-title"><?php echo $nombre_pyme ?></h4>
                                       <h6 class="card-subtitle mb-2 text-muted"><?php echo $rubro ?></h6>
                                       <p class="card-text"><?php echo $descripcion_pyme ?></p>
                                       <br>
                                       <?php
                                       if ($estado_usuario == $id_pyme) {
                                       ?>
                                          <a href="mi-pyme.php?id=<?php echo $id_pyme; ?>" type="button" class="btn btn-primary btn-lg btn-block">Ver perfil Pyme &rarr;</a>
                                       <?php
                                       } else {
                                       ?>
                                          <a href="pyme.php?id=<?php echo $id_pyme; ?>" type="button" class="btn btn-primary btn-lg btn-block">Ver perfil Pyme &rarr;</a>
                                       <?php
                                       }
                                       ?>
                                    </div>
                                 </div>


                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            <?php
            }
            ?>

         </div>
         <!-- /.row -->
      </div>
      <hr>
   <?php
   }
   ?>

   <!-- Get In Touch Now Section -->
   <div class="row mb-4">
      <div class="col-md-8">
         <p>En Ñubletur puedes dar a conocer tus eventos y promocionarlos, ¿Tienes una Pyme?, aquí puedes enseñar
            de que se trata y publicar tus productos. Haz clic en el siguiente boton para saber más.
         </p>
      </div>
      <div class="col-md-4">
         <a class="btn btn-lg btn-secondary btn-block" href="ñubletur.php">Conoce más sobre Ñubletur</a>
      </div>
   </div>
</div>
<!-- /.container -->


<?php
include("footer.php");
?>

<script>
   [...document.getElementsByClassName("max")].forEach(function(e) {

      e.innerHTML = e.innerHTML.replace(/(.{1,200})(.*)/g, "$1...");

      //e.innerHTML = e.innerHTML.replace(myDiv.text().substring(0,200) + "...");


   })
   /*
      function ellipsis_box(elemento, max_chars) {
         limite_text = $(elemento).text();
         if (limite_text.length > max_chars) {
            limite = limite_text.substr(0, max_chars) + " ...";
            $(elemento).text(limite);
         }
      }
      $(function() {
         ellipsis_box(".max", 200);
      });
      
*/
   //var myDiv = $('.max'); myDiv.text(myDiv.text().substring(0,200) + "..."); 
</script>
<script>
   (function() {
      $(function() {
         $('#btn-ventana').on('click', function() {
            $('#ventana-modal').modal();
         });
      });
   }());
</script>