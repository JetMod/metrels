<div class="about">
    <div class="about__wrapper">
    <?php while (have_rows('about')) : the_row(); ?>
        <h2 class="about__title"><?php the_sub_field('title'); ?></h2>
        
            <p class="about__text"><?php the_sub_field('about-1'); ?></p>
            <div class="about__wrapper-img"><img class="about__img" src="<?php the_field('main-bg', get_the_ID())  ?>" alt=""></div>
            <p class="about__text"><?php the_sub_field('about-2'); ?></p>
        <?php endwhile; ?>



    </div>

</div>