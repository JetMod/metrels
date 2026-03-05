<h1 class="mainpage">Продажа материалов верхнего строения пути (ВСП)</h1>
<div id="slider">
    <a href="#" class="control_next">&gt;</a>
    <a href="#" class="control_prev">&lt;</a> 
    
    <?php if (have_rows('banners')) : ?> 
    <ul>
    <?php while ( have_rows('banners') ) : the_row(); ?>
            <li>
                <a class="slider__item" href="<?php the_sub_field('banner-href-1') ?>">
                    <img width="1200" height="200" src="<?php the_sub_field('banner-1') ?>" alt="">
                    <p><?php the_sub_field('banner-description-1') ?></p>
                </a>
            </li>
            <li>
                <a class="slider__item" href="<?php the_sub_field('banner-href-2') ?>">
                    <img width="1200" height="200" src="<?php the_sub_field('banner-2') ?>" alt="">
                    <p><?php the_sub_field('banner-description-2') ?></p>
                </a>
            </li>
            <li>
                <a class="slider__item" href="<?php the_sub_field('banner-href-3') ?>">
                    <img width="1200" height="200" src="<?php the_sub_field('banner-3') ?>" alt="">
                    <p><?php the_sub_field('banner-description-3') ?></p>
                </a>
            </li>
            <?php endwhile; ?>
    </ul>
        <?php else : ?>
            <style>
                #slider {display: none;}
            </style>
        <?php endif; ?>
</div>