<?php

include("header.php");

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
         <div class="carousel-item active" style="background-image: url('images/slider-01.jpg')">
            <div class="carousel-caption d-none d-md-block">
               <h3>IMAGEN MAPA DE ÑUBLE</h3>
               <p>A Great Theme For Garden Lawn Care</p>
            </div>
         </div>
         <!-- Slide Two - Set the background image for this slide in the line below -->
         <div class="carousel-item" style="background-image: url('images/slider-02.jpg')">
            <div class="carousel-caption d-none d-md-block">
               <h3>IMAGEN MAPA DE ÑUBLE</h3>
               <p>A Great Theme For Garden Lawn Care</p>
            </div>
         </div>
         <!-- Slide Three - Set the background image for this slide in the line below -->
         <div class="carousel-item" style="background-image: url('images/slider-03.jpg')">
            <div class="carousel-caption d-none d-md-block">
               <h3>IMAGEN MAPA DE ÑUBLE</h3>
               <p>A Great Theme For Garden Lawn Care</p>
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
   <div class="services-bar">
      <h1 class="my-4">Los eventos más proximos </h1>
      <!-- Services Section -->
      <div class="row">
         <div class="col-lg-4 mb-4">
            <div class="card h-100">
               <h4 class="card-header">Nombre evento</h4>
               <div class="card-img">
                  <img class="img-fluid" src="images/services-img-03.jpg" alt="" />
               </div>
               <div class="card-body">
                  <h5>Fecha Evento</h5>
                  <p class="card-text">Breve descripción... Breve descripción... Breve descripción...
                     Breve descripción...</p>
               </div>
               <div class="card-footer">
                  <a href="evento.php" class="btn btn-primary">Ver más</a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mb-4">
            <div class="card h-100">
               <h4 class="card-header">Nombre evento</h4>
               <div class="card-img">
                  <img class="img-fluid" src="images/services-img-03.jpg" alt="" />
               </div>
               <div class="card-body">
                  <h5>Fecha Evento</h5>
                  <p class="card-text">Breve descripción... Breve descripción... Breve descripción...
                     Breve descripción...</p>
               </div>
               <div class="card-footer">
                  <a href="evento.php" class="btn btn-primary">Ver más</a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mb-4">
            <div class="card h-100">
               <h4 class="card-header">Nombre evento</h4>
               <div class="card-img">
                  <img class="img-fluid" src="images/services-img-03.jpg" alt="" />
               </div>
               <div class="card-body">
                  <h5>Fecha Evento</h5>
                  <p class="card-text">Breve descripción... Breve descripción... Breve descripción...
                     Breve descripción...</p>
               </div>
               <div class="card-footer">
                  <a href="evento.php" class="btn btn-primary">Ver más</a>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3">
         </div>
         <div class="col-lg-6">
            <a class="btn btn-lg btn-secondary btn-block" href="eventos.php">Ver todos los eventos</a>
         </div>
         <div class="col-lg-3">
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- About Section -->
   <hr>
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
   <hr>
   <div class="portfolio-main">
      <h2>Algunas Pymes que han contribuido a eventos publicados en ñubletur</h2>
      <div class="row">
         <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
               <div class="card-img">
                  <a href="#">
                     <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                     <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
               </div>
               <div class="card-body">
                  <h4 class="card-title">
                     <a href="#">Nombre pyme</a>
                  </h4>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
               <div class="card-img">
                  <a href="#">
                     <img class="card-img-top" src="images/portfolio-img-02.jpg" alt="" />
                     <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
               </div>
               <div class="card-body">
                  <h4 class="card-title">
                     <a href="#">Nombre pyme</a>
                  </h4>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
               <div class="card-img">
                  <a href="#">
                     <img class="card-img-top" src="images/portfolio-img-03.jpg" alt="" />
                     <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
               </div>
               <div class="card-body">
                  <h4 class="card-title">
                     <a href="#">Nombre pyme</a>
                  </h4>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
               <div class="card-img">
                  <a href="#">
                     <img class="card-img-top" src="images/portfolio-img-04.jpg" alt="" />
                     <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
               </div>
               <div class="card-body">
                  <h4 class="card-title">
                     <a href="#">Nombre pyme</a>
                  </h4>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
               <div class="card-img">
                  <a href="#">
                     <img class="card-img-top" src="images/portfolio-img-05.jpg" alt="" />
                     <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
               </div>
               <div class="card-body">
                  <h4 class="card-title">
                     <a href="#">Nombre pyme</a>
                  </h4>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
               <div class="card-img">
                  <a href="#">
                     <img class="card-img-top" src="images/portfolio-img-01.jpg" alt="" />
                     <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                  </a>
               </div>
               <div class="card-body">
                  <h4 class="card-title">
                     <a href="#">Nombre pyme</a>
                  </h4>
               </div>
            </div>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <hr>
   <!-- Get In Touch Now Section -->
   <div class="row mb-4">
      <div class="col-md-8">
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti
            beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
      </div>
      <div class="col-md-4">
         <a class="btn btn-lg btn-secondary btn-block" href="#">Get In Touch Now</a>
      </div>
   </div>
</div>
<!-- /.container -->


<?php
include("footer.php");
?>