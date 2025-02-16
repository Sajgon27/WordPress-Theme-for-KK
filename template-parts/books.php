<section class="container p-small relative">
    <div class="wrapper align-left">
        <h3>Moje książki</h3>
        <div class="books">
            <?php
            if (have_rows('ksiazki')) {
                while (have_rows('ksiazki')) {
                    the_row();
                    if (have_rows('ksiazka')) {
                        while (have_rows('ksiazka')) {
                            the_row();
            ?>

                            <div class="book flex flex-col">
                                <img class="book-cover" src="<?php echo wp_get_attachment_url(get_sub_field('okladka')); ?>" alt="1">
                                <span class="btn-primary btn-book">Dowiedz się więcej</span>
                                <div class="book-desc hidden">
                                    <h3>Opis książki</h3>
                                    <?php echo wp_kses_post(get_sub_field('opis')) ?><span class="close-modal">×</span>
                                </div>
                                <div class="dark-overlay hidden"></div>
                            </div>
            <?php
                        }
                    }
                }
            } ?>
        </div>
    </div>

</section>