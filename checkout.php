<?php
// Include configuration
require_once 'config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $cardId = isset($_POST['card_id']) ? intval($_POST['card_id']) : 1;
    
    // Validate form data
    $errors = array();
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    
    if (empty($phone)) {
        $errors[] = 'Phone number is required';
    }
    
    if (empty($address)) {
        $errors[] = 'Address is required';
    }
    
    // If no errors, process the order
    if (empty($errors)) {
        // In a real application, you would save the order to a database
        // For now, we'll just display a success message
        $success = 'Thank you for your order, ' . htmlspecialchars($name) . '! We will contact you shortly to confirm your order details.';
        
        // Redirect to profile page after successful submission
        // header('Location: profile.php');
        // exit();
    }
}

// Get card ID from URL parameter
$cardId = isset($_GET['card']) ? intval($_GET['card']) : 1;

// Card information
$cards = array(
    1 => array('name' => 'Metal Card', 'price' => '₦12,000'),
    2 => array('name' => 'PVC Black Card', 'price' => '₦8,500'),
    3 => array('name' => 'PVC White Card', 'price' => '₦8,500'),
    4 => array('name' => 'Wood Card', 'price' => '₦10,500')
);

$selectedCard = isset($cards[$cardId]) ? $cards[$cardId] : $cards[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | <?php echo SITE_TITLE; ?></title>
    <meta name="description" content="Checkout for your <?php echo COMPANY_NAME; ?> digital business card.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-theme="<?php echo get_theme(); ?>">
    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <?php include 'includes/header.php'; ?>

    <section id="checkout">
        <div class="container">
            <h2>Checkout</h2>
            <div class="checkout-container">
                <div class="order-summary">
                    <h3>Order Summary</h3>
                    <div class="card-summary">
                        <div class="card-image">
                            <img src="images/card<?php echo $cardId; ?>.jpg" alt="<?php echo $selectedCard['name']; ?>">
                        </div>
                        <div class="card-details">
                            <h4><?php echo $selectedCard['name']; ?></h4>
                            <p class="card-price"><?php echo $selectedCard['price']; ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="checkout-form">
                    <h3>Billing Information</h3>
                    
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
                    
                    <form method="POST" action="checkout.php?card=<?php echo $cardId; ?>">
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
                        
                        <button type="submit" class="btn primary">Complete Order</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/main.js"></script>
</body>
</html>