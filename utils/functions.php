<?php
// Functions file

/**
 * Get the current theme setting
 * @return string Theme name (light or dark)
 */
function get_theme() {
    if (isset($_COOKIE['theme'])) {
        return $_COOKIE['theme'];
    }
    return DEFAULT_THEME;
}

/**
 * Set the theme cookie
 * @param string $theme Theme name (light or dark)
 */
function set_theme($theme) {
    setcookie('theme', $theme, time() + (86400 * 30), "/"); // 30 days
}

/**
 * Get company information
 * @param string $info Type of information to retrieve
 * @return string Requested company information
 */
function get_company_info($info) {
    switch ($info) {
        case 'name':
            return COMPANY_NAME;
        case 'tagline':
            return COMPANY_TAGLINE;
        case 'email':
            return CONTACT_EMAIL;
        case 'phone':
            return CONTACT_PHONE;
        default:
            return '';
    }
}

/**
 * Generate a navigation menu
 * @param array $menu_items Menu items
 * @return string HTML for navigation menu
 */
function generate_nav_menu($menu_items) {
    $html = '<ul>';
    foreach ($menu_items as $item) {
        $html .= '<li><a href="' . $item['url'] . '">' . $item['text'] . '</a></li>';
    }
    $html .= '</ul>';
    return $html;
}

/**
 * Generate a feature card
 * @param string $icon Font Awesome icon class
 * @param string $title Card title
 * @param string $description Card description
 * @return string HTML for feature card
 */
function generate_feature_card($icon, $title, $description) {
    $html = '<div class="feature-card">';
    $html .= '<div class="feature-icon"><i class="fas ' . $icon . '"></i></div>';
    $html .= '<h3>' . $title . '</h3>';
    $html .= '<p>' . $description . '</p>';
    $html .= '</div>';
    return $html;
}

/**
 * Generate a step card
 * @param string $icon Font Awesome icon class
 * @param string $title Card title
 * @param string $description Card description
 * @return string HTML for step card
 */
function generate_step_card($icon, $title, $description) {
    $html = '<div class="step-card">';
    $html .= '<div class="step-icon"><i class="fas ' . $icon . '"></i></div>';
    $html .= '<h3>' . $title . '</h3>';
    $html .= '<p>' . $description . '</p>';
    $html .= '</div>';
    return $html;
}
?>