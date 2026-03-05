<?php
/*
Template Name: Главная
*/
?>
<?php get_header(); ?>

<div class="content">
    <?php get_template_part('content-main/ads'); ?>
    <?php get_template_part('content-main/hello'); ?>
    <?php// get_template_part('content-main/about'); ?>
    <?php get_template_part('content-main/advantages'); ?>
    <?php get_template_part('content-main/document'); ?>

    <?php
        $content = get_the_content();        
        if ( !empty($content) ):
    ?>
    <div class="document">
        <div class="document__wrapper">
            <?=$content;?>
        </div>
    </div>

    <?php endif; ?>


</div>

<?php get_footer(); ?>