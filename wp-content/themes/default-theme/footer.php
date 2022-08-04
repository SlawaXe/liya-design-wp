<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Default Theme
 */

$settings_options = get_option('main_fw_settings_form');
$fw = fw_get_db_post_option();
?>

<?php wp_footer(); ?>
</body>
</html>
