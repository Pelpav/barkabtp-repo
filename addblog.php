<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ajouter un Élément - BARKA BTP</title>
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
</head>

<body class="page-add-item">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="about.php">Qui sommes-nous?</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="addblog.php" class="active">Ajouter un Élément</a></li>
                </ul>
            </nav>
            <!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url('assets/img/contact-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>Ajouter un Élément</h2>
                <ol>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li>Ajouter un Élément</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Add Item Section ======= -->
        <section id="add-item" class="add-item">
            <div class="container position-relative" data-aos="fade-up">

                <div class="row justify-content-center">

                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="author">Auteur</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                required></textarea>
                        </div>

                        <button id="addBtn" class="btn btn-primary">Ajouter l'Article</button>

                    </div>

                </div>

            </div>
        </section><!-- End Add Item Section -->

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
                            <li><i class="bi bi-dash"></i> <a href="blog.php">Blog</a></li>
                            <li><i class="bi bi-dash"></i> <a href="portfolio.php">Portfolio</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Nos Services</h4>
                        <ul>
                            <li><i class="bi bi-dash"></i> <a href="#">Construction Résidentielle</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Construction Commerciale</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Rénovation</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Consultation</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Design Intérieur</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contactez-nous</h4>
                        <p>
                            Rue de la Construction <br>
                            Bamako, BP 12345<br>
                            Mali <br><br>
                            <strong>Téléphone:</strong> +223 20 20 20 20<br>
                            <strong>Email:</strong> contact@barkabtp.ml<br>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Barka BTP</span></strong>. Tous droits réservés
                </div>
                <div class="credits">
                    Conçu par <a href="https://.com/"></a>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/blog.js"></script>
    <script>
        document.getElementById('addBtn').onclick = function () {
            const title = document.getElementById('title').value;
            const imageFile = document.getElementById('image').files[0];
            const author = document.getElementById('author').value;
            const description = document.getElementById('description').value;

            const formData = new FormData();
            formData.append('title', title);
            formData.append('image', imageFile);
            formData.append('author', author);
            formData.append('description', description);

            fetch('http://localhost:3001/barkabtp-repo/blog', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Article ajouté:', data);
                    loadBlog(); // Recharger la liste des articles après ajout
                    resetForm(); // Réinitialiser le formulaire si nécessaire
                })
                .catch(error => console.error('Error adding article:', error));
        };
    </script>

</body>


</html>