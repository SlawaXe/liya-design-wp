<?php if (!defined('FW')) {
    die('Forbidden');
}

$tpl_url = explode('/', get_page_template());

if( end($tpl_url) == 'page-home.php') {
    include get_template_directory() . '/framework-customizations/theme/options/posts/pages/page-home.php';
}