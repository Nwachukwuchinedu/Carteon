<?php
// functions.php - Updated Functions
function get_theme() {
    return isset($_COOKIE['theme']) ? $_COOKIE['theme'] : DEFAULT_THEME;
}

function set_theme($theme) {
    setcookie('theme', $theme, time() + (86400 * 30), "/");
}

function get_company_info($info) {
    $info_map = [
        'name' => COMPANY_NAME,
        'tagline' => COMPANY_TAGLINE,
        'email' => CONTACT_EMAIL,
        'phone' => CONTACT_PHONE
    ];
    return $info_map[$info] ?? '';
}
?>