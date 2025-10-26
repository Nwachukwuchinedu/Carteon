<?php
// checkout.php - Modernized Checkout
require_once 'utils/config.php';

// Process form submission and card data (existing logic)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $cardId = isset($_POST['card_id']) ? intval($_POST['card_id']) : 1;

    $errors = array();
    if (empty($name)) $errors[] = 'Name is required';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required';
    if (empty($phone)) $errors[] = 'Phone number is required';
    if (empty($address)) $errors[] = 'Address is required';

    if (empty($errors)) {
        $success = 'Thank you for your order, ' . htmlspecialchars($name) . '! We will contact you shortly.';
    }
}

$cardId = isset($_GET['card']) ? intval($_GET['card']) : 1;
$cards = array(
    1 => array('name' => 'Metal Elite Card', 'price' => '₦12,000', 'description' => 'Premium metal finish with advanced NFC'),
    2 => array('name' => 'PVC Classic Card', 'price' => '₦8,500', 'description' => 'Durable PVC with reliable NFC'),
    3 => array('name' => 'PVC White Card', 'price' => '₦8,500', 'description' => 'Clean white PVC design'),
    4 => array('name' => 'Wood Craft Card', 'price' => '₦10,500', 'description' => 'Natural wood with eco-friendly appeal')
);
$selectedCard = isset($cards[$cardId]) ? $cards[$cardId] : $cards[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = 'Checkout';
    $page_description = 'Complete your order for ' . COMPANY_NAME . ' smart business cards.';
    include 'components/head.php';
    ?>
</head>

<body data-theme="<?php echo get_theme(); ?>">
    <?php include 'components/header.php'; ?>

    <section class="checkout-section">
        <div class="container">
            <div class="checkout-container">
                <div class="checkout-header" data-scroll>
                    <h1 class="h2">Complete Your Order</h1>
                    <p>You're just a few steps away from your smart business card</p>
                </div>

                <div class="checkout-grid">
                    <!-- Order Summary -->
                    <div class="order-summary" data-scroll>
                        <h3>Order Summary</h3>
                        <div class="summary-card">
                            <div class="card-preview-small">
                                <div class="card-image">
                                    <img src="assets/images/card<?php echo $cardId; ?>.jpg" alt="<?php echo $selectedCard['name']; ?>">
                                </div>
                                <div class="card-details">
                                    <h4><?php echo $selectedCard['name']; ?></h4>
                                    <p class="card-description"><?php echo $selectedCard['description']; ?></p>
                                    <div class="card-price"><?php echo $selectedCard['price']; ?></div>
                                </div>
                            </div>

                            <div class="order-features">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>NFC Technology</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>QR Code Backup</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Digital Profile</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Free Shipping</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Checkout Form -->
                    <div class="checkout-form-container" data-scroll>
                        <h3>Shipping Information</h3>

                        <?php if (isset($success)): ?>
                            <div class="alert success">
                                <p><?php echo $success; ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($errors) && !empty($errors)): ?>
                            <div class="alert error">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="checkout.php?card=<?php echo $cardId; ?>" class="checkout-form">
                            <input type="hidden" name="card_id" value="<?php echo $cardId; ?>">

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Shipping Address</label>
                                <textarea id="address" name="address" rows="3" required><?php echo isset($address) ? htmlspecialchars($address) : ''; ?></textarea>
                            </div>

                            <button type="submit" class="cta-button primary fullwidth btn-icon">
                                <i class="fas fa-check"></i>
                                <span>Complete Order</span>
                            </button>
                        </form>
                    </div>
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