<?php
/**
 * Template name: Главная
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Default Theme
 */
$fw = fw_get_db_post_option();

get_header(); ?>

    <main class="site-main">
        <section class="block-main">
            <div class="container">
                <div class="row">
                    <div class="col block-main--offer">
                        <h1 class="block-main--title"><?=$fw['intro_title']?></h1>

                        <?php if($fw['intro_btns']) : ?>
                        <div class="btn-group">
                            <?php foreach($fw['intro_btns'] as $item) : ?>
                                <a href="<?=$item['text']?>" class="btn <?php if($item['class']) echo $item['class']; else echo 'btn-primary'; ?>">
                                    <?=$item['title']?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if($fw['intro_catalog']) : ?>
                    <div class="col">
                        <div class="catalog-high-cols">
                            <?php foreach($fw['intro_catalog'] as $item) : ?>
                            <div class="catalog-high-col--item">
                                <a href="<?=$item['text']?>" class="inner">
                                    <h4 class="catalog-high-cols--title">
                                        <?=$item['title']?>
                                        <svg width="18" height="118" viewBox="0 0 18 118" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.131538 9.9433C-0.045789 9.74844 -0.0435476 9.43494 0.136544 9.24308L8.67892 0.142326C8.85704 -0.0474476 9.14295 -0.0474476 9.32107 0.142326L17.8634 9.24308C18.0435 9.43494 18.0458 9.74844 17.8685 9.9433C17.6911 10.1382 17.4014 10.1406 17.2213 9.94871L9.45762 1.67757L9.45763 117.505C9.45763 117.778 9.25274 118 9 118C8.74726 118 8.54237 117.778 8.54237 117.505L8.54237 1.67757L0.778703 9.94872C0.598611 10.1406 0.308865 10.1382 0.131538 9.9433Z" fill="white"/></svg>
                                    </h4>
                                    <?php if($item['image']) : ?>
                                    <img src="<?=$item['image']['url']?>" alt="" class="catalog-high-cols--bgr">
                                    <?php endif; ?>

                                    <?php if($item['image2']) : ?>
                                    <img src="<?=$item['image2']['url']?>" alt="" class="catalog-high-cols--img">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php if($fw['block1_enable'] == 'yes') : ?>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="section-header">
                            <h3 class="section--title"><?=$fw['block1_title']?></h3>

                            <?php if($fw['block1_subtitle']) : ?>
                            <div class="setion-desc">
                                <?=$fw['block1_subtitle']?>
                            </div>
                            <?php endif; ?>

                            <?php if($fw['block1_link']) : ?>
                            <a href="<?=$fw['block1_link']?>" class="btn btn-outline">
                                Все проекты
                                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.97978 0.979821C8.17504 0.784558 8.49162 0.784558 8.68689 0.979821L13.3536 5.64649C13.4473 5.74026 13.5 5.86743 13.5 6.00004C13.5 6.13265 13.4473 6.25983 13.3536 6.35359L8.68689 11.0203C8.49162 11.2155 8.17504 11.2155 7.97978 11.0203C7.78452 10.825 7.78452 10.5084 7.97978 10.3132L11.7929 6.50004L1 6.50004C0.723858 6.50004 0.5 6.27618 0.5 6.00004C0.5 5.7239 0.723858 5.50004 1 5.50004L11.7929 5.50004L7.97978 1.68693C7.78452 1.49167 7.78452 1.17508 7.97978 0.979821Z" fill="#B39166"/></svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-9">
                        <?php
                            $projects = get_posts( array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'cat' => 20,
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                            ));

                            if($projects) :
                        ?>
                        <div class="owl-carousel owl-theme carousel-project" id="carousel-project">
                            <?php foreach( $projects as $project ) :
                                $fw_p = fw_get_db_post_option($project->ID);
                            ?>
                            <div class="carousel-project--item">
                                <div class="inner">
                                    <div class="carousel-project--content">
                                        <div class="carousel-project--date"><?=get_the_date('d F', $project->ID)?></div>
                                        <h4 class="carousel-project--title"><?=$project->post_title?></h4>
                                        <div class="carousel-project--desc"><?=$fw_p['p_desc']?></div>
                                    </div>
                                    <?php if($fw_p['p_imgs']) : ?>
                                    <div class="owl-carousel carousel-project--inner-carousel">
                                        <?php foreach($fw_p['p_imgs'] as $item) : ?>
                                        <div class="item">
                                            <img src="<?=$item['url']?>" class="carousel-project--img-pug" alt="" >
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>

<?php
get_footer();