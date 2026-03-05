<div class="contacts">
    <div class="contacts__wrapper">
        <h1 class="contacts__title"><?php the_title(); ?></h1>
        <ul class="contacts__subtitle contacts__subtitle-order1">
            <li class=" contacts__subtitle-name contacts__subtitle-item ">Телефон:</li>
            <?php
            for ($i = 1; $i < 3; $i++) {
                $data = 'phone-' . $i;
                if (get_field($data, 19)) {
                    $output .= "<li class='contacts__subtitle-item'>";
                    $output .= "<a href='tel:";
                    $output .=  str_replace(' ', '',  get_field($data, 19));
                    $output .= "'>";
                    $output .= number_correct(get_field($data, 19));
                    $output .= "</a></li>";
                    echo $output;
                    $data = '';
                    $output = "";
                } else {
                    break;
                }
            }

            ?>

            
        </ul>
        <ul class="contacts__subtitle contacts__subtitle-order1 ">
            <li class=" contacts__subtitle-item  contacts__subtitle-name">Электронная почта:</li>
            <li class="contacts__subtitle-item ">
                <a href="mailto:<?php the_field('email', 19)  ?>">
                    <?php the_field('email', 19)  ?></a>
            </li>
            <?php
            if (get_field('email2', 19)) {
                $output .= "<li class='contacts__subtitle-item'>
                <a href='mailto:";
                $output .= get_field('email2', 19);
                $output .= "'>";
                $output .=  get_field('email2', 19) . "</a></li>";
                echo $output;
            }
            ?>
        </ul>
        <ul class="contacts__subtitle contacts__subtitle-order1">
            <li class="contacts__subtitle-item   contacts__subtitle-name">Адрес:</li>
            <li class="contacts__subtitle-item "><?php the_field('adress', 19)  ?></li>
        </ul>
        <div class="contacts__subtitle contacts__subtitle-order1 contacts__social ">
            <div class="contacts__subtitle-item  contacts__subtitle-name">Социальные сети:</div>
            <?php get_template_part('commons/social-icons'); ?>
        </div>


        <div class="contacts__map">
            <iframe class="contacts_map-size" src="<?php the_field('map', 19); ?>" width="100%" height="509" frameborder="0"></iframe>
        </div>
        <ul class="contacts__subtitle contacts__subtitle-order2 ">
            <li class="contacts__subtitle-item   contacts__subtitle-name">Реквизиты:</li>
            <li class="contacts__subtitle-item "><?php the_field('rekvizity-rs', 19)  ?></li>
            <li class="contacts__subtitle-item  "><?php the_field('rekvizity-ks', 19)  ?></li>
        </ul>
        <div class="contacts__subtitle contacts__callback ">
            <h4 class="contacts__subtitle-item contacts__subtitle-name">Форма обратной связи:</h4>
            <div class="callback callback__contacts" style="height: auto;">
                <?php get_template_part('commons/callback-form'); ?>
            </div>
        </div>




    </div>
</div>