    <form class="callback__form" action="<?php bloginfo('template_url'); ?>/handler.php" method="POST">
        <input class="callback__field" name="user_page" type="hidden" value="<?php if (is_page()) {
                                                                                    the_title();
                                                                                } elseif (is_category())
                                                                                    echo get_queried_object()->name;
                                                                                ?>">
        <div class="callback__block">
            <label class="callback__tag">Имя:</label>
            <input class="callback__name callback__field" name="user_name" required placeholder="Иван" type="text">
        </div>
        <div class="callback__block">
            <label class="callback__tag">Телефон:</label>
            <input class="callback__phone callback__field phone" name="user_phone" required placeholder="+7 999 999-99-99" type="text">
        </div>
        <div class="callback__block">
            <label class="callback__tag">Сообщение:</label>
            <textarea class="callback__message callback__field" name="user_message" ></textarea>
        </div>
      
        <div class="callback__block">
            <label class="callback__tag">Защита от роботов:</label>
            <div 
                style="height: 100px"
                id="<?php $uid=uniqid(); echo $uid;?>"
                class="smart-captcha"
            ></div>
        </div>
          
        <label class="callback__block checkbox">
            <input type="checkbox" required>
            <span class="checkbox__text">Я принимаю условия 
                <a class="checkbox__href" target="_blank" <?php if (get_field('privacy-policy',213)): ?> href="<?php the_field('privacy-policy',213); ?>"><?php endif; ?>пользовательского соглашения</a> и даю согласие на обработку моих 
                <a class="checkbox__href" target="_blank" <?php if (get_field('personal-data',213)): ?> href="<?php the_field('personal-data',213); ?>"><?php endif; ?>персональных данных</a>
            </span>
        </label>

        <button class="callback__button button button_form" id="button-<?php echo $uid;?>" type="submit" disabled>Консультация</button>
        <span class="callback-answer"></span>
      <style>
        .button_form:disabled {
            box-shadow: 0 0 10px #e40e00;
            background: #9b9090;
        }
        </style>
    </form>