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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | <?php echo SITE_TITLE; ?></title>
    <meta name="description" content="Your <?php echo COMPANY_NAME; ?> profile page.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <img src="assets/images/profile-default.jpg" alt="Profile Picture" class="profile-image">
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

    <script src="assets/js/main.js"></script>
</body>

</html>