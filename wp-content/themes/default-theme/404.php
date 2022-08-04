<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Default Theme
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кварц Москва | Изготовление каменных изделий и поверхностей с 2008 года</title>
    
    <?php
    $favicon = $settings_options['site_favicon']['attachment_id'];
    if( $favicon ) {
        echo '<link rel="icon" href="'. wp_get_attachment_image_url($favicon, 'thumbnail') .'" sizes="32x32">';
        echo '<link rel="icon" href="'. wp_get_attachment_image_url($favicon, 'medium') .'" sizes="192x192">';
        echo '<link rel="apple-touch-icon-precomposed" href="'. wp_get_attachment_image_url($favicon, 'medium') .'">';
        echo '<meta name="msapplication-TileImage" href="'. wp_get_attachment_image_url($favicon, 'medium') .'">';
    }
    ?>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--  Content  -->
    <div class="section section--404">
        <div class="container">
            <div class="heading__404">404</div>
            <div class="desc__404">К сожалению, запрашиваемая Вами страница не найдена</div>
            
            <a href="/" class="button"><span>На главную</span></a>
        </div>
    </div>

<?php
get_footer();