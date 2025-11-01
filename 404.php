<?php
$page_title = "Carteon - 404 Error";
include 'components/head.php';
?>

<!-- preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
    </div>
</div>
<!-- preloader end  -->

<div id="magic-cursor">
    <div id="ball"></div>
</div>

<!-- back-to-top-start  -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="far fa-angle-up"></i>
</button>
<!-- back-to-top-end  -->

<?php include 'components/header.php'; ?>

<div id="smooth-wrapper">
    <div id="smooth-content">

        <main>

            <!-- breadcrumb-area-start -->
            <div class="it-breadcrumb-area it-breadcrumb-ptb z-index-1 fix p-relative" data-background="assets/img/breadcrumb/breadcrumb-bg.jpg">
                <div class="it-breadcrumb-thumb">
                    <img src="assets/img/breadcrumb/thumb-1.png" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="it-breadcrumb-content z-index-3">
                                <div class="it-breadcrumb-title-box">
                                    <h3 class="it-breadcrumb-title it-split-text it-split-in-right">404 Error</h3>
                                </div>
                                <div class="it-breadcrumb-list-wrap">
                                    <div class="it-breadcrumb-list">
                                        <span><a href="index.php">home</a></span>
                                        <span class="dvdr">-</span>
                                        <i>404 Error</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- error-area-start -->
            <div class="it-error-area pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-12 col-xl-7 col-lg-7 col-md-9">
                            <div class="it-error-thumb text-center mb-80">
                                <img src="assets/img/error/error.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="it-error-content text-center">
                                <h5 class="it-section-title mb-25 it-split-text it-split-in-right">Oops! That page can't be found.</h5>
                                <p class="mb-35">Oops! The page you are looking for does not exist. It might have <br> been moved or deleted. Please check and try again.</p>
                                <div class="it-fade-anim" data-fade-from="top" data-ease="bounce" data-delay=".5">
                                    <a class="it-btn" href="index.php">
                                        Back To Home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- error-area-end -->

        </main>

        <footer>
            <?php include 'components/footer.php'; ?>
        </footer>

    </div>
</div>

<?php include 'components/scripts.php'; ?>

</body>

</html>

