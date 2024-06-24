<?php require_once('layout/head.php'); ?>


<body class="page-blog">

  <?php require_once('layout/header.php'); ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Blog Details</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Blog Details</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">
          <?php
          // Récupérer l'ID du blog à afficher
          if (isset($_GET['id'])) {
            $blogId = $_GET['id'];

            // Charger les données du fichier JSON
            $json_data = file_get_contents('assets/data/blog.json');
            $blogItems = json_decode($json_data, true);

            // Rechercher le blog correspondant à l'ID
            $selectedBlog = null;
            foreach ($blogItems as $blog) {
              if ($blog['id'] === $blogId) {
                $selectedBlog = $blog;
                break;
              }
            }

            // Afficher les détails du blog sélectionné
            if ($selectedBlog) {
              echo '<div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">';
              echo '<article class="blog-details">';
              echo '<div class="post-img">';
              echo '<img width="100%" height="100%" src="' . $selectedBlog['image'] . '" alt="Image du blog" class="img-fluid">';
              echo '</div>';
              echo '<h2 class="title">' . $selectedBlog['title'] . '</h2>';
              echo '<div class="meta-top">';
              echo '<ul>';
              echo '<li class="d-flex align-items-center"><i class="bi bi-person"></i> ' . $selectedBlog['author'] . '</li>';
              echo '<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="' . $selectedBlog['createdAt'] . '">' . $selectedBlog['createdAt'] . '</time></li>';
              echo '</ul>';
              echo '</div>';
              echo '<div class="content">';
              echo '<p>' . $selectedBlog['description'] . '</p>';
              echo '</div>';
              echo '</article>';
              echo '</div>';
            } else {
              echo 'Blog non trouvé.';
            }
          } else {
            echo 'ID du blog non spécifié.';
          }
          ?>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->



  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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