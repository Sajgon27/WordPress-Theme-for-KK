<?php
$title = get_query_var('title', 'Ksawery Knotz'); // Default value if not set

?>
<div class="page-top flex-row">
    <a href="/" class="flex-row">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-left.png" />
        Strona główna
    </a>
    <h1><?php echo esc_html($title); ?></h1>
</div>