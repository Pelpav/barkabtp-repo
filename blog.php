<?php require_once('layout/head.php'); ?>


<body class="page-blog">

    <?php require_once('layout/header.php'); ?>


    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>Blog</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Blog</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">

                        <div class="row gy-5 posts-list">

                            <?php
                            // Charger les données du fichier JSON
                            $json_data = file_get_contents('assets/data/blog.json');
                            $blogItems = json_decode($json_data, true);

                            // Trier les éléments par ordre de création
                            usort($blogItems, function ($a, $b) {
                                return strtotime($b['createdAt']) - strtotime($a['createdAt']);
                            });

                            // Pagination
                            $itemsPerPage = 6;
                            $totalItems = count($blogItems);
                            $totalPages = ceil($totalItems / $itemsPerPage);

                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                            $startIndex = ($currentPage - 1) * $itemsPerPage;
                            $endIndex = $startIndex + $itemsPerPage;



                            // Afficher les détails des blogs pour la page actuelle
                            for ($i = $startIndex; $i < $endIndex && $i < $totalItems; $i++) {

                                $item = $blogItems[$i];
                                // Afficher un extrait limité du contenu
                                $excerpt = substr($item['description'], 0, 200); // Limite à 200 caractères
                                echo '<div class="col-lg-6">';
                                echo '<article class="d-flex flex-column">';
                                echo '<div class="post-img">';
                                echo '<img src="' . $item['image'] . '" alt="" class="img-fluid">';
                                echo '</div>';
                                echo '<h2 class="title"><a  href="blog-details.php?id=' . $item['id'] . '">' . $item['title'] . '</a></h2>';
                                echo '<div class="meta-top">';
                                echo '<ul>';
                                echo '<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.php"> ' . $item['author'] . '</a></li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '<div class="content">';
                                echo '<p>' . $excerpt . '</p>';
                                echo '</div>';
                                echo '<div class="read-more mt-auto align-self-end">';
                                echo '<a href="blog-details.php?id=' . $item['id'] . '">Lire la suite <i class="bi bi-arrow-right"></i></a>';
                                echo '</div>';
                                echo '</article>';
                                echo '</div>';
                            }

                            // Afficher la pagination
                            echo '<div class="blog-pagination">';
                            echo '<ul class="justify-content-center">';
                            for ($page = 1; $page <= $totalPages; $page++) {
                                echo '<li ' . ($page == $currentPage ? 'class="active"' : '') . '><a href="?page=' . $page . '">' . $page . '</a></li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                            ?>

                        </div>

                    </div>

                </div>
        </section><!-- End Blog Section -->

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
    <!-- End Footer -->
    <!-- End Footer -->


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