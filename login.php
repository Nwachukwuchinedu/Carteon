<?php
// Include configuration
require_once 'utils/config.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate form data
    $errors = array();

    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors[] = 'Password is required';
    }

    // If no errors, process login
    if (empty($errors)) {
        // In a real application, you would validate credentials against a database
        // For now, we'll just display a success message
        $success = 'Login successful! Welcome back.';

        // Redirect to profile page after successful login
        // header('Location: profile.php');
        // exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?php echo SITE_TITLE; ?></title>
    <meta name="description" content="Login to your <?php echo COMPANY_NAME; ?> account.">
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

    <header id="page-header">
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="<?php echo COMPANY_NAME; ?> Logo" class="logo-image">
                <span class="logo-text"><?php echo COMPANY_NAME; ?></span>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a href="index.php#how-it-works">How It Works</a></li>
                    <li><a href="index.php#why-choose-us">Why Choose Us</a></li>
                    <li><a href="index.php#cta">Order Card</a></li>
                </ul>
            </nav>
            <div class="theme-toggle">
                <button id="theme-toggle" aria-label="Toggle theme">
                    <span class="sun-icon"><i class="fas fa-sun"></i></span>
                    <span class="moon-icon"><i class="fas fa-moon"></i></span>
                </button>
            </div>
            <div class="mobile-menu-toggle" id="mobile-menu-button" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="mobile-menu" id="mobile-menu">
            <ul>
                <li><a href="index.php#how-it-works">How It Works</a></li>
                <li><a href="index.php#why-choose-us">Why Choose Us</a></li>
                <li><a href="index.php#cta">Order Card</a></li>
                <li class="theme-toggle-mobile">
                    <button id="theme-toggle-mobile" aria-label="Toggle theme">
                        <span class="sun-icon"><i class="fas fa-sun"></i> Light Mode</span>
                        <span class="moon-icon"><i class="fas fa-moon"></i> Dark Mode</span>
                    </button>
                </li>
            </ul>
        </div>
        <div class="mobile-menu-backdrop" id="mobile-menu-backdrop"></div>
    </header>

    <section id="login">
        <div class="container">
            <div class="login-container">
                <h2>Login to Your Account</h2>
                <p>Welcome back! Please enter your details.</p>

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

                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group checkbox-group">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn primary">Login</button>
                </form>

                <div class="login-footer">
                    <p>Don't have an account? <a href="index.php#complimentary-cards">Order a card</a></p>
                </div>
            </div>
        </div>
    </section>

    <footer id="page-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="assets/images/logo.png" alt="<?php echo COMPANY_NAME; ?> Logo" class="footer-logo-image">
                    <h2><?php echo COMPANY_NAME; ?></h2>
                    <p><?php echo COMPANY_TAGLINE; ?></p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <div class="link-column">
                        <h4>Product</h4>
                        <ul>
                            <li><a href="#">Our Cards</a></li>
                            <li><a href="#">How It Works</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                    <div class="link-column">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Contact / Order Now</a></li>
                            <li><a href="#">Shipping Info</a></li>
                        </ul>
                    </div>
                    <div class="link-column">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© <?php echo CURRENT_YEAR; ?> <?php echo COMPANY_NAME; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>

</html>