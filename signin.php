<?php
$page_title = "Carteon - Sign In";
$custom_css = "
.it-header-logo a {
    font-weight: bold;
    color: white !important;
}

.it-btn {
    background-color: var(--it-theme-3) !important;
    border-color: var(--it-theme-3) !important;
}

.it-btn:hover {
    background-color: #2a7d2e !important;
    border-color: #2a7d2e !important;
}";
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

<?php
$auth_link = "profile.php";
$auth_text = "My Profile";
include 'components/header.php';
?>

<div id="smooth-wrapper">
    <div id="smooth-content">

        <main>

            <!-- signin-area-start -->
            <div class="it-signup-area pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="it-signup-bg">
                                <div class="it-signup-shape-1">
                                    <img src="assets/img/shape/signup-1-1.png" alt="">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="it-signup-thumb">
                                            <img src="assets/img/signup/signup-1-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="it-signup-wrap">
                                            <h4 class="it-signup-title">Welcome Back</h4>
                                            <span>Sign in to continue your smart networking experience</span>

                                            <form action="#" class="it-signup-form mt-40">
                                                <div class="it-signup-input mb-20">
                                                    <span class="it-signup-input-icon">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13 16.5H5C3 16.5 1.5 15 1.5 13V5C1.5 3 3 1.5 5 1.5H13C15 1.5 16.5 3 16.5 5V13C16.5 15 15 16.5 13 16.5Z" stroke="#5F6168" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M13 5.49951L9.86997 7.99951C9.16997 8.55951 8.02997 8.55951 7.32997 7.99951L4.20997 5.49951" stroke="#5F6168" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <input type="email" placeholder="Email Address">
                                                </div>
                                                <div class="it-signup-input mb-20">
                                                    <span class="it-signup-input-icon">
                                                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.5 7.67V5.5C14.5 2.5 13 1 10 1H6C3 1 1.5 2.5 1.5 5.5V14.5C1.5 17.5 3 19 6 19H10.5" stroke="#5F6168" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.5 7.67V16.5C14.5 17.5 13.9 18.5 13 18.5H11.5C10.6 18.5 10 17.5 10 16.5V14.5C10 13.5 10.6 12.5 11.5 12.5H14.5" stroke="#5F6168" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M14.5 12.5H12.5C11.7 12.5 11 11.8 11 11V9C11 8.2 11.7 7.5 12.5 7.5H14.5V12.5Z" stroke="#5F6168" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.5 10C6.32843 10 7 9.32843 7 8.5C7 7.67157 6.32843 7 5.5 7C4.67157 7 4 7.67157 4 8.5C4 9.32843 4.67157 10 5.5 10Z" stroke="#5F6168" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <input type="password" placeholder="Password">
                                                </div>
                                                <div class="it-signup-agree it-checkbox-item mb-25">
                                                    <div class="it-signup-forget d-flex justify-content-between">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="it-signup-btn mb-30">
                                                    <button class="it-btn w-100" type="submit">Sign In</button>
                                                </div>
                                                <div class="it-signup-text">
                                                    <span>Don't have an account? <a href="signup.html">Sign Up</a></span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- signin-area-end -->

        </main>

        <footer>
            <?php include 'components/footer.php'; ?>
        </footer>

    </div>
</div>

<?php include 'components/scripts.php'; ?>

</body>

</html>