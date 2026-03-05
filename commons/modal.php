<div class=" modal-content zoom-anim-dialog mfp-hide" id="<?php echo get_the_ID(); ?>-dialog">
    <h3 class="card__title modal__title"><?php the_title() ?></h3>
    <img class="card__img modal__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
    <div class="modal__description"><?php the_field('modal-description') ?></div>
    <a class="card__gost" target="_blank" href="<?php the_field('link-gost'); ?>"><?php the_excerpt() ?></a>
</div>