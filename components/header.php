<!-- it-offcanvus-area-start -->
<div class="it-offcanvas-area">
    <div class="itoffcanvas">
        <div class="itoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="itoffcanvas__logo">
            <a href="index.php">
                <img src="assets/img/logo/logo-2.png" alt="">
            </a>
        </div>
        <div class="itoffcanvas__text">
            <p>Suspendisse interdum consectetur libero id. Fermentum leo vel orci porta non. Euismod viverra nibh
                cras pulvinar suspen.</p>
        </div>
        <div class="it-menu-mobile d-xl-none"></div>
        <div class="itoffcanvas__info">
            <h3 class="offcanva-title">Get In Touch</h3>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
                <div class="itoffcanvas__info-icon">
                    <a href="#"><i class="fal fa-envelope"></i></a>
                </div>
                <div class="itoffcanvas__info-address">
                    <span>Email</span>
                    <a href="maito:hello@yourmail.com">hello@yourmail.com</a>
                </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
                <div class="itoffcanvas__info-icon">
                    <a href="#"><i class="fal fa-phone-alt"></i></a>
                </div>
                <div class="itoffcanvas__info-address">
                    <span>Phone</span>
                    <a href="tel:(00)45611227890">(00) 456 1122 7890</a>
                </div>
            </div>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
                <div class="itoffcanvas__info-icon">
                    <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                </div>
                <div class="itoffcanvas__info-address">
                    <span>Location</span>
                    <a href="htits://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Riverside 255,
                        San Francisco, USA </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body-overlay"></div>
<!-- it-offcanvus-area-end -->

<header>
    <!-- header-area-start -->
    <div id="header-sticky" class="it-header-area pg-header-style p-relative dt-header-style it-header-transparent it-header-ptb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-6">
                    <div class="it-header-logo">
                        <a href="index.php"><img src="assets/img/logo/logo-2.png" alt="">
                            <h2>Carteon</h2>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 d-none d-xl-block">
                    <div class="it-header-menu it-dropdown-menu">
                        <nav class="it-menu-content">
                            <ul class="it-onepage-menu">
                                <li class="p-static has-dropdown-2">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="index.php#feature">Feature</a>
                                </li>
                                <li>
                                    <a href="index.php#service">Service</a>
                                </li>
                                <li>
                                    <a href="index.php#pricing">Pricing</a>
                                </li>
                                <li>
                                    <a href="index.php#faq">Faq</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-6">
                    <div class="it-header-right-action d-flex justify-content-end align-items-center">
                        <div class="it-header-search-box d-none d-md-block d-flex align-items-center mr-25">
                            <a class="border-line-white" href="<?php echo isset($auth_link) ? $auth_link : 'signin.php'; ?>" id="auth-link"><?php echo isset($auth_text) ? $auth_text : 'Log In'; ?></a>
                        </div>
                        <a href="contact-v1.html" class="pg-btn d-none d-lg-block">
                            Get Started
                        </a>
                        <div class="it-header-bar d-xl-none">
                            <button class="it-menu-bar">
                                <span>
                                    <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10 18.3333C10 17.4128 10.7462 16.6667 11.6667 16.6667H21.6667C22.5872 16.6667 23.3333 17.4128 23.3333 18.3333C23.3333 19.2538 22.5872 20 21.6667 20H11.6667C10.7462 20 10 19.2538 10 18.3333ZM0 1.66667C0 0.746183 0.746183 0 1.66667 0H21.6667C22.5872 0 23.3333 0.746183 23.3333 1.66667C23.3333 2.58713 22.5872 3.33333 21.6667 3.33333H1.66667C0.746183 3.33333 0 2.58713 0 1.66667ZM0 10C0 9.07953 0.746183 8.33333 1.66667 8.33333H21.6667C22.5872 8.33333 23.3333 9.07953 23.3333 10C23.3333 10.9205 22.5872 11.6667 21.6667 11.6667H1.66667C0.746183 11.6667 0 10.9205 0 10Z"
                                            fill="currentcolor" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-area-end -->
</header>