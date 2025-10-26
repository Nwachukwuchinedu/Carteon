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
        header('Location: profile');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = 'Login';
    $page_description = 'Login to your ' . COMPANY_NAME . ' account.';
    include 'components/head.php';
    ?>
</head>

<body data-theme="<?php echo get_theme(); ?>">
    <!-- Custom Cursor -->
    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <?php include 'components/header.php'; ?>

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

                    <button type="submit" class="btn primary btn-icon">
                        <i class="fas fa-key"></i>
                        <span>Login</span>
                    </button>
                </form>

                <div class="login-footer">
                    <p>Don't have an account? <a href="index#complimentary-cards">Order a card</a></p>
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