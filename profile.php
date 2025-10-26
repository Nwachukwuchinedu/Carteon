<?php
// Include configuration
require_once 'utils/config.php';

// Simulate user data (in a real application, this would come from a database)
$userData = array(
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'phone' => '+234 801 234 5678',
    'address' => '123 Main Street, City, State 12345'
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = 'Profile';
    $page_description = 'Your ' . COMPANY_NAME . ' profile page.';
    include 'components/head.php';
    ?>
</head>

<body data-theme="<?php echo get_theme(); ?>">
    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <?php include 'components/header.php'; ?>

    <section id="profile">
        <div class="container">
            <h2>Your Profile</h2>
            <div class="profile-container">
                <div class="profile-header">
                    <div class="profile-image-container">
                        <div class="profile-image-placeholder">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="edit-overlay">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                    <h3><?php echo htmlspecialchars($userData['name']); ?></h3>
                </div>

                <div class="profile-details">
                    <div class="detail-item">
                        <label>Name:</label>
                        <span><?php echo htmlspecialchars($userData['name']); ?></span>
                    </div>

                    <div class="detail-item">
                        <label>Email:</label>
                        <span><?php echo htmlspecialchars($userData['email']); ?></span>
                    </div>

                    <div class="detail-item">
                        <label>Phone:</label>
                        <span><?php echo htmlspecialchars($userData['phone']); ?></span>
                    </div>

                    <div class="detail-item">
                        <label>Address:</label>
                        <span><?php echo htmlspecialchars($userData['address']); ?></span>
                    </div>
                </div>

                <div class="qr-code-section">
                    <h3>Your QR Code</h3>
                    <div class="qr-code-container">
                        <div class="qr-code-placeholder">
                            <i class="fas fa-qrcode"></i>
                            <p>QR Code</p>
                        </div>
                    </div>
                    <p class="qr-description">Scan this QR code to share your contact information instantly</p>
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