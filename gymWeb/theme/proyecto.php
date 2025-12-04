<?php
include './includes/header.php';
session_start();

if (isset($_GET['id'])) {
    $postId = (int) $_GET['id'];
} else {
    header("Location: ./blog.php");
    exit();
}

include_once './db/consultas/dbPortfolio.php';


?>

<!-- page-title -->
<section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">Trabajos</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page-title -->

<!-- Trabajo -->
<section class="section">
  <?php
    //Mostrar las Trabajoss con sus comentarios
    $Trabajos = getProyectoById($postId);
    echo renderProyectoDetail($Trabajos, $comments);
  ?>
</section>

<!-- BLOG (últimas Trabajoss) -->

<?php
  /// Mostrar las últimas 3 Trabajoss como en el blog principal
  $Trabajoss = getProyectos();
  echo renderProyectosList($Trabajoss);
?>

<section class="section">
  

<?php include './includes/footer.php'; ?>

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
