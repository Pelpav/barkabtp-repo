<?php require_once ('layout/head.php'); ?>


<body class="page-add-item">

    <?php require_once ('layout/header.php'); ?>


    <?php
    // Vérifier si le code est saisi correctement
    $code = isset($_POST['code']) ? $_POST['code'] : '';

    if ($code !== '5002') {
        // Afficher le formulaire de saisie du code
        ?>

        <div style="margin-top: 100px" class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="code">Entrez le code :</label>
                            <input type="password" class="form-control" id="code" name="code" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
    } else {
        // Afficher le contenu complet de la page
        ?>

        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs d-flex align-items-center"
                style="background-image: url('https://digifloat.io/wp-content/uploads/2020/01/Get-Free-Illustrations-Twitter.png');">
                <div class="container position-relative d-flex flex-column align-items-center">

                    <h2>Ajouter un Élément</h2>
                    <ol>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li>Ajouter un Élément</li>
                    </ol>

                </div>
            </div><!-- End Breadcrumbs -->

            <!-- ======= Add Item Section ======= -->
            <section id="add-item" class="add-item">
                <div class="container position-relative" data-aos="fade-up">

                    <div class="row justify-content-center">

                        <div class="col-lg-6">

                            <form id="addItemForm" action="assets/php/ajouterportfolio.php" method="POST"
                                enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="category">Catégorie</label>
                                    <input type="text" class="form-control" id="category" name="category" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required
                                        accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5"
                                        required></textarea>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Ajouter l'Élément</button>

                            </form>

                        </div>


                        <div class="col-lg-6">
                            <!-- Tableau des éléments existants -->
                            <h3>Éléments Actuels</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Catégorie</th>
                                            <th>Titre</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Inclure le fichier PHP pour charger les données du portfolio
                                        include_once 'assets/php/loadportfolio.php';

                                        // Afficher les éléments du portfolio dans le tableau
                                        foreach ($portfolioItems as $item) {
                                            echo '<tr>';
                                            echo '<td>' . ucfirst(htmlspecialchars($item['category'])) . '</td>';
                                            echo '<td>' . htmlspecialchars($item['title']) . '</td>';
                                            echo '<td><img src="' . htmlspecialchars($item['image']) . '" alt="" style="max-width: 100px;"></td>';
                                            echo '<td>' . htmlspecialchars($item['description']) . '</td>';
                                            echo '<td><a href="editportfolio.php?id=' . htmlspecialchars($item['id']) . '">Modifier</a> | <a href="assets/php/deleteportfolio.php?id=' . htmlspecialchars($item['id']) . '">Supprimer</a></td>';
                                            echo '</tr>';
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
    <?php } ?>
</body>

</html>