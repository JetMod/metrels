<div class="hello">
    <div class="hello__slide">
        <img class="hello__picture" src="<?php the_field('main-bg', get_the_ID())  ?>" alt="">
        <div class="hello__form">
            <div class="callback slider__callback">
                <?php get_template_part('commons/callback-form'); ?>
            </div>
        </div>
    </div>
</div>