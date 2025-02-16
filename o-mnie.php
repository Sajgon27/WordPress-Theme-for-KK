<?php

/**
 * Template Name: O mnie
 */
get_header(); ?>

<main>
    <section class="container">
        <div class="wrapper">
            <?php
            set_query_var('title', 'Dowiedz się więcej o mojej osobie');
            get_template_part('template-parts/page-top');

            ?>

        </div>
    </section>
    <section class="container p-small bg-secondary o-mnie-main">
        <div class="wrapper flex-row">
            <div class="w-50 align-center">
                <img class="image-wrapper img-square" width="362px" height="362px" src="<?php echo esc_url(get_field('zdjecie-o-mnie')['url']) ?>" />
            </div>
            <div class="w-50 align-left ">
                <h3 class="mt-mobile"><?php echo esc_html(get_field('naglowek-o-mnie')) ?></h3>

                <p><?php echo wp_kses_post(get_field('tresc-o-mnie')) ?> </p>
            </div>
        </div>
        <div class="wrapper flex-row">
            <div class="w-50 align-left">
                <h3><?php echo esc_html(get_field('naglowek-o-mnie-ii')) ?></h3>

                <p><?php echo wp_kses_post(get_field('tresc-o-mnie-ii')) ?> </p>
            </div>
            <div class="w-50 align-center">
                <img class="image-wrapper" width="596px" height="348px" src="<?php echo esc_url(get_field('zdjecie-o-mnie-ii')['url']) ?>" />
            </div>
        </div>
        <div class="wrapper align-left">
            <h3><?php echo esc_html(get_field('naglowek-o-mnie-iii')) ?></h3>
            <p><?php echo wp_kses_post(get_field('tresc-o-mnie-iii')) ?> </p>
        </div>

    </section>
    <?php get_template_part('template-parts/books'); ?>
    <section class="container p-small bg-secondary">
        <div class="wrapper align-left inicjatywy">
            <h3>Moje Inicjatywy</h3>

            <?php
            if (have_rows('inicjatywy')) {
                $index = 0; // Initialize index counter
                while (have_rows('inicjatywy')) {
                    the_row();
                    if (have_rows('inicjatywa')) {
                        while (have_rows('inicjatywa')) {
                            the_row();
                            $index++; // Increment index
                            if ($index % 2 == 1) {
            ?>
                                <div class="flex-row inicjatywa">
                                    <div class="w-50">
                                        <img class="image-wrapper" src="<?php echo esc_url(get_sub_field('zdjecie')['url']) ?>" />
                                    </div>
                                    <div class="w-50 align-left">
                                        <h4><?php echo esc_html(get_sub_field('naglowek')) ?></h4>
                                        <p><?php echo wp_kses_post(get_sub_field('tresc')); ?></p>
                                        <a class="btn-primary" href="<?php echo esc_url(get_sub_field('adres_url_przycisku')); ?>">
                                            <?php echo esc_html(get_sub_field('tresc_przycisku')); ?><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
                                    </div>

                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="flex-row inicjatywa">

                                    <div class="w-50 align-left">
                                        <h4><?php echo esc_html(get_sub_field('naglowek')); ?></h4>
                                        <p><?php echo wp_kses_post(get_sub_field('tresc')); ?></p>
                                        <a class="btn-primary" href="<?php echo esc_url(get_sub_field('adres_url_przycisku')); ?>">
                                            <?php echo esc_html(get_sub_field('tresc_przycisku')); ?><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
                                    </div>
                                    <div class="w-50">
                                        <img class="image-wrapper" src="<?php echo esc_url(get_sub_field('zdjecie')['url']); ?>" />
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
            <?php
                        }
                    }
                }
            }
            ?>

        </div>

    </section>
    <section class="container p-small">
        <div class="wrapper align-left">
            <h3><?php echo esc_html(get_field('naglowek-o-mnie-iv')) ?> </h3>
            <p><?php echo wp_kses_post(get_field('tresc-o-mnie-iv')) ?></p>
        </div>
    </section>
</main>

<?php get_footer(); ?>