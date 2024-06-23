<?php require_once ('layout/head.php'); ?>




<body class="page-portfolio">

  <?php require_once ('layout/header.php'); ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
      style="background-image: url('assets/img/portfolio-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Portfolio</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Portfolio</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
          data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <!-- <li data-filter=".filter-architecture" class="">All</li> -->
            <!-- Dynamic generation of filter categories from JSON data -->
            <?php
            require_once ('assets/php/loadportfolio.php');
            // Output filter items
            foreach ($categories as $category) {
              echo '<li data-filter=".filter-' . strtolower($category) . '">' . ucfirst($category) . '</li>';
            }
            ?>
          </ul><!-- End Portfolio Filters -->
          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300" id="portfolio-container">
            <!-- Dynamic generation of portfolio items -->
            <?php
            foreach ($portfolioItems as $item) {
              echo '<div class="col-lg-4 col-md-6 portfolio-item filter-' . strtolower($item['category']) . '">';
              echo '<img src="' . $item['image'] . '" class="img-fluid" alt="' . $item['title'] . '">';
              echo '<div class="portfolio-info">';
              echo '<h4>' . $item['title'] . '</h4>';
              echo '<p>' . $item['description'] . '</p>';
              echo '<a href="' . $item['image'] . '" title="' . $item['title'] . '" data-gallery="portfolio-gallery-' . strtolower($item['category']) . '" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>';
              echo '</div></div>';
            }
            ?>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.php" class="logo d-flex align-items-center">
              <span>Barka BTP</span>
            </a>
            <p>Profitez de notre ingéniosité dans le domaine de la construction et obtenez grâce à nous des
              plans
              modernes, sécurisés et convenables à vos besoins.</p>
            <div class="social-links d-flex  mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Liens Utiles</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Accueil</a></li>
              <li><i class="bi bi-dash"></i> <a href="about.php">À propos</a></li>
              <li><i class="bi bi-dash"></i> <a href="services.php">Services</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Barka BTP</span></strong>. Tous droits réservés
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>