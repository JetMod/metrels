<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    
    
    <?php the_field('yandex-metrica', 213) ?>
    <?php the_field('google-analytics', 213) ?>
    
    
    <style>
    .cback-circle {
        background: #3CB868;
        color: #3CB868;
    }
</style>
</head>

<body <?php body_class('page') ?>>
<?php get_template_part('commons/sprite'); ?>
<?php get_template_part('commons/nav'); ?>

<header class="header">
    <div class="logo">
        <?php the_custom_logo(); ?>

<div class="toptext">
  <div>
<div class="tcent"><p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ООО «Метрельс» </p></div> 
&nbsp;&nbsp;&nbsp;Ответственность и гибкий подход&nbsp;&nbsp;<br>к каждому заказчику
    </div>
</div>
    </div>
   
<div class="padtop">
</div>  

    <?php get_template_part('commons/social-icons'); ?>
    
    <a class="header__mobile-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
        <img src="<?php echo esc_url( get_site_url() . '/wp-content/uploads/2026/02/160-160.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="80" height="80">
    </a>
<a class="navbar__mail" href="mailto:sale.metrels@yandex.ru">sale.metrels@yandex.ru</a>
    <div class="phone-block">
        <?php
        for ($i = 1; $i < 3; $i++) {
            $data = 'phone-' . $i;
            if (get_field($data, 19)) {
                $output .= "<div class='phone-block_several'><svg class='icon phone-block_icon'><use xlink:href='#phone'></use></svg>";
                $output .= "<div class='phone-block__title'>";
                $output .= "<a href='tel:";
                $output .= str_replace(' ', '', get_field($data, 19));
                $output .= "'>";
                $output .= number_correct(get_field($data, 19));
                $output .= "</a></div></div>";
                echo $output;
                $data = '';
                $output = "";
            } else {
                break;
            }
        }

        ?>

    </div>
    <a class="popup-with-zoom-anim button header__button" href="#small-dialog">Оформить заявку</a>
    <div class="callback zoom-anim-dialog mfp-hide" id="small-dialog">
        <?php get_template_part('commons/callback-form'); ?>
    </div>
    <div class="header__company">
        <p class="header-navigation">ООО "МетРельс"</p>
    </div>

    <div class="cback">
        
        <a href="tel:<?php echo str_replace(' ', '', get_field('phone-1', 19)); ?>">
            <div class="cback-circle fn1"></div>
            <div class="cback-circle fn2"></div>
            <div class="cback-circle cback-circle--phone">
                <i class='phone-icon'></i>
                <span style="display:none">КНОПКА<br>СВЯЗИ</span>
            </div>
        </a>
    </div>
    <a id="whatsaap__btn-wrap" target="_blank" href="<?php echo get_field('whatsaap', 19); ?>">
        <svg id="whatsaap__icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             width="40" height="40"
             viewBox="0 0 40 40">
            <defs>
                <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#61fd7d"/>
                    <stop offset="1" stop-color="#2bb826"/>
                </linearGradient>
            </defs>
            <g id="whatsapp-icon" transform="translate(0.021 -0.978)">
                <path id="Path_1" data-name="Path 1"
                      d="M39.976,30.827c0,.219-.007.694-.02,1.061a21.067,21.067,0,0,1-.211,2.584,8.607,8.607,0,0,1-.724,2.165,7.707,7.707,0,0,1-3.393,3.39,8.625,8.625,0,0,1-2.177.725,21.144,21.144,0,0,1-2.564.207c-.367.013-.842.02-1.061.02l-19.7,0c-.219,0-.694-.007-1.061-.02a21.076,21.076,0,0,1-2.584-.211A8.608,8.608,0,0,1,4.32,40.02,7.708,7.708,0,0,1,.93,36.626a8.623,8.623,0,0,1-.725-2.177A21.159,21.159,0,0,1,0,31.885c-.013-.367-.02-.842-.02-1.06l0-19.7c0-.219.007-.694.02-1.061A21.074,21.074,0,0,1,.213,7.484,8.606,8.606,0,0,1,.937,5.319a7.708,7.708,0,0,1,3.393-3.39A8.626,8.626,0,0,1,6.508,1.2,21.142,21.142,0,0,1,9.072,1c.367-.013.842-.02,1.06-.02l19.7,0c.219,0,.694.007,1.061.02a21.076,21.076,0,0,1,2.584.211,8.606,8.606,0,0,1,2.165.724,7.707,7.707,0,0,1,3.39,3.393,8.623,8.623,0,0,1,.725,2.177,21.167,21.167,0,0,1,.207,2.564c.013.367.02.842.02,1.061l0,19.7Z"
                      fill="url(#linear-gradient)"/>
                <g id="Group_1" data-name="Group 1" transform="translate(5.969 6.239)">
                    <path id="Path_2" data-name="Path 2"
                          d="M177.851,139.792a14.342,14.342,0,0,0-22.571,17.3l-2.034,7.429,7.6-1.993a14.334,14.334,0,0,0,6.853,1.745h.006a14.341,14.341,0,0,0,10.144-24.478Zm-10.144,22.057h0a11.9,11.9,0,0,1-6.067-1.661l-.435-.258-4.511,1.183,1.2-4.4-.284-.451a11.92,11.92,0,1,1,10.1,5.584Zm6.538-8.924c-.358-.179-2.12-1.046-2.448-1.165s-.567-.179-.806.179-.925,1.165-1.135,1.4-.418.269-.776.09a9.787,9.787,0,0,1-2.882-1.778,10.794,10.794,0,0,1-1.993-2.481c-.209-.359-.022-.552.157-.731.161-.16.358-.418.537-.628a2.443,2.443,0,0,0,.358-.6.659.659,0,0,0-.03-.628c-.09-.179-.806-1.942-1.1-2.66-.291-.7-.586-.6-.806-.615s-.448-.013-.687-.013a1.316,1.316,0,0,0-.955.448,4.017,4.017,0,0,0-1.254,2.988,6.966,6.966,0,0,0,1.463,3.705A15.971,15.971,0,0,0,168,155.854a20.617,20.617,0,0,0,2.043.755,4.915,4.915,0,0,0,2.257.142,3.69,3.69,0,0,0,2.419-1.7,2.993,2.993,0,0,0,.209-1.7C174.842,153.194,174.6,153.1,174.245,152.925Z"
                          transform="translate(-153.246 -135.588)" fill="#fff"/>
                </g>
            </g>
        </svg>

    </a>

