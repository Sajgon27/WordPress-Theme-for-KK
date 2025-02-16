<?php

/**
 * Template Name: Kalendarz
 */
get_header(); ?>

<main>
    <section class="container">
        <div class="wrapper">
            <?php
            set_query_var('title', 'Kalendarz');
            get_template_part('template-parts/page-top');
            ?>
        </div>
    </section>

    <section class="container bg-secondary p-small">
        <div class="wrapper ">
            <div class="rekolekcje-container align-left flex-col">
                <?php
                $today = DateTime::createFromFormat('d/m/Y', date('d/m/Y'))->format('Ymd');

                $args = array(
                    'post_type' => 'rekolekcja',
                    'posts_per_page' => -1,
                    'meta_key' => 'rozpoczecie_rekolekcji',
                    'meta_value' => $today,
                    'meta_compare' => '>=',
                    'orderby' => 'meta_value',
                    'order' => 'ASC',
                    'fields' => 'ids',
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $start_date = ltrim(get_field('rozpoczecie_rekolekcji'), '0');
                        $month_part = explode('/', $start_date)[1];

                        // If the month changes, display the heading
                        if (!isset($previous_month)) {
                            $previous_month = '0';
                        }
                        if ($month_part !== $previous_month) {
                            $previous_month = $month_part;

                            switch ($month_part) {
                                case "01":
                                    $full_month = 'Styczeń';
                                    break;
                                case "02":
                                    $full_month = 'Luty';
                                    break;
                                case "03":
                                    $full_month = 'Marzec';
                                    break;
                                case "04":
                                    $full_month = 'Kwiecień';
                                    break;
                                case "05":
                                    $full_month = 'Maj';
                                    break;
                                case "06":
                                    $full_month = 'Czerwiec';
                                    break;
                                case "07":
                                    $full_month = 'Lipiec';
                                    break;
                                case "08":
                                    $full_month = 'Sierpień';
                                    break;
                                case "09":
                                    $full_month = 'Wrzesień';
                                    break;
                                case "10":
                                    $full_month = 'Październik';
                                    break;
                                case "11":
                                    $full_month = 'Listopad';
                                    break;
                                case "12":
                                    $full_month = 'Grudzień';
                                    break;
                                default:
                                    $full_month = 'Brak danych';
                                    break;
                            }
                ?>
                            <h4><?php echo $full_month; ?></h4>
                <?php
                        }
                        get_template_part('template-parts/rekolekcja');
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Brak rekolekcji.';
                }
                ?>
            </div>
        </div>
    </section>
    <section class="container p-small">
        <div class="wrapper align-left">
            <h3><?php echo esc_html(get_field('naglowek-kalendarz')) ?></h3>
            <p><?php echo wp_kses_post(get_field('tresc-kalendarz')) ?> </p>
        </div>
    </section>
</main>


<?php get_footer(); ?>