<div class="document">
    <div class="document__wrapper">

        <?php while (have_rows('document')) : the_row(); ?>
            <h2 class="document__title"><?php the_sub_field('title'); ?></h2>
            <p class="document__text"><?php the_sub_field('description'); ?></p>
            <div class="document__items">

                <a class="document__file image-popup-vertical-fit" href="<?php the_sub_field('img-1'); ?>">
                    <div class="document__shadow"></div>
                    <img class="document__img" width="200" height="280" src="<?php the_sub_field('img-1'); ?>" alt="">
                    <svg class="document__icon icon__search-plus">
                        <use xlink:href="#search-plus"></use>
                    </svg>
                </a>
                <a class="document__file image-popup-vertical-fit" href="<?php the_sub_field('img-2'); ?>">
                    <div class="document__shadow"></div>
                    <img class="document__img" width="200" height="280" src="<?php the_sub_field('img-2'); ?>" alt="">
                    <svg class="document__icon icon__search-plus">
                        <use xlink:href="#search-plus"></use>
                    </svg>
                </a>
                <a class="document__file image-popup-vertical-fit" href="<?php the_sub_field('img-3'); ?>">
                    <div class="document__shadow"></div>
                    <img class="document__img" width="200" height="280" src="<?php the_sub_field('img-3'); ?>" alt="">
                    <svg class="document__icon icon__search-plus">
                        <use xlink:href="#search-plus"></use>
                    </svg>
                </a>


                <a class="document__file" target="_blank" href="<?php the_sub_field('pdf'); ?>">
                    <div class="document__shadow"></div>
                    <img class="document__img" width="200" height="280" src="<?php the_sub_field('img'); ?>" alt="">
                    <svg class="document__icon icon__search-plus">
                        <use xlink:href="#search-plus"></use>
                    </svg>
                </a>

            </div>
        <?php endwhile; ?>

    </div>
</div>