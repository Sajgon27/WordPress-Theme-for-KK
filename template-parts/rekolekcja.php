 <?php
    $start_date = ltrim(get_field('rozpoczecie_rekolekcji'), '0');
    $end_date = ltrim(get_field('zakonczenie_rekolekcji'), '0');
    $month_part = explode('/', $start_date)[1];
    $title = get_the_title();

    if ($start_date == $end_date) {
        $start_parts = explode('/', $start_date);
        $rekolekcja_day = $start_parts[0];
    } else {
        $start_parts = explode('/', $start_date);
        $end_parts = explode('/', $end_date);
        $rekolekcja_day = $start_parts[0] . '-' . $end_parts[0];
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
    ?>

 <div class="single-rekolekcja flex-row">
     <div class="flex-col no-gap day-month">
         <span class="day"><?php echo esc_html($rekolekcja_day); ?></span>
         <span class="month"><?php echo esc_html($rekolekcja_month); ?></span>
     </div>
     <div class="flex-col">
         <div class="title-location ">
             <?php if ($title): ?>
                 <strong>
                     "<?php echo esc_html(get_the_title()); ?>"
                 </strong>
                 -
             <?php endif; ?>
             <?php echo esc_html(get_field('lokalizacja')); ?>

         </div>
         <div class="registration align-left flex-row">
             Zgłoszenia: <?php echo get_field('email_do_zgloszen'); ?>
         </div>
     </div>
 </div>