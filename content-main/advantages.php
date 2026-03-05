<div class="advantages">

    <div class="advantages__wrapper">
        <?php while (have_rows('advantages')) : the_row(); ?>
            <h2 class="advantages__title"><?php the_sub_field('title-main'); ?></h2>
            <div class="advantages__items">

                <div class="advantages__box-wrapper">
                    <div class="advantages__box">
                        <svg class="advantages__icon icon_list">
                            <use xlink:href="#list"></use>
                        </svg>
                        <div class="advantages__wrapper-descr">
                            <p class="advantages__subtitle"><?php the_sub_field('title-1'); ?></p>
                            <p class="advantages__description"><?php the_sub_field('description-1'); ?></p>
                        </div>

                    </div>
                    <div class="advantages__box">
                        <svg class="advantages__icon icon_economy">
                            <use xlink:href="#economy"></use>
                        </svg>
                        <div class="advantages__wrapper-descr">
                        <p class="advantages__subtitle"><?php the_sub_field('title-2'); ?></p>
                            <p class="advantages__description"><?php the_sub_field('description-2'); ?></p>
                        </div>
                    </div>
                </div>


                <div class="advantages__box-wrapper">
                    <div class="advantages__box">
                        <svg class="advantages__icon icon_bonus">
                            <use xlink:href="#bonus"></use>
                        </svg>
                        <div class="advantages__wrapper-descr">
                        <p class="advantages__subtitle"><?php the_sub_field('title-3'); ?></p>
                            <p class="advantages__description"><?php the_sub_field('description-3'); ?></p>
                        </div>

                    </div>
                    <div class="advantages__box">
                        <svg class="advantages__icon icon_gift">
                            <use xlink:href="#gift"></use>
                        </svg>
                        <div class="advantages__wrapper-descr">
                        <p class="advantages__subtitle"><?php the_sub_field('title-4'); ?></p>
                            <p class="advantages__description"><?php the_sub_field('description-4'); ?></p>
                        </div>

                    </div>
                </div>


            </div>
    </div>
    <img class="advantages__img" src="<?php the_sub_field('image'); ?>" alt="">
<?php endwhile; ?>

</div>