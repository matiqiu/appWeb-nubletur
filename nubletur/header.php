<?php
   $variable =$_SERVER['PHP_SELF'];
   $variable=basename($variable);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Ñubletur </title>
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Fontawesome CSS -->
   <link href="css/all.css" rel="stylesheet">
   <!-- Custom styles for this template -->
   <link href="css/style.css" rel="stylesheet">

</head>

<body>
   <!-- Navigation -->
   <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light top-nav fixed-top">
      <div class="container">
         <a class="navbar-brand" href="index.php">
            <img src="images/logo ñuble.png" width="150" height="70" alt="logo" />
         </a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link <?php if($variable=='index.php'){echo'active';} ?>" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if($variable=='about.php'){echo'active';} ?>"  href="about.php">About</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="services.php">Services</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
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
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     Blog
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                     <a class="dropdown-item" href="blog-home-1.php">Blog Home 1</a>
                     <a class="dropdown-item" href="blog-home-2.php">Blog Home 2</a>
                     <a class="dropdown-item" href="blog-post.php">Blog Post</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     Pages
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                     <a class="dropdown-item" href="faq.php">FAQ</a>
                     <a class="dropdown-item" href="404.php">404</a>
                     <a class="dropdown-item" href="pricing.php">Pricing Table</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     Iniciar sesión
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                     <a class="dropdown-item" href="faq.php">Organizador de eventos</a>
                     <a class="dropdown-item" href="404.php">Pyme</a>
                     <a class="dropdown-item" href="login.php">Público</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle <?php if($variable=='registro.php'){echo'active';} ?>" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     Registrarse
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                     <a class="dropdown-item" href="faq.php">Organizador de eventos</a>
                     <a class="dropdown-item" href="404.php">Pyme</a>
                     <a class="dropdown-item" href="registro.php">Público</a>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </nav>