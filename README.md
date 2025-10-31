# Carteon - Smart Contact Sharing Solution

This is a PHP-based website for Carteon, a smart contact sharing solution that allows users to share their contact information instantly using NFC-enabled business cards.

## Project Structure

```
saasty/
├── assets/
│   ├── css/
│   ├── fonts/
│   └── js/
├── components/
│   ├── head.php
│   ├── header.php
│   ├── footer.php
│   └── scripts.php
├── config/
│   └── config.php
├── utils/
│   ├── helpers.php
│   ├── db.php
│   └── contact_handler.php
├── .htaccess
├── init.php
├── index.php
├── signin.php
├── profile.php
├── checkout.php
├── 404.php
└── contact-success.php
```

## Key Features

1. **Reusable Components**: The website uses PHP includes to create reusable components for the head, header, footer, and scripts.
2. **Consistent Design**: All pages maintain a consistent look and feel through the shared components.
3. **Easy Maintenance**: Changes to the header, footer, or other shared elements only need to be made in one place.
4. **SEO Friendly**: Proper meta tags and semantic HTML structure.
5. **Responsive Design**: Fully responsive layout that works on all devices.

## Components

### Head Component (`components/head.php`)

- Contains the DOCTYPE, html tag, and head section
- Dynamically sets the page title
- Includes all CSS files
- Supports custom CSS for specific pages

### Header Component (`components/header.php`)

- Contains the navigation bar
- Includes the off-canvas menu
- Dynamic authentication link (sign in/my profile)

### Footer Component (`components/footer.php`)

- Contains the footer content
- Consistent across all pages

### Scripts Component (`components/scripts.php`)

- Includes all JavaScript files
- Supports custom JavaScript for specific pages

## Utility Functions (`utils/helpers.php`)

- `redirect($url)` - Redirects to a specific page
- `sanitize_input($data)` - Sanitizes user input
- `generate_csrf_token()` - Generates CSRF tokens for form security
- `verify_csrf_token($token)` - Verifies CSRF tokens
- `get_current_page()` - Gets the current page name
- `is_active_page($page)` - Checks if the current page is active
- `format_currency($amount, $currency)` - Formats currency values
- `get_product_details($product_key)` - Gets product details by key

## Configuration (`config/config.php`)

- Session management
- Database configuration constants
- Site configuration constants
- Error reporting settings

## Initialization (`init.php`)

- Includes the configuration file
- Sets default timezone
- Sets default character set

## Database Utility (`utils/db.php`)

- PDO-based database wrapper class
- Methods for querying, binding, and executing statements
- Transaction support

## Form Handling (`utils/contact_handler.php`)

- Example of how to handle form submissions
- Input validation and sanitization
- Error handling and redirection

## Getting Started

1. Place the files in your web server's document root
2. Configure your web server to use PHP
3. Update the database configuration in `config/config.php` if needed
4. Access the website through your browser

## Pages

- `index.php` - Home page
- `signin.php` - Sign in page
- `profile.php` - User profile page
- `checkout.php` - Checkout page with product selection
- `404.php` - Custom 404 error page
- `contact-success.php` - Contact form success page

## URL Rewriting

The `.htaccess` file handles:

- Setting `index.php` as the default index file
- Redirecting `.html` requests to `.php` files
- Handling 404 errors with a custom error page

## Customization

To customize the website:

1. Modify the components in the `components/` directory to change the shared elements
2. Update the CSS files in `assets/css/` to change the styling
3. Modify the PHP files to change the page content
4. Update the configuration in `config/config.php` for site-specific settings

## Security Features

- Input sanitization
- CSRF token generation and verification
- SQL injection prevention through prepared statements (in db.php)
- XSS prevention through output escaping

## Browser Support

The website is designed to work on all modern browsers including:

- Chrome
- Firefox
- Safari
- Edge
- Mobile browsers

## Dependencies

- PHP 7.0 or higher
- MySQL (for database functionality)
- Apache or Nginx web server
- All CSS and JavaScript libraries included in the `assets/` directory

## License

This project is proprietary to Carteon and should not be distributed without permission.
