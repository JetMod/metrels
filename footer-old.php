<footer class="footer">
    <div class="footer__wrapper">
        <ul class="footer__navigation">
            <?php
            $args = array(
                'orderby'            => 'name',
                'order'              => 'ASC',
                'style'              => 'list',
                'show_count'         => 0,
                'hide_empty'         => 0,
                'use_desc_for_title' => 1,
                'child_of'           => 0,
                'feed'               => '',
                'feed_type'          => '',
                'feed_image'         => '',
                'exclude'            => '1',
                'exclude_tree'       => '',
                'include'            => '',
                'hierarchical'       => true,
                'title_li'           => NULL,
                'number'             => NULL,
                'echo'               => 1,
                'depth'              => 0,
                'current_category'   => 0,
                'pad_counts'         => 0,
                'walker'             => new Custom_Footer_Wp_Category(),
                'hide_title_if_empty' => false,
                'separator'          => '',
            );

            wp_list_categories($args);

            ?>
            <?php
            $args = array(
                'depth'        => 0,
                'exclude'      => '1753,1757',
                'include'      => '',
                'echo'         => 1,
                'sort_column'  => 'menu_order, post_title',
                'sort_order'   => 'ASC',
                'link_before'  => '',
                'link_after'   => '',
                'meta_key'     => '',
                'meta_value'   => '',
                'number'       => '',
                'title_li'     => '',
                'walker'       => new Custom_Walker_Page()
            );

            wp_list_pages($args);

            ?>
        </ul>


        <div class="footer__contacts">
            <h3 class="footer__title">Контакты</h3>
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
                    <li class="footer__subtitle-item"><?php the_field('adress', 19)  ?></li>
                </ul>
                 <div class="footer__map">
                    <!-- <iframe class="footer_map-size" src="<?php the_field('map',19); ?>"></iframe> -->
                </div>
                <?php get_template_part('commons/social-icons-bottom'); ?>
            </div>

        </div>
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