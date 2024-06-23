<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BarkaBTP - Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


  <script src="assets/js/portfolio-data.json"></script>
</head>



<body class="page-portfolio">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
      </a>


      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="about.php">Qui sommes nous?</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="portfolio.php" class="active">Portfolio</a></li>
          <li><a href="blog.php">Blog</a></li>


        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

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
            <li data-filter=".filter-architecture">Architecture</li>
            <!-- <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li> -->
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300" id="portfolio-container">
            <!-- Les éléments du portfolio seront ajoutés ici par JavaScript -->
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
            <p>Profitez de notre ingéniosité dans le domaine de la construction et obtenez grâce à nous des plans
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

  <script>
    // Le JSON contenant les éléments du portfolio
    const portfolioItems = [
      {
        "category": "architecture",
        "title": "Garage Moderne",
        "description": "Un design de garage moderne avec une allée pavée et une voiture de luxe.",
        "image": "assets/img/portfolio/design-4.png",
      },
      {
        "category": "architecture",
        "title": "Maison Moderne",
        "description": "Une maison moderne avec un design élégant, des jardins fleuris et une terrasse en carreaux.",
        "image": "assets/img/portfolio/design-1.png",
      },
      {
        "category": "architecture",
        "title": "Maison Grise",
        "description": "Un design de maison avec des éléments modernes et une palette de couleurs grises.",
        "image": "assets/img/portfolio/design-2.png",
      },
      {
        "category": "architecture",
        "title": "Cours Extérieur",
        "description": "Un espace extérieur bien aménagé avec un chemin pavé et une entrée élégante.",
        "image": "assets/img/portfolio/design-3.png",
      },
    ];


    // Sélection du conteneur du portfolio
    const portfolioContainer = document.getElementById('portfolio-container');

    // Parcourir le JSON et générer les éléments du portfolio
    portfolioItems.forEach(item => {
      const portfolioItem = document.createElement('div');
      portfolioItem.classList.add('col-lg-4', 'col-md-6', 'portfolio-item', `filter-${item.category}`);

      portfolioItem.innerHTML = `
      <img src="${item.image}" class="img-fluid" alt="${item.title}">
      <div class="portfolio-info">
        <h4>${item.title}</h4>
        <p>${item.description}</p>
        <a href="${item.image}" title="${item.title}" data-gallery="portfolio-gallery-${item.category}" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
      </div>
    `;

      portfolioContainer.appendChild(portfolioItem);
    });
  </script>


</body>

</html>