<nav class="navbar">
    <div class="navbar__wrapper">
        <div class="navbar__burger">
            <svg class="icon icon__burger">
                <use xlink:href="#burger"></use>
            </svg>
        </div>

        <ul class="navbar__panel">
            <?php wp_nav_menu(
                [
                    'items_wrap' => '%3$s',
                    'container' => '',
                    'theme_location' => 'header-menu'
                ]

            ); ?>
        </ul>

 <div class="work-time">
        <div class=" work-time_week work-time__weekdays">
            <svg class="icon">
                <use xlink:href="#time"></use>
            </svg>
            <p class="work-time__title"><?php the_field('work-time-week', 19) ?></p>
        </div>
    </div>
        <div class="navbar__callback">
            <a class="popup-with-zoom-anim button navbar__button" href="#small-dialog">Заказать звонок</a>
            
        </div>

    </div>
</nav>