</header>

<?php get_template_part('commons/sidebar-catalog'); ?>



<?php 
$hide_breadcrumbs = false;

$breadcrumbs = [];
$categories = get_the_category();

if ( is_page() && !is_front_page() ) {

    $breadcrumbs['Главная'] = home_url();

    

    $parent_id = wp_get_post_parent_id( get_the_ID() );

    if ( $parent_id ){
        $breadcrumbs[get_the_title($parent_id)] = get_permalink($parent_id);
        $breadcrumbs[get_the_title()] = '';
    } else {
        $breadcrumbs[get_the_title()] = '';
    }
}

if ( is_category() ){
    $category = get_queried_object();
    $ancestors = get_ancestors( $category->term_id, 'category' );
    $breadcrumbs['Главная'] = home_url();

    if ( ! empty( $ancestors ) ) {
        $parent_category_id = end( $ancestors ); // Получаем ID родительской рубрики

        $parent_category = get_category( $parent_category_id );
        $breadcrumbs[$parent_category->name] = get_category_link( $parent_category_id );
        $breadcrumbs[$category->name] = '';
    } else {
        
        $breadcrumbs[$category->name] = '';
    }
}

if ( is_single() ) {
    $breadcrumbs['Главная'] = home_url();

    $categories = get_the_category( $post_id );
    
    

    foreach( $categories as $category ) {

        
        $breadcrumbs[$category->name] = get_category_link($category->term_id);
    }
    $breadcrumbs[get_the_title()] = '';
}
?>


<?php if (!empty($breadcrumbs) && !$hide_breadcrumbs ):?>
    <div class = "content">    
        <nav class="breadcrumbs">
            <?php foreach ($breadcrumbs as $title => $link): ?>
                <?php if ($link): ?>
                    <a href="<?=$link;?>" class="breadcrumbs__link"><?=$title?></a>
                <?php else: ?>    
                    <a class="breadcrumbs__link"><?=$title?></a>
                <?php endif; ?>    
            <?php endforeach; ?>
        </nav>
    </div>
<?php endif; ?>