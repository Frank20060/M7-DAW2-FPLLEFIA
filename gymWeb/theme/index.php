<?php include './includes/header.php';?>

<!-- banner -->
  <section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
  data-background="./images/banner/banner2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">BlackPeak Fitness</h1>
        <p class="lead text-white">Gimnasio moderno — Entrena más fuerte, supera tus límites</p>
      </div>
    </div>
  </div>
</section>
<!-- /banner -->


<!-- project -->
<section class="section py-5">
  <?php
    include_once './db/consultas/dbTestimonios.php';
    /// Mostrar las últimas 3 noticias como en el blog principal
    $Testimonios = getTreeLatestTestimonios();
    echo renderTestimoniosList($Testimonios);
  ?>
</section>

<!-- /project -->

<!-- call to action -->

<section>
  <div class="container section-sm overlay-secondary-half bg-cover" data-background="./images/backgrounds/cta-bg.jpg">
  <div class="row">
    <div class="col-lg-8 offset-lg-1">
      <h2 class="text-gradient-primary">Empieza hoy con BlackPeak</h2>
      <p class="h4 font-weight-bold text-white mb-4">Reserva una clase de prueba y conoce nuestros planes.</p>
      <a href="./contact.php" class="btn btn-lg btn-primary">Contáctanos</a>
    </div>
  </div>
</div>
</section>
<!-- /call to action -->

<!-- blog -->
<section class="section py-5">
  <?php
    include_once './db/consultas/dbNoticias.php';
    /// Mostrar las últimas 3 noticias como en el blog principal
    $noticias = getTreeLatestNews();
    echo renderNoticiasList($noticias);
  ?>

</section>

<!-- /blog -->

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
