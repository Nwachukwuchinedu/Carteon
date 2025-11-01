<?php
$page_title = "Carteon - Checkout";
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
$auth_link = "#";
$auth_text = "Log In";
include 'components/header.php';
?>

<div id="smooth-wrapper">
    <div id="smooth-content">

        <main>

            <!-- checkout-area-start -->
            <div class="pg-checkout-area pt-120 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pg-section-title-box text-center mb-60">
                                <h4 class="pg-section-title it-char-animation">Complete Your Order</h4>
                                <p class="mt-20">You're just a few steps away from your smart business card</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-lg-8">
                            <div class="pg-checkout-form">
                                <div class="pg-checkout-form-box white-bg mb-40">
                                    <h4 class="pg-checkout-form-title mb-30">Shipping Information</h4>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pg-checkout-input mb-25">
                                                    <label for="fullname">Full Name</label>
                                                    <input type="text" id="fullname" placeholder="Enter your full name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pg-checkout-input mb-25">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" id="email" placeholder="Enter your email address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pg-checkout-input mb-25">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="tel" id="phone" placeholder="Enter your phone number">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pg-checkout-input mb-25">
                                                    <label for="address">Shipping Address</label>
                                                    <input type="text" id="address" placeholder="Enter your shipping address">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pg-checkout-input mb-25">
                                                    <label for="notes">Order Notes (Optional)</label>
                                                    <textarea id="notes" placeholder="Any special instructions for your order"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="pg-checkout-summary white-bg ml-15">
                                <h4 class="pg-checkout-form-title mb-30">Order Summary</h4>

                                <div class="pg-checkout-product mb-30">
                                    <div class="pg-checkout-product-thumb">
                                        <img id="product-image" src="assets/img/cards/card1.jpg" alt="Product Image">
                                    </div>
                                    <div class="pg-checkout-product-content">
                                        <h5 id="product-title" class="pg-checkout-product-title">PVC Classic Card</h5>
                                        <p id="product-description" class="pg-checkout-product-desc">Durable PVC with reliable NFC</p>
                                        <div class="pg-checkout-product-features mt-15">
                                            <ul id="product-features">
                                                <li><i class="fas fa-check-circle"></i> NFC Technology</li>
                                                <li><i class="fas fa-check-circle"></i> QR Code Backup</li>
                                                <li><i class="fas fa-check-circle"></i> Digital Profile</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="pg-checkout-pricing mb-30">
                                    <div class="pg-checkout-price-item d-flex justify-content-between mb-15">
                                        <span>Subtotal</span>
                                        <span id="product-price">₦8,500</span>
                                    </div>
                                    <div class="pg-checkout-price-item d-flex justify-content-between mb-15">
                                        <span>Shipping</span>
                                        <span>Free</span>
                                    </div>
                                    <div class="pg-checkout-price-item d-flex justify-content-between mb-15">
                                        <span>Tax</span>
                                        <span>₦0</span>
                                    </div>
                                    <div class="pg-checkout-total-price d-flex justify-content-between pt-20 border-top">
                                        <span>Total</span>
                                        <span id="total-price" class="fw-bold">₦8,500</span>
                                    </div>
                                </div>

                                <div class="pg-checkout-action">
                                    <a href="#" class="pg-btn theme-3-bg w-100">Complete Order</a>
                                    <div class="pg-checkout-secure mt-20 text-center">
                                        <span><i class="fas fa-lock"></i> Secure Checkout</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout-area-end -->

        </main>

        <footer>
            <?php include 'components/footer.php'; ?>
        </footer>

    </div>
</div>

<?php include 'components/scripts.php'; ?>

<!-- Product selection script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const product = urlParams.get('product');

        // Product data
        const products = {
            'pvc-classic': {
                title: 'PVC Classic Card',
                description: 'Durable PVC with reliable NFC',
                price: '₦8,500',
                image: 'assets/img/cards/card1.jpg',
                features: [
                    'NFC Technology',
                    'QR Code Backup',
                    'Digital Profile'
                ]
            },
            'metal-elite': {
                title: 'Metal Elite Card',
                description: 'Premium metal finish with advanced NFC',
                price: '₦12,000',
                image: 'assets/img/cards/card2.jpg',
                features: [
                    'Premium Metal Finish',
                    'Advanced NFC Chip',
                    'QR Code Backup',
                    'Digital Profile',
                    'Lifetime Warranty'
                ]
            },
            'wood-craft': {
                title: 'Wood Craft Card',
                description: 'Natural wood finish with NFC technology',
                price: '₦10,500',
                image: 'assets/img/cards/card3.jpg',
                features: [
                    'Natural Wood Finish',
                    'NFC Chip Technology',
                    'QR Code Backup',
                    'Digital Profile',
                    'Eco-Friendly'
                ]
            },
            'premium': {
                title: 'Premium Card',
                description: 'Our most advanced card with premium features',
                price: '₦15,000',
                image: 'assets/img/cards/card4.jpg',
                features: [
                    'Premium Materials',
                    'Advanced NFC Chip',
                    'QR Code Backup',
                    'Digital Profile',
                    'Lifetime Warranty',
                    'Priority Support'
                ]
            }
        };

        // Update product information if a valid product is selected
        if (product && products[product]) {
            const productData = products[product];

            // Update product details
            document.getElementById('product-title').textContent = productData.title;
            document.getElementById('product-description').textContent = productData.description;
            document.getElementById('product-image').src = productData.image;
            document.getElementById('product-price').textContent = productData.price;
            document.getElementById('total-price').textContent = productData.price;

            // Update features list
            const featuresList = document.getElementById('product-features');
            featuresList.innerHTML = '';
            productData.features.forEach(feature => {
                const li = document.createElement('li');
                li.innerHTML = '<i class="fas fa-check-circle"></i> ' + feature;
                featuresList.appendChild(li);
            });
        }
    });
</script>

</body>

</html>