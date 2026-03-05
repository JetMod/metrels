
<div class="catalog">
    <div class="catalog__wrapper services__wrapper ">
        <?php get_template_part('commons/sidebar-mini'); ?>
        <div class="catalog__content services__content">
            <h1 class=" catalog__title services__title">
                <?php
               
                if ( is_category()) {
                    
                    
                    
                    $category_title = get_field('category_title', get_queried_object());


                    if( $category_title ) {

                        echo $category_title;

                    } else {
                        echo get_queried_object()->name ;
                    }
                }
                /*} else {
                    the_title();
                }*/

                ?>
            </h1>
            <div class="catalog__goods">
                <div class="catalog__items">


                    <?php
                    $IdId = get_queried_object_id();
                    $args = array(
                        'posts_per_page' => -1,
                        'category' =>  $IdId
                    );
                    $lastposts = get_posts($args);
                    foreach ($lastposts as $post) {
                        setup_postdata($post);
                        ?>
                        <div class="catalog__item">
                            <div class="card">
                                <img class="card__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
                                <h3 class="card__title"><a class="" href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                                <?php 
                                    $post_id = get_the_ID();
                                    if( get_field('link-gost', $post_id) ): 
                                ?>
                                    <a class="card__gost" target="_blank" href="<?php the_field('link-gost'); ?>" rel="noopener nofollow noreferrer"><?php the_excerpt() ?></a>
                                <?php endif; ?>        
                                <span class="card__gost price"><?php the_field('price'); ?></span>
                                <a class="popup-with-zoom-anim card__button button" href="#small-dialog">Оформить заявку</a>
                                
                                <a class="card__gost" href="<?php the_permalink(); ?>">Подробнее</a>
                                <?php //get_template_part('commons/modal'); ?>
                            </div>
                        </div>
                    <?php }
                    wp_reset_postdata(); ?>

                </div>

            </div>

            <?php if (!is_paged()): ?>
                <?php the_archive_description( '<div class="catalog__description">', '</div>' ); ?>
            <?php endif ?>

        </div>

    </div>
</div>