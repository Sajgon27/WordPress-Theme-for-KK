<footer class="container">
    <div class="wrapper">
        <div class="w-100 flex-row box">
            <h4>Skorzystaj z poradni online!</h4>
            <a class="btn-primary" href="https://szansaspotkania.pl/poradnia/">Przejdź do poradni online<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.png" /></a>
        </div>
        <div class="w-100 flex-row">
            <div class="w-50">
                <div class="flex-row socials">
                    <a href="https://www.instagram.com/ksaweryknotz/"><img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagram.png" /></a>
                    <a href="https://www.facebook.com/KnotzKsawery"><img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebook.png" /></a>
                    <a href="https://patronite.pl/ksaweryknotz"><img height="30px" src="<?php echo get_template_directory_uri(); ?>/assets/icons/patronite.png" /></a>
                </div>
                <p class="align-left">Lorem ipsum dolor sit amet consectetur.
                    Convallis tincidunt euismod et arcu a vitae risus.
                    Quam at tellus massa urna tincidunt a est sed. </p>
            </div>
            <div class="w-50 flex-row menu-footer">
                <div>
                    <h5>Menu:</h5>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-1',

                    ));
                    ?>
                </div>

                <div class="w-50">
                    <h5>Warto odwiedzić:</h5>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',

                    ));
                    ?>
                </div>

            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>