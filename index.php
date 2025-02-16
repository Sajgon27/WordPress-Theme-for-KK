<?php get_header(); ?>

<main>
    <section class="container p-big">
        <div class="wrapper flex-row">
            <div class="w-50 align-left">
                <h1><?php echo esc_html(get_field('naglowek')); ?></h1>

                <p><?php echo wp_kses_post(get_field('tresc')) ?> </p>
                <a class="btn-primary btn-section" href="<?php echo esc_url(get_field('url_przycisku')) ?>"><?php echo esc_html(get_field('tresci_przycisku')) ?><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
            </div>
            <div class="w-50 align-right mobile-bg">
                <img class="img-full" src="<?php echo esc_url(get_field('zdjecie')['url']) ?>" />
            </div>
        </div>
    </section>
    <section class="container p-small bg-secondary">
        <div class="wrapper flex-row">
            <div class="w-50 align-center">
                <img class="image-wrapper img-square" src="<?php echo esc_url(get_field('zdjecie-2')['url']) ?>" />
            </div>
            <div class="w-50 align-left">
                <h3 class="mt-mobile"><?php echo esc_html(get_field('naglowek-2')) ?></h3>

                <p><?php echo wp_kses_post(get_field('tresc-2')) ?> </p>
                <a class="btn-primary btn-section" href="<?php echo esc_url(get_field('url_przycisku-2')) ?>"><?php echo esc_html(get_field('tresci_przycisku-2')) ?><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
            </div>
        </div>
    </section>
    <section class="container p-small">
        <div class="wrapper">
            <div class="flex-row gap-m header-calendar-container">
                <h3>Najbliższe rekolekcje</h3>
                <a class="btn-secondary" href="/kalendarz"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/calendar.png" />Zobacz cały kalendarz</a>
            </div>
            <div class="rekolekcje-container flex-col">
                <?php
                $today = DateTime::createFromFormat('d/m/Y', date('d/m/Y'))->format('Ymd');

                $args = array(
                    'post_type' => 'rekolekcja',
                    'posts_per_page' => 5,
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

                        $end_date = ltrim(get_field('zakonczenie_rekolekcji'), '0');
                        $month_part = explode('/', $start_date)[1];

                        if ($start_date == $end_date) {
                            $start_parts = explode('/', $start_date);
                            $rekolekcja_day = $start_parts[0];
                        } else {
                            $start_parts = explode('/', $start_date);
                            $end_parts = explode('/', $end_date);
                            $rekolekcja_day = $start_parts[0] . '-' . $end_parts[0];
                        }

                        if (is_page('kalendarz') and isset($date_month) and $month_part !== $date_month) {
                ?>
                            <h4><?php echo $full_month; ?></h4>
                <?php
                        }

                        switch ($month_part) {
                            case "01":
                                $rekolekcja_month = 'STY';
                                $full_month = 'Styczeń';
                                $date_month = '01';
                                break;
                            case "02":
                                $rekolekcja_month = 'LUT';
                                $full_month = 'Luty';
                                $date_month = '02';
                                break;
                            case "03":
                                $rekolekcja_month = 'MAR';
                                $full_month = 'Marzec';
                                $date_month = '03';
                                break;
                            case "04":
                                $rekolekcja_month = 'KWI';
                                $full_month = 'Kwiecień';
                                break;
                            case "05":
                                $rekolekcja_month = 'MAJ';
                                $full_month = 'Maj';
                                break;
                            case "06":
                                $rekolekcja_month = 'CZE';
                                $full_month = 'Czerwiec';
                                break;
                            case "07":
                                $rekolekcja_month = 'LIP';
                                $full_month = 'Lipiec';
                                break;
                            case "08":
                                $rekolekcja_month = 'SIE';
                                $full_month = 'Sierpień';
                                break;
                            case "09":
                                $rekolekcja_month = 'WRZ';
                                $full_month = 'Wrzesień';
                                break;
                            case "10":
                                $rekolekcja_month = 'PAŹ';
                                $full_month = 'Październik';
                                break;
                            case "11":
                                $rekolekcja_month = 'LIS';
                                $full_month = 'Listopad';
                                break;
                            case "12":
                                $rekolekcja_month = 'GRU';
                                $full_month = 'Grudzień';
                                break;
                            default:
                                echo "Brak danych.";
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
    <section class="container p-small bg-secondary">
        <div class="wrapper">
            <h3 class="align-left">Warto odwiedzić także:</h3>
            <div class="flex-row cards">
                <?php
                $cards = [
                    [
                        "title" => get_field('i_blok_-_naglowek'),
                        "image" => get_field('i_blok_-_zdjecie')['url'],
                        "url" => get_field('i_blok_-_adres_url')
                    ],
                    [
                        "title" => get_field('ii_blok_-_naglowek_'),
                        "image" => get_field('ii_blok_-_zdjecie_')['url'],
                        "url" => get_field('ii_blok_-_adres_url_')
                    ],
                    [
                        "title" => get_field('iii_blok_-_naglowek_'),
                        "image" => get_field('iii_blok_-_zdjecie_')['url'],
                        "url" => get_field('iii_blok_-_adres_url_')
                    ],
                    [
                        "title" => get_field('iv_blok_-_naglowek_'),
                        "image" => get_field('iv_blok_-_zdjecie_')['url'],
                        "url" => get_field('iv_blok_-_adres_url_')
                    ],
                ];
                foreach ($cards as $card) {

                ?>
                    <a href="<?php echo esc_url($card['url']); ?>">
                        <img src="<?php echo esc_url($card['image']); ?>" />
                        <p><?php echo esc_html($card['title']); ?></p>
                    </a>
                <?php
                }

                ?>
            </div>
        </div>
    </section>
    <section class="container p-big">
        <div class="wrapper flex-row">
            <div class="w-50 align-left">
                <h3><?php echo esc_html(get_field('naglowek-3')) ?></h3>

                <p><?php echo wp_kses_post(get_field('tresc-3')) ?> </p>
                <a class="btn-primary btn-section" href="<?php echo esc_url(get_field('url_przycisku-3')) ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/hand-heart-white.png" /><?php echo esc_html(get_field('tresci_przycisku-3')) ?></a>
       
                <div class="toggle-section align-left">
                    <button class="toggle-btn btn-secondary">
                    <span class="arrow">&#9660;</span>Przelew na rachunek 
                    </button>
                    <div class="toggle-content">
                        <p>ZAKON BRACI MNIEJSZYCH KAPUCYNÓW – PROWINCJA KRAKOWSKA<br>
                            ul. Korzeniaka 16, 30-298 Kraków<br>
                            NIP 6762083140 / REGON 040018820<br>
                            BNP Paribas S.A.<br>
                            <strong>87 1600 1462 1847 0283 1000 0081</strong></p>
                    </div>
                </div>
                 </div>
            <div class="w-50 hide-mobile">
                <img class="image-wrapper-light" src="<?php echo esc_url(get_field('zdjecie-3')['url']) ?>" />
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>