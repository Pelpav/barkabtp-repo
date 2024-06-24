<?php
// Fonction pour vérifier quelle page est active
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}
?>

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
                <li><a href="index.php" <?php echoActiveClassIfRequestMatches("index"); ?>>Accueil</a></li>
                <li><a href="about.php" <?php echoActiveClassIfRequestMatches("about"); ?>>Qui sommes nous?</a></li>
                <li><a href="services.php" <?php echoActiveClassIfRequestMatches("services"); ?>>Services</a></li>
                <li><a href="portfolio.php" <?php echoActiveClassIfRequestMatches("portfolio"); ?>>Portfolio</a>
                </li>
                <li><a href="blog.php" <?php echoActiveClassIfRequestMatches("blog"); ?>>Blog</a></li>
            </ul>
        </nav>
        <!-- .navbar -->

        <script>
            /**
             * Mobile nav toggle
             */
            const mobileNavShow = document.querySelector('.mobile-nav-show');
            const mobileNavHide = document.querySelector('.mobile-nav-hide');

            document.querySelectorAll('.mobile-nav-toggle').forEach(el => {
                el.addEventListener('click', function(event) {
                    event.preventDefault();
                    mobileNavToogle();
                });
            });

            function mobileNavToogle() {
                document.querySelector('body').classList.toggle('mobile-nav-active');
                mobileNavShow.classList.toggle('d-none');
                mobileNavHide.classList.toggle('d-none');
            }

            /**
             * Toggle mobile nav dropdowns
             */
            const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

            navDropdowns.forEach(el => {
                el.addEventListener('click', function(event) {
                    if (document.querySelector('.mobile-nav-active')) {
                        event.preventDefault();
                        this.classList.toggle('active');
                        this.nextElementSibling.classList.toggle('dropdown-active');

                        let dropDownIndicator = this.querySelector('.dropdown-indicator');
                        dropDownIndicator.classList.toggle('bi-chevron-up');
                        dropDownIndicator.classList.toggle('bi-chevron-down');
                    }
                });
            });
        </script>

    </div>
</header><!-- End Header -->