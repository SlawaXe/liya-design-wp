<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Default Theme
 */
$settings_options = get_option('main_fw_settings_form');
$fw = fw_get_db_post_option();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    <header class="site-header">
        <div class="container">
            <div class="wrapper">
                <div class="site-header--logo">
                    <?php if($settings_options['site_logo']) : ?>
                    <a href="/">
                        <img src="<?=$settings_options['site_logo']['url']?>" width="170" height="80" alt="">
                    </a>
                    <?php else : ?>
                        <h2><?=get_option('blogname')?></h2>
                    <?php endif; ?>
                </div>

                <nav class="site-header--nav">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                        'container' => 'nav',
                        'container_class' => 'navbar navbar-default',
                        'menu_class' => 'nav navbar-nav',
                        //'link_after' => '<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.64648 5.35359L0.646484 1.35359L1.35359 0.646484L5.00004 4.29293L8.64648 0.646484L9.35359 1.35359L5.35359 5.35359C5.15833 5.54885 4.84175 5.54885 4.64648 5.35359Z" fill="#2E1C17"/></svg>'
                    ));
                    ?>
                </nav>

                <?php if($settings_options['site_phone']) : ?>
                <div class="site-header--phone">
                    <a href="tel:<?=clear_phone($settings_options['site_phone'])?>"><?=$settings_options['site_phone']?></a>
                </div>
                <?php endif; ?>

                <div class="site-header--cart">
                    <a href="<?=get_permalink(get_option('woocommerce_cart_page_id'))?>">
                        <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.16659 6.33333C6.16659 3.11167 8.77826 0.5 11.9999 0.5C15.2216 0.5 17.8333 3.11167 17.8333 6.33333V8.5H21.3333C21.5933 8.5 21.8099 8.69933 21.8315 8.95848L23.1649 24.9585C23.1765 25.0978 23.1292 25.2357 23.0345 25.3386C22.9398 25.4415 22.8064 25.5 22.6666 25.5H1.33325C1.19343 25.5 1.05999 25.4415 0.965312 25.3386C0.870635 25.2357 0.823369 25.0978 0.834981 24.9585L2.16831 8.95848C2.18991 8.69933 2.40654 8.5 2.66659 8.5H6.16659V6.33333ZM6.16659 9.5V11.6667H7.16659V9.5H16.8333V11.6667H17.8333V9.5H20.8732L22.1232 24.5H1.87665L3.12665 9.5H6.16659ZM16.8333 8.5H7.16659V6.33333C7.16659 3.66396 9.33054 1.5 11.9999 1.5C14.6693 1.5 16.8333 3.66396 16.8333 6.33333V8.5Z" fill="#B39166"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
