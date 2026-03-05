<div class="services">
    <div class="services__wrapper">
        <?php get_template_part('commons/sidebar-mini'); ?>

        <div class="services__content">
            <h1 class="services__title">
                <?php the_title(); ?>
            </h1>
            <?php
            

                        
            $page_ID = get_the_ID();

            


            if ($page_ID == 22) {
                for ($i = 1;; $i++) {


                    $name = 'service-name-';
                    $text = 'service-description-';
                    $img = 'service-img-';

                    $name .= $i;
                    $text .= $i;
                    $img .= $i;

                    $field_name = get_field($name, 22);
                    $field_text = get_field($text, 22);
                    $field_img = get_field($img, 22);
                    if ($field_name || $field_text || $field__img) {
                        $output .= "<div class='services__box '>";
                       /* $output .= "<h3 class='services__subtitle'>";
                        $output .= $field_name;
                        $output .= "</h3>";*/
                        $output .= "<div class='services__box-content'>
                                        <div class='services__wrapper-box'>
                                            <p class='services__text'>";
                        $output .=  $field_text;
                        $output .= " </p>
                                         <a class='popup-with-zoom-anim button services__button' href='#small-dialog'>
                                         Заказать</a>";
                        $output .= get_template_part('callback-form');
                        $output .= "    </div>
                                        <div class='services__img'>
                                            <img class='services__img-item' src='";
                        $output .=  $field_img;
                        $output .= "' alt=''></div>
                                                </div>
                                            </div>";
                        echo $output;
                        $output = '';
                    } else {
                        break;
                    }
                }

                $name = 'dostavka-name';
                $text = 'dostavka-description';
                $img = 'dostavka-img';

                $field_name = get_field($name, 22);
                $field_text = get_field($text, 22);
                $field_img = get_field($img, 22);

                if ($field_name || $field_name || $field__img) {
                    $output .= "<div class='services__box '>";
                   /* $output .= "<h3 class='services__subtitle'>";
                    $output .= $field_name;
                    $output .= "</h3>";*/
                    $output .= "<div class='services__box-content'>
                                        <div class='services__wrapper-box'>
                                            <p class='services__text'>";
                    $output .=  $field_text;
                    $output .= " </p>
                                         <a class='popup-with-zoom-anim button services__button' href='#small-dialog'>
                                         Заказать</a>";
                    $output .= get_template_part('callback-form');
                    $output .= "    </div>
                                        <div class='services__img'>
                                            <img class='services__img-item' src='";
                    $output .=  $field_img;
                    $output .= "' alt=''></div>
                                                </div>
                                            </div>";
                    echo $output;
                    $output = '';
                }
            };
            if ($page_ID == 78) {

                $name = 'service-name-';
                $text = 'service-description-';
                $img = 'service-img-';

                $name .= 1;
                $text .= 1;
                $img .= 1;

                $field_name = get_field($name, 22);
                $field_text = get_field($text, 22);
                $field_img = get_field($img, 22);

                if ($field_name || $field_name || $field__img) {
                    $output .= "<div class='services__box '>";
                    /*$output .= "<h3 class='services__subtitle'>";
                    $output .= $field_name;
                    $output .= "</h3>";*/
                    $output .= "<div class='services__box-content'>
                                        <div class='services__wrapper-box'>
                                            <p class='services__text'>";
                    $output .=  $field_text;
                    $output .= " </p>";

                    $content = get_the_content();
                    
                    if (!empty($content)){
                        $output .= "<div style='margin: 0 0 36px;'>" .$content. "</div>";   
                    }
                    $output .= "<a class='popup-with-zoom-anim button services__button' href='#small-dialog'>
                                         Заказать</a>";
                    $output .= get_template_part('callback-form');
                    $output .= "    </div>
                                        <div class='services__img'>
                                            <img class='services__img-item' src='";
                    $output .=  $field_img;
                    $output .= "' alt=''></div>
                                                </div>
                                            </div>";
                    echo $output;
                    $output = '';
                }
            } elseif ($page_ID == 76) {
                $name = 'service-name-';
                $text = 'service-description-';
                $img = 'service-img-';

                $name .= 2;
                $text .= 2;
                $img .= 2;

                $field_name = get_field($name, 22);
                $field_text = get_field($text, 22);
                $field_img = get_field($img, 22);

                if ($field_name || $field_name || $field__img) {
                    $output .= "<div class='services__box '>";
                   /* $output .= "<h3 class='services__subtitle'>";
                    $output .= $field_name;
                    $output .= "</h3>";*/
                    $output .= "<div class='services__box-content'>
                                        <div class='services__wrapper-box'>
                                            <p class='services__text'>";
                    $output .=  $field_text;
                    $output .= " </p>";

                    $content = get_the_content();
                    
                    if (!empty($content)){
                        $output .= "<div style='margin: 0 0 36px;'>" .$content. "</div>";   
                    }
                    $output .= "<a class='popup-with-zoom-anim button services__button' href='#small-dialog'>
                                         Заказать</a>";
                    $output .= get_template_part('callback-form');
                    $output .= "    </div>
                                        <div class='services__img'>
                                            <img class='services__img-item' src='";
                    $output .=  $field_img;
                    $output .= "' alt=''></div>
                                                </div>
                                            </div>";
                    echo $output;
                    $output = '';

                    

                }
            } elseif ($page_ID == 74) {

                $name = 'service-name-';
                $text = 'service-description-';
                $img = 'service-img-';

                $name .= 3;
                $text .= 3;
                $img .= 3;

                $field_name = get_field($name, 22);
                $field_text = get_field($text, 22);
                $field_img = get_field($img, 22);

                if ($field_name || $field_name || $field__img) {
                    $output .= "<div class='services__box '>";
                   /* $output .= "<h3 class='services__subtitle'>";
                    $output .= $field_name;
                    $output .= "</h3>";*/
                    $output .= "<div class='services__box-content'>
                                        <div class='services__wrapper-box'>
                                            <p class='services__text'>";
                    $output .=  $field_text;
                    $output .= " </p>";

                    $content = get_the_content();
                    
                    if (!empty($content)){
                        $output .= "<div style='margin: 0 0 36px;'>" .$content. "</div>";   
                    }
                    $output .= "<a class='popup-with-zoom-anim button services__button' href='#small-dialog'>
                                         Заказать</a>";
                    $output .= get_template_part('callback-form');
                    $output .= "    </div>
                                        <div class='services__img'>
                                            <img class='services__img-item' src='";
                    $output .=  $field_img;
                    $output .= "' alt=''></div>
                                                </div>
                                            </div>";
                    echo $output;
                    $output = '';
                }
            } elseif ($page_ID == 1730) {

                $name = 'dostavka-name';
                $text = 'dostavka-description';
                $img = 'dostavka-img';

                $field_name = get_field($name, 22);
                $field_text = get_field($text, 22);
                $field_img = get_field($img, 22);

                if ($field_name || $field_name || $field__img) {
                    $output .= "<div class='services__box '>";
                    /*$output .= "<h3 class='services__subtitle'>";
                    $output .= $field_name;
                    $output .= "</h3>";*/
                    $output .= "<div class='services__box-content'>
                                        <div class='services__wrapper-box'>
                                            <p class='services__text'>";
                    $output .=  $field_text;
                    $output .= " </p>";

                    $content = get_the_content();
                    
                    if (!empty($content)){
                        $output .= "<div style='margin: 0 0 36px;'>" .$content. "</div>";   
                    }

                    $output .=           "<a class='popup-with-zoom-anim button services__button' href='#small-dialog'>
                                         Заказать</a>";
                    $output .= get_template_part('callback-form');
                    $output .= "    </div>
                                        <div class='services__img'>
                                            <img class='services__img-item' src='";
                    $output .=  $field_img;
                    $output .= "' alt=''></div>
                                                </div>
                                            </div>";
                    echo $output;
                    $output = '';
                }
            }

            ?>

        </div>

    </div>

</div>