<div class="mini-sidebar">
    <?php
    if (is_category() && have_posts()) {
        // получим ID текущей категории

        $current_cat_id = get_queried_object()->term_id;
        $current_cat_parent_id = get_queried_object()->parent;
        $args_1 = array(
            'child_of' => $current_cat_id,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 0,
            'hierarchical' => 1,
            'number' => 0, // сколько выводить?
            // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
        );
        $args_2 = array(
            'child_of' => $current_cat_parent_id,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 0,
            'hierarchical' => 1,
            'number' => 0, // сколько выводить?
            // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
        );

        $categories_1 = get_categories($args_1);
        $categories_2 = get_categories($args_2);



        // если категории нашлись
        if ($categories_1) {
            $output .= "<ul class='mini-sidebar__tags'>";
            foreach ($categories_1 as $cat) {
                // тут выводим HTMl каждого блока категории
                // Данные в объекте $cat
                $child_id =  $cat->cat_ID;
                $output .= "<li>";
                $output .= "<a href='";
                $output .= get_category_link($child_id);
                $output .= "'>";
                $output .= $cat->name;
                $output .= '</a> ';
                $output .= "</li>";
                // $cat->term_id
                // $cat->name (Рубрика 1)
                // $cat->slug (rubrika-1)
                // $cat->term_group (0)
                // $cat->term_taxonomy_id (4)
                // $cat->taxonomy (category)
                // $cat->description (Текст описания)
                // $cat->parent (0)
                // $cat->count (14)
                // $cat->object_id (2743)
                // $cat->cat_ID (4)
                // $cat->category_count (14)
                // $cat->category_description (Текст описания)
                // $cat->cat_name (Рубрика 1)
                // $cat->category_nicename (rubrika-1)
                // $cat->category_parent (0)

            }
            $output .=  "</ul>";
            echo $output;
        } else {
            $output .= "<ul class='mini-sidebar__tags'>";
            foreach ($categories_2 as $cat) {
                // тут выводим HTMl каждого блока категории
                // Данные в объекте $cat
                $child_id =  $cat->cat_ID;
                $output .= "<li>";
                $output .= "<a href='";
                $output .= get_category_link($child_id);
                $output .= "'>";
                $output .= $cat->name;
                $output .= '</a> ';
                $output .= "</li>";
                // $cat->term_id
                // $cat->name (Рубрика 1)
                // $cat->slug (rubrika-1)
                // $cat->term_group (0)
                // $cat->term_taxonomy_id (4)
                // $cat->taxonomy (category)
                // $cat->description (Текст описания)
                // $cat->parent (0)
                // $cat->count (14)
                // $cat->object_id (2743)
                // $cat->cat_ID (4)
                // $cat->category_count (14)
                // $cat->category_description (Текст описания)
                // $cat->cat_name (Рубрика 1)
                // $cat->category_nicename (rubrika-1)
                // $cat->category_parent (0)

            }
            $output .=  "</ul>";
            echo $output;
        }
    } elseif (is_page('')) {
        $args = array(
            'theme_location'    => 'footer-menu',
            'container'     => 'none',
            'menu_class'        => 'mini-sidebar__tags',
            'echo'          => true,
            'items_wrap'        => '<ul  class="%2$s">%3$s</ul>',
            'depth'         => 0
        );

        // print menu
        wp_nav_menu($args);
    }
    ?>


</div>