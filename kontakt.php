<?php
/*
Template Name: Kontakt
*/

$success = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['contact_nonce']) && wp_verify_nonce($_POST['contact_nonce'], 'send_contact_form')) {
    $name    = sanitize_text_field($_POST['name']);
    $nazwisko = sanitize_text_field($_POST['nazwisko']);
    $telefon   = sanitize_text_field($_POST['telefon']);
    $email   = sanitize_email($_POST['email']);
    $wiadomosc = sanitize_textarea_field($_POST['wiadomosc']);

    // Email setup
    $to      = "szymon.mudrak@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = [
        "From: $name $nazwisko <$email>",
        "Reply-To: $email",
        "Content-Type: text/plain; charset=UTF-8",
    ];

    $body  = "Imię i nazwisko: $name $nazwisko\n";
    $body .= "Nr telefonu: $telefon\n";
    $body .= "Adres email: $email\n\n";
    $body .= "Wiadomość:\n$wiadomosc";

    if (wp_mail($to, $subject, $body, $headers)) {
        $success = true;
    } else {
        $error = true;
    }
}
get_header(); ?>

<main>
    <section class="container">
        <div class="wrapper">
            <?php
            set_query_var('title', 'Kontakt');
            get_template_part('template-parts/page-top');

            ?>

        </div>
    </section>
    <section class="container p-small bg-secondary">
        <div class="wrapper flex-row">
            <div class="w-50 align-center">
                <img class="image-wrapper img-square" width="362px" height="362px" src="<?php echo get_field('zdjecie-kontakt')['url'] ?>" />
            </div>
            <div class="w-50 align-left form-container">
                <h3 class="mt-mobile">Formularz kontaktowy</h3>
                <form action="<?php echo esc_url(get_permalink()); ?>" method="post">
                    <?php wp_nonce_field('send_contact_form', 'contact_nonce'); ?>

                    <div>
                        <input type="text" name="imie" placeholder="Imię" required>
                        <input type="text" name="nazwisko" placeholder="Nazwisko" required>
                    </div>

                    <div>
                        <input type="tel" name="telefon" placeholder="Nr telefonu" required>
                        <input type="email" name="email" placeholder="Adres email" required>
                    </div>

                    <textarea name="wiadomosc" placeholder="Wiadomość" required></textarea>

                    <button class="btn-primary" type="submit">Wyślij wiadomość</button>
                </form>

                <?php if ($success): ?>
                    <p style="color: green; margin-top: 10px;">✅ Wiadomość została wysłana.</p>
                <?php elseif ($error): ?>
                    <p style="color: red; margin-top: 10px;">❌ Błąd. Spróbuj ponownie.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="container p-small">

        <div class="wrapper align-left ">
            <h3><?php echo esc_html(get_field('naglowek-kontakt')) ?></h3>
            <p><?php echo wp_kses_post(get_field('tresc-kontakt')) ?> </p>
        </div>


    </section>

    <?php get_footer(); ?>