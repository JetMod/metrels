
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
                ?>
            </h1>

            <?php
            $filter_cat_id  = get_queried_object_id();
            $catalog_args   = array(
                'posts_per_page' => -1,
                'category'       => $filter_cat_id,
            );
            $catalog_posts = get_posts($catalog_args);

            // Текстовые поля — чекбоксы с уникальными значениями
            $text_field_defs = [
                'rail_brand'  => 'Марка рельса',
                'steel_grade' => 'Марка стали',
                'gost'        => 'ГОСТ',
            ];

            // Числовые поля — слайдер диапазона
            $range_field_defs = [
                'height_mm'          => 'Высота, мм',
                'length_mm'          => 'Длина, мм',
                'width_mm'           => 'Ширина, мм',
                'weight_1_pcs'       => 'Вес 1 шт.',
                'rail_1_meter_kg'    => 'Вес 1 метра рельса (кг)',
                'measuring_length_m' => 'Мерная длина (м)',
            ];

            $checkbox_options = [];
            $range_options    = [];

            foreach ($catalog_posts as $p) {
                foreach ($text_field_defs as $fname => $flabel) {
                    $val = get_field($fname, $p->ID);
                    if ($val !== '' && $val !== null && $val !== false) {
                        $checkbox_options[$fname]['label']        = $flabel;
                        $checkbox_options[$fname]['values'][$val] = true;
                    }
                }
                foreach ($range_field_defs as $fname => $flabel) {
                    $val = get_field($fname, $p->ID);
                    if ($val !== '' && $val !== null && $val !== false) {
                        $num = floatval($val);
                        if (!isset($range_options[$fname])) {
                            $range_options[$fname] = ['label' => $flabel, 'min' => $num, 'max' => $num];
                        } else {
                            if ($num < $range_options[$fname]['min']) $range_options[$fname]['min'] = $num;
                            if ($num > $range_options[$fname]['max']) $range_options[$fname]['max'] = $num;
                        }
                    }
                }
            }

            foreach ($checkbox_options as &$cdata) {
                $vals = array_keys($cdata['values']);
                sort($vals, SORT_NATURAL);
                $cdata['values'] = $vals;
            }
            unset($cdata);

            // "Состояние" — всегда фиксированные значения
            $checkbox_options['state'] = [
                'label'  => 'Состояние',
                'values' => ['Б/у', 'Новые', 'Старогодние'],
            ];
            ?>

            <div class="catalog-filter" id="catalog-filter" data-category="<?php echo esc_attr($filter_cat_id); ?>">
                <button class="catalog-filter__toggle" type="button">
                    <span>Фильтр товаров</span>
                    <svg class="catalog-filter__toggle-icon" width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="catalog-filter__body">
                    <div class="catalog-filter__groups">

                        <?php if (!empty($range_options)): ?>
                        <div class="catalog-filter__section">
                            <div class="catalog-filter__section-title">Размеры и вес</div>
                            <div class="catalog-filter__ranges">
                                <?php foreach ($range_options as $fname => $rdata): ?>
                                <div class="catalog-filter__group catalog-filter__group--range">
                                    <div class="catalog-filter__group-title"><?php echo esc_html($rdata['label']); ?></div>
                                    <div class="catalog-range-slider"
                                         data-field="<?php echo esc_attr($fname); ?>"
                                         data-min="<?php echo $rdata['min']; ?>"
                                         data-max="<?php echo $rdata['max']; ?>">
                                        <div class="catalog-range-slider__area">
                                            <div class="catalog-range-slider__bubbles">
                                                <span class="catalog-range-slider__bubble catalog-range-slider__bubble--min"><?php echo $rdata['min']; ?></span>
                                                <span class="catalog-range-slider__bubble catalog-range-slider__bubble--max"><?php echo $rdata['max']; ?></span>
                                            </div>
                                            <div class="catalog-range-slider__track-wrap">
                                                <div class="catalog-range-slider__bg"></div>
                                                <div class="catalog-range-slider__fill"></div>
                                                <input type="range"
                                                       class="catalog-range-slider__thumb catalog-range-slider__thumb--min"
                                                       min="<?php echo $rdata['min']; ?>"
                                                       max="<?php echo $rdata['max']; ?>"
                                                       value="<?php echo $rdata['min']; ?>"
                                                       step="1">
                                                <input type="range"
                                                       class="catalog-range-slider__thumb catalog-range-slider__thumb--max"
                                                       min="<?php echo $rdata['min']; ?>"
                                                       max="<?php echo $rdata['max']; ?>"
                                                       value="<?php echo $rdata['max']; ?>"
                                                       step="1">
                                            </div>
                                        </div>
                                        <div class="catalog-range-slider__ticks">
                                            <span><?php echo $rdata['min']; ?></span>
                                            <span><?php echo $rdata['max']; ?></span>
                                        </div>
                                        <input type="hidden" class="catalog-range-slider__hidden-min" name="filter[<?php echo esc_attr($fname); ?>][min]" value="">
                                        <input type="hidden" class="catalog-range-slider__hidden-max" name="filter[<?php echo esc_attr($fname); ?>][max]" value="">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="catalog-filter__section">
                            <div class="catalog-filter__section-title">Характеристики</div>
                            <div class="catalog-filter__checkboxes">
                                <?php foreach ($checkbox_options as $fname => $cdata): ?>
                                <div class="catalog-filter__group">
                                    <div class="catalog-filter__group-title"><?php echo esc_html($cdata['label']); ?></div>
                                    <div class="catalog-filter__options">
                                        <?php foreach ($cdata['values'] as $val): ?>
                                        <label class="catalog-filter__option">
                                            <input type="checkbox" name="filter[<?php echo esc_attr($fname); ?>][]" value="<?php echo esc_attr($val); ?>">
                                            <span><?php echo esc_html($val); ?></span>
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                    <div class="catalog-filter__actions">
                        <button class="catalog-filter__reset" type="button">Сбросить фильтры</button>
                    </div>
                </div>
            </div>

            <div class="catalog__goods">
                <div class="catalog__items" id="catalog-items">
                    <?php foreach ($catalog_posts as $post): ?>
                    <?php setup_postdata($post); ?>
                    <div class="catalog__item">
                        <div class="card">
                            <a class="card__link-overlay" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"></a>
                            <img class="card__img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
                            <h3 class="card__title"><?php the_title() ?></h3>
                            <?php
                            $post_id = get_the_ID();
                            if( get_field('link-gost', $post_id) ):
                            ?>
                                <a class="card__gost" target="_blank" href="<?php the_field('link-gost'); ?>" rel="noopener nofollow noreferrer"><?php the_excerpt() ?></a>
                            <?php endif; ?>
                            <span class="card__gost price"><?php the_field('price'); ?></span>
                            <a class="popup-with-zoom-anim card__button button" href="#small-dialog">Оформить заявку</a>
                        </div>
                    </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="catalog-filter__no-results" style="display:none;">Товары по выбранным фильтрам не найдены.</div>
            </div>

            <?php if (!is_paged()): ?>
                <?php the_archive_description( '<div class="catalog__description">', '</div>' ); ?>
            <?php endif ?>

        </div>

    </div>
</div>
