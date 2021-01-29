<!--footer starts from here-->
<footer class="footer">
   <div class="container bottom_border">
      <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Contactanos</h5>
            <!--headin5_amrc-->
            <ul class="footer_ul2_amrc">
               <li>
                  <p class="mb10">Puedes contactarnos escribiendonos por <a href="contact.php">Aquí.</a>
                     O directamente usando alguno de los siguientes tipo de contactos:</p>
               </li>
            </ul>
            <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
            <p><i class="fa fa-phone"></i> +56-999987837 </p>
            <p><i class="fa fa fa-envelope"></i> nubletur@gmail.com </p>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col">
            <h5 class="headin5_amrc col_white_amrc pt2">Siguenos</h5>
            <!--headin5_amrc ends here-->
            <ul class="footer_ul2_amrc">
               <li>
                  <a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
                  <p>Lorem Ipsum is simply dummy printing...<a href="#">https://www.ñubletur.cl/</a></p>
               </li>
               <li>
                  <a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
                  <p>Lorem Ipsum is simply dummy printing...<a href="#">https://www.ñubletur.cl/</a></p>
               </li>
               <li>
                  <a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
                  <p>Lorem Ipsum is simply dummy printing...<a href="#">https://www.ñubletur.cl/</a></p>
               </li>
            </ul>
            <!--footer_ul2_amrc ends here-->
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <h5 class="headin5_amrc col_white_amrc pt2">Ñubletur</h5>
            <!--headin5_amrc-->
            <ul class="footer_ul_amrc">
               <li><a href="ñubletur.php">Historia</a></li>
               <li><a href="ñubletur.php">¿Qué es?</a></li>
               <li><a href="ñubletur.php">¿Cómo nació?</a></li>
               <li><a href="ñubletur.php">¿Qué es Ñuble? </a></li>
               <li><a href="ñubletur.php">¿Quienes somos?</a></li>
               <li><a href="ñubletur.php">Algunos servicios</a></li>
            </ul>
            <!--footer_ul_amrc ends here-->
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 ">
            <h5 class="headin5_amrc col_white_amrc pt2">Eventos pasados</h5>
            <!--headin5_amrc-->
            <ul class="footer_ul_amrc">
            <!--
               <?php
/*
               $stmt8 = select3EventosPasados();
               $cuantas_rows8 = $stmt8->rowCount();
               //$fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);

               while ($fila8 = $stmt8->fetch(PDO::FETCH_ASSOC)) {
                  $nombre_evento = $fila8['nombre_evento'];
                  $dia_inicio = $fila8['dia_inicio'];
               ?>
                  <li class="media">
                     <div class="media-left">
                        <?php

                        if (file_exists('fotos-eventos/' . $fila8["id_evento"])) {
                        ?>
                           <img class="img-fluid" src="<?php echo 'fotos-eventos/' . $fila8["id_evento"]; ?>">
                        <?php
                        }
                        ?>
                     </div>
                     <div class="media-body">
                        <p><?php echo $nombre_evento; ?></p>
                        <span><?php echo $dia_inicio; ?></span>
                     </div>
                  </li>
               <?php
               }
               */
               ?>
               -->
            </ul>
            <!--footer_ul_amrc ends here-->
         </div>
      </div>
   </div>
   <div class="container">
      <div class="footer-logo">
         <a href="index.php"><img src="images/ñuble/logo4.png" width="200" height="80" alt="" /></a>
      </div>
      <!--foote_bottom_ul_amrc ends here-->
      <p class="copyright text-center">Algunos derechos reservados. &copy; 2021 <a href="#">Virginio Gómez</a> Desarrollado por: <a href="">Estudiantes</a>
      </p>
      <ul class="social_footer_ul">
         <li><a href="https://web.facebook.com/%C3%91ubletur-102650338462282" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
         <li><a href="https://www.instagram.com/nubletur/" target="_blank"><i class="fab fa-instagram"></i></a></li>
      </ul>
      <!--social_footer_ul ends here-->
   </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?= $ruta ?>js/jquery.min.js"></script>
<script src="<?= $ruta ?>js/bootstrap.bundle.min.js"></script>

<!-- -->
<script src="<?= $ruta ?>plugins/alertify.min.js"></script>


</body>

</html>