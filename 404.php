<?php
// 404.php - Custom 404 Error Page
require_once 'utils/config.php';
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = 'Page Not Found';
    $page_description = 'The page you are looking for could not be found on ' . COMPANY_NAME . '.';
    include 'components/head.php';
    ?>
</head>

<body data-theme="<?php echo get_theme(); ?>">
    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <?php include 'components/header.php'; ?>

    <section id="error-404">
        <div class="container">
            <div class="error-container">
                <div class="error-badge">
                    <span>404 Error</span>
                </div>

                <h1 class="error-title">Page Not Found</h1>

                <p class="error-description">
                    Oops! The page you're looking for doesn't exist or has been moved.
                    Don't worry, we'll get you back on track.
                </p>

                <div class="error-actions">
                    <a href="index.php" class="cta-button primary btn-icon">
                        <i class="fas fa-home"></i>
                        <span>Back to Home</span>
                    </a>
                    <a href="index.php#pricing" class="cta-button secondary btn-icon">
                        <i class="fas fa-id-card"></i>
                        <span>Get Your Card</span>
                    </a>
                </div>

                <div class="error-search">
                    <p>Or try searching for what you need:</p>
                    <form action="index.php" method="GET" class="search-form">
                        <input type="text" name="search" placeholder="Search..." aria-label="Search">
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'components/footer.php'; ?>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/three-effects.js"></script>
</body>

</html>