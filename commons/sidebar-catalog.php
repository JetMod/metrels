<div class="sidebar sidebar-close">
    <ul class="sidebar__item">
        <?php
        $cat_id = get_cat_id('Категории');
        $args = array(
            'show_option_all'    => '',
            'orderby'            => 'name',
            'order'              => 'ASC',
            'style'              => 'list',
            'show_count'         => 0,
            'hide_empty'         => 0,
            'use_desc_for_title' => 1,
            'child_of'           => 0,
            'feed'               => '',
            'feed_type'          => '',
            'feed_image'         => '',
            'exclude'            => '1',
            'exclude_tree'       => '',
            'include'            => '',
            'hierarchical'       => true,
            'title_li'           => '',
            'number'             => NULL,
            'echo'               => 1,
            'depth'              => 0,
            'current_category'   => 0,
            'pad_counts'         => 0,
            'taxonomy'           => 'category',
            'walker'             => new Custom_Wp_Category(),
            'hide_title_if_empty' => false,
            'separator'          => '',
        );

        wp_list_categories($args);
        ?>
        
        <li class="cat-item sidebar__button sidebar__mobile-item">
            <a href="/services/">Услуги</a>
            <svg class='sidebar__icon'><use xlink:href='#plus'></use></svg>
            <ul class='sidebar__drop'>
                <li class="cat-item sidebar__button">    
                    <a href="/services/bending-the-rail/">Гибка рельс</a>
                </li>
                <li class="cat-item sidebar__button">    
                    <a href="/services/raspil/">Распил рельс</a>
                </li>  
                <li class="cat-item sidebar__button">    
                    <a href="/services/sverlenie/">Сверление рельс</a>
                </li>  
                <li class="cat-item sidebar__button">    
                    <a href="/services/izgotovlenie-po-chertezham-zakazchika/">Изготовление по чертежам Заказчика</a>
                </li>  
                <li class="cat-item sidebar__button">    
                    <a href="/services/dostavka/">Доставка</a>
                </li>    
            </ul>
        </li>   
        
        <?php
        wp_nav_menu(
            [
                'items_wrap' => '%3$s',
                'container' => '',
                'theme_location' => 'middle-menu',
            ]

        ); ?>
    </ul>
</div>