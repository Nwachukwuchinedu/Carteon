<?php
// components/head.php - Reusable head section
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_TITLE : SITE_TITLE; ?></title>
<meta name="description" content="<?php echo isset($page_description) ? $page_description : SITE_DESCRIPTION; ?>">

<link rel="icon" type="image/png" href="assets/images/logo-dark.png">
<!-- Preload critical resources -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.160.0/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/animejs/dist/bundles/anime.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/motion@latest/dist/motion.js"></script>