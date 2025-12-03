<?php include './includes/header.php';?>
<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Blog y Noticias</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

  <?php
    include_once './db/consultas/dbNoticias.php';
    $noticiasTres = getNoticias();
    $i = 0;
  ?>


<!-- blog -->
<section class="section">
  <div class="row g-4 justify-content-center">
    <?php foreach ($noticiasTres as $noticia) { $i++?>
      <div class="col-12 col-md-6 col-lg-4 id="noticia-<?php echo $i; ?>">
        <article class="card h-100 border-0 shadow-sm">
          <img src="<?php echo $noticia['imagen']; ?>" alt="post-thumb" class="card-img-top">
          <div class="card-body">
            <time class="d-block small text-muted mb-2">
              <?php echo $noticia['fecha_publicacion']; ?>
            </time>
            <a href="./blog-single.php?id=<?php echo (int)$noticia['id']; ?>" class="h5 card-title d-block mb-3 text-dark text-decoration-none">
              <?php echo $noticia['titulo']; ?>
            </a>
            <a href="./blog-single.php?id=<?php echo (int)$noticia['id']; ?>" class="btn btn-outline-primary btn-sm">
              Read more
            </a>
          </div>
        </article>
      </div>
    <?php } ?>
  </div> 
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