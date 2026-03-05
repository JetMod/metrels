<?php
/*
Template Name: Категории
Template Post Type: post,page
*/
?>
<?php get_header(); 
If ( is_single() ) { ?>
<div class="content">
    <?php get_template_part('content-catalog/catalog-single'); ?>
   
</div>
<?
} else {
?>

<div class="content">
    <?php get_template_part('content-catalog/catalog'); ?>
   
</div>
<?
}
?>

<?php get_footer(); ?>