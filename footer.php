<footer class="footer">
    <div class="footer__wrapper">
        
      <div class="footer-container">
          <!-- Колонка 1 -->
          <div class="footer-column footer-col-1">
            <!-- <a href="https://metrels.ru/relsy/">Рельсы</a>
            <a href="https://metrels.ru/shpaly/">Рельсовые шпалы</a>
            <a href="https://metrels.ru/krepezh/">Крепёж для рельсов</a>
            <a href="https://metrels.ru/kranovyj-krepjozh/">Крановый крепёж</a>
            <a href="https://metrels.ru/rezinokordovye-nastily/">РТИ</a>
            <a href="https://metrels.ru/bashmaki/">Башмаки</a>
            <a href="https://metrels.ru/metalloizdelija/">Железнодорожные металлоизделия</a>
            <a href="https://metrels.ru/services/bending-the-rail/">Гибка рельсов</a>
            <a href="https://metrels.ru/services/raspil/">Распил рельсов</a>
            <a href="https://metrels.ru/services/sverlenie/">Сверление рельсов</a>
            <a href="https://metrels.ru/services/izgotovlenie-po-chertezham-zakazchika/">Изготовление по чертежам</a> -->
            <?php wp_nav_menu(
                [
                    'items_wrap' => '%3$s',
                    'container' => '',
                    'theme_location' => 'footer-first-menu'
                ]

            ); ?>
          </div>

          <!-- Колонка 2 -->
          <div class="footer-column footer-col-2"> 
            <!--<a href="https://metrels.ru/contacts/">Контакты</a>
            <a href="https://metrels.ru/services/dostavka/">Доставка и оплата</a>
            <a href="https://metrels.ru/o-kompanii/">О компании</a>
            <a href="https://metrels.ru/ceny/">Цены</a>
            <a href="https://metrels.ru/otzivi/">Отзывы</a>
            <a href="https://metrels.ru/politika-konfidencialnosti/">Политика конфиденциальности</a>
            <a href="https://metrels.ru/polzovatelskoe-soglashenie-2/">Пользовательское соглашение</a> -->
            <?php wp_nav_menu(
                [
                    'items_wrap' => '%3$s',
                    'container' => '',
                    'theme_location' => 'footer-second-menu'
                ]

            ); ?>
          </div>

          <!-- Колонка 3 -->
          <div class="footer-column footer-col-3">
            <?php wp_nav_menu(
                [
                    'items_wrap' => '%3$s',
                    'container' => '',
                    'theme_location' => 'footer-third-menu'
                ]

            ); ?>
          </div>

          <!-- Колонка 4 -->
          <div class="footer-column qr-code">
            <?php get_template_part('commons/social-icons-bottom'); ?>
            <?php 
              $image = get_field('qr', 19);
              if( $image ):
                  echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
              endif;
            ?>
            <!-- <img src="https://metrels.ru/wp-content/uploads/2025/11/qr-code.jpeg" alt="QR код"> -->
          </div>
        </div>

        <!-- <div class="footer__contacts">
            <p class="footer__title">Контакты</p>
            <div class="footer__contacts-item">

                <ul class="footer__subtitle">
                    <li class="footer__subtitle-item footer__item-name">Телефон:</li>
                    <?php
                    for ($i = 1; $i < 3; $i++) {
                        $data = 'phone-' . $i;
                        if (get_field($data, 19)) {
                            $output .= "<li class='footer__subtitle-item'>";
                            $output .= "<a href='tel:";
                            $output .=  str_replace(' ', '', get_field($data, 19));
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

                <ul class="footer__subtitle">
                    <li class="footer__subtitle-item  footer__item-name">Адрес:</li>
                    <li class="footer__subtitle-item"><?php the_field('adress', 19)  ?><br>ИНН: 1656109170 
ОГРН: 1191690066985
</li>
                </ul>
                 <div class="footer__map">
                    <iframe class="footer_map-size" src="<?php the_field('map',19); ?>"></iframe> 
                </div>
                
            </div> -->

        </div>  
        <div class="classeshr"> </div>
        <div class="footer__copyright">© Все права защищены ООО "МетРельс" 2018-<?php echo date('Y') ?></div>
    </div>
</footer>

<div id="toTop">
<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76">
  <g id="Layer_1-2" data-name="Layer 1">
    <g id="Page-1">
      <circle id="Oval" cx="38" cy="38" r="38" style="fill: #bbbbbb; stroke-width: 0px;"/>
      <polyline id="Path" points="49.4 43.7 38 32.3 26.6 43.7" style="fill: none; stroke: #fff;"/>
    </g>
  </g>
</svg>
</svg>
</div>


<?php wp_footer(); ?>
 <script
      src="https://smartcaptcha.yandexcloud.net/captcha.js?render=onload&onload=onSmartCaptchaReady"
      defer
    ></script>
<script>
  function onSmartCaptchaReady() {
    if (window.smartCaptcha) {
      var all = $(".smart-captcha").map(function() {
          var id = this.id;
          const widgetId = window.smartCaptcha.render(id, {
         	sitekey: "ysc1_qyabqQ3xeIdJ7pfhlhN2ZB2QNKribRJHeO9UuqNh356d5ce7"
          });
          window.smartCaptcha.subscribe(widgetId, "success", handleSuccess);
          function handleSuccess(token) {
             $('#button-' + id).prop('disabled', false);
          }
      }).get();
    }
  }
 </script>
</body>

</html>