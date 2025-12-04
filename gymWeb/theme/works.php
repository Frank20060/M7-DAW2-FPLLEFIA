<?php include './includes/header.php';?>
<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Entrenamientos Destacados</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- project -->
 <section class="mt-4">
  <h1 class="text-center justify-center m-4">Nuestros Trabajos</h1>
  <?php
    include_once './db/consultas/dbPortfolio.php';
    /// Mostrar las últimas 3 noticias como en el blog principal
    $proyectos = getProyectos();
    echo renderProyectosList($proyectos);
  ?>

  </section>
<!-- /project -->

<!-- call to action -->
<section class="section pb-0">
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
  <div class="row">
    <div class="col-lg-8 offset-lg-1">
      <h2 class="text-gradient-primary">Let's Start With Us!</h2>
      <p class="h4 font-weight-bold text-white mb-4">Lorem ipsum dolor sit amet, magna habemus ius ad</p>
      <a href="./contact.php" class="btn btn-lg btn-primary">Let’s talk</a>
    </div>
  </div>
</div>
</section>
<!-- /call to action -->

<!-- clients -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="client-logo-slider d-flex align-items-center">
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-1.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-2.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-3.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-4.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-5.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-1.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-2.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-3.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-4.png" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-4"><img class="d-unset img-fluid" src="images/clients-logo/clients-logo-5.png" alt="client-logo"></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /clients -->

<?php include './includes/footer.php';?>

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>