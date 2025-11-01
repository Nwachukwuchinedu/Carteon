<?php
$page_title = "Carteon - Profile";
$custom_css = "
.it-header-logo a {
    font-weight: bold;
    color: white !important;
}

.profile-upload-area {
    position: relative;
    display: inline-block;
    cursor: pointer;
    transition: all 0.3s ease;
}

.profile-upload-area:hover {
    transform: scale(1.05);
}

.profile-upload-icon {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: var(--it-theme-3);
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.profile-upload-icon i {
    font-size: 18px;
}

.qr-code-area {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.qr-code-placeholder {
    width: 200px;
    height: 200px;
    background-color: white;
    border: 2px dashed #ddd;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.qr-code-placeholder i {
    font-size: 48px;
    color: #ddd;
}

.profile-info-item {
    margin-bottom: 25px;
}

.profile-info-label {
    font-weight: 600;
    color: var(--it-common-black);
    margin-bottom: 8px;
    font-size: 16px;
}

.profile-info-value {
    font-size: 16px;
    color: #555;
    padding: 12px 15px;
    background-color: #f8f9fa;
    border-radius: 8px;
    border: 1px solid #e1e1e1;
}

.edit-btn {
    background-color: var(--it-theme-3);
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 500;
    transition: all 0.3s;
}

.edit-btn:hover {
    background-color: #2a7d2e;
    transform: translateY(-2px);
}

.profile-section-title {
    font-size: 24px;
    font-weight: 600;
    color: var(--it-common-black);
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 30px;
}

.profile-section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background-color: var(--it-theme-3);
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
$auth_link = "signin.php";
$auth_text = "Log In";
include 'components/header.php';
?>

<div id="smooth-wrapper">
    <div id="smooth-content">

        <main>

            <!-- profile-area-start -->
            <div class="it-profile-area pt-120 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pg-section-title-box mb-60">
                                <h4 class="pg-section-title it-char-animation">My Profile</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Profile Info Section -->
                        <div class="col-xl-8 col-lg-8">
                            <div class="white-bg mb-40">
                                <h4 class="profile-section-title">Personal Information</h4>

                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <label class="profile-info-label">Full Name</label>
                                                <input type="text" class="profile-info-value" value="John Doe">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <label class="profile-info-label">Email Address</label>
                                                <input type="email" class="profile-info-value" value="john.doe@example.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <label class="profile-info-label">Phone Number</label>
                                                <input type="tel" class="profile-info-value" value="+1 (555) 123-4567">
                                            </div>
                                        </div>





                                    </div>

                                    <div class="mt-30">
                                        <button class="edit-btn" type="submit">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>

                        <!-- Profile Image and QR Code Section -->
                        <div class="col-xl-4 col-lg-4">
                            <div class="white-bg mb-40 text-center">
                                <h4 class="profile-section-title mb-30">Profile Image</h4>

                                <div class="profile-upload-area mx-auto">
                                    <img src="assets/img/user/user.png" alt="Profile Image" class="rounded-circle mb-20" style="width: 150px; height: 150px; object-fit: cover;">
                                    <div class="profile-upload-icon">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                    <input type="file" id="profile-image-upload" class="d-none">
                                </div>

                                <p class="mt-20">Click on the camera icon to upload a new profile image</p>
                            </div>

                            <div class="white-bg">
                                <h4 class="profile-section-title mb-30">Your QR Code</h4>

                                <div class="qr-code-area">
                                    <div class="qr-code-placeholder">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <h5 class="mt-20">Carteon Profile QR</h5>
                                    <p class="mb-20">Scan this QR code to instantly access your profile</p>
                                    <button class="it-btn">
                                        <i class="fas fa-download"></i> Download QR Code
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile-area-end -->

        </main>

        <div class="mb-100"></div>

        <footer class="mt-50">
            <?php include 'components/footer.php'; ?>
        </footer>

    </div>
</div>

<?php include 'components/scripts.php'; ?>

<!-- Profile Image Upload Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileUploadArea = document.querySelector('.profile-upload-area');
        const profileImageUpload = document.getElementById('profile-image-upload');
        const profileImage = profileUploadArea.querySelector('img');

        profileUploadArea.addEventListener('click', function() {
            profileImageUpload.click();
        });

        profileImageUpload.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    profileImage.src = event.target.result;
                }

                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
</script>

</body>

</html>