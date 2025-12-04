<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>BlackPeak Fitness</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- theme meta -->
  <meta name="theme-name" content="agen" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="./plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="./plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="./plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="./plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="./plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="./css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./images/favicon.ico" type="image/x-icon">

</head>

<body>

<header class="navigation fixed-top bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="./index.php"><h2 class="text-white">BlackPeak</h2></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">Pages</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="./blog.php">Noticias</a>
            <a class="dropdown-item" href="./works.php">Portfolio</a>
            <a class="dropdown-item" href="./testimonios.php">Testimonios</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./contact.php">Contacto</a>
        </li>

        <?php if (isset($_SESSION['user_id'])): ?>
          <!-- Logueado: opcional enlace al panel + cerrar sesión -->
            <?php if (isset($_SESSION['usuario']) && $_SESSION['rol']== 'admin'): ?>
              <li class="nav-item">
                <a class="nav-link" href="./admin.php">Panel</a>
              </li>
            <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Cerrar sesión</a>
          </li>
        <?php else: ?>
          <!-- Sin sesión: iniciar sesión -->
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Iniciar sesión</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>
