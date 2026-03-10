
<div class="container productitem">
    <div class="row">
        <div class="col-xs-12">
        <?php if (have_posts()): ?>
            <?php while ( have_posts() ): ?>
            <?php the_post() ?>

            <h1 class="title"><?php the_title(); ?></h1>
            <div class="prodwrap">
                <div class="post-img">
                    <?php $category = get_the_category(); ?>
                    <?php if ( has_post_thumbnail() ): ?>
                        <?php $thumb_id = get_post_thumbnail_id(); ?>
                        <?php $thumb_url = wp_get_attachment_image_src($thumb_id,'large', false); ?>
                        <?php if ( isset($thumb_url[0]) ): ?>
                            <a href="#img-dialog" class="popup-with-zoom-anim"><?php the_post_thumbnail('medium'); ?></a>
                            <div class="modal-content zoom-anim-dialog mfp-hide" id="img-dialog"><?php the_post_thumbnail('large'); ?></div>
                        <?php else: ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <div class="postdescr" id="proddescr">
                    <div class="prodprice"><span class="pricelable">Цена: </span> <span class="card__gost price"><?php the_field('price'); ?></span></div>
                    <div class="prodbtn">
                        <a class="popup-with-zoom-anim card__button button" href="#small-dialog">Оформить заявку</a>
                    </div>
                    <div class="description"><div class="ps-prdtext <?php echo get_field('is_product_page') ? 'js-readmore-block' : '' ?>"><?php the_field('modal-description') ?></div></div>

                    

                    <?php 
                        $post_id = get_the_ID();
                        if( get_field('link-gost', $post_id) ): 
                     ?>
                        
                        <div class="gostlink"><a class="item__gost" target="_blank" href="<?php the_field('link-gost'); ?>" rel="noopener nofollow noreferrer"><?php the_excerpt() ?></a></div>
                
                    <?php endif; ?>        
                    <br>
                    <?php the_field('b/y'); ?>
              <?php the_field('b/y_url'); ?> 
                </div>
            </div>

            <?php
            $rail_char_fields = [
                'Марка рельса'             => get_field('rail_brand'),
                'Высота, мм'               => get_field('height_mm'),
                'Длина, мм'                => get_field('length_mm'),
                'Ширина, мм'               => get_field('width_mm'),
                'Марка стали'              => get_field('steel_grade'),
                'ГОСТ'                     => get_field('gost'),
                'Вес 1 шт.'                => get_field('weight_1_pcs'),
                'Вес 1 метра рельса (кг)'  => get_field('rail_1_meter_kg'),
                'Мерная длина (м)'         => get_field('measuring_length_m'),
            ];
            $state_val = get_field('state');
            if (!empty($state_val)) {
                $rail_char_fields['Состояние'] = is_array($state_val) ? implode(', ', $state_val) : $state_val;
            }
            $rail_char_fields = array_filter($rail_char_fields, function($v) {
                return $v !== '' && $v !== null && $v !== false;
            });
            ?>
            <?php if (!empty($rail_char_fields)): ?>
            <div class="ps-product" style="padding-bottom: 0;">
                <div class="ps-product__block">
                    <div class="ps-product__subtitle">Характеристики:</div>
                    <div class="ps-product__subcontent">
                        <div class="ps-product__specifications">
                            <table class="ps-characteristics">
                                <?php foreach ($rail_char_fields as $label => $value): ?>
                                <tr>
                                    <th><?php echo esc_html($label); ?>:</th>
                                    <td><?php echo esc_html($value); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php $product_page = get_field('product_page') ?>
            <?php if (!!get_field('is_product_page')): ?>
            <div class="ps-product" style="padding-bottom: 0;">
                <?php if (array_key_exists('specifications', $product_page) && !empty($product_page['specifications']) ): ?>
                <div class="ps-product__block">
                    <div class="ps-product__subtitle">Xapaктepиcтики:</div>
                    <div class="ps-product__subcontent">
                        <div class="ps-product__specifications">
                            <table class="ps-characteristics">
                                <?php foreach ($product_page['specifications'] as $characteristic): ?>
                                    <tr>
                                        <th><?php echo $characteristic['title'] ?>:</th>
                                        <td><?php echo $characteristic['value'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif ?>
            </div>
            <?php endif ?>

            <?php $services = get_pages(['parent' => 22]) ?>
            
            <div class="ps-product__block">
                <div class="ps-product__subtitle">Услуги:</div>
                <div class="ps-product__subcontent">
                    <div class="ps-product__delivery">
                        <div class="ps-delivery ps-delivery-new">
                            <?php if (!empty($services)): ?>
                            <table class="ps-delivery__table">
                                <thead>
                                    <tr>
                                        <th>Услуга</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($services as $service): ?>
                                    <tr>
                                        <td>
                                            <a href="<?= get_permalink($service) ?>"><?= get_the_title($service) ?></a>
                                        </td>
                                        <td><a href="#small-dialog" class="popup-with-zoom-anim navbar__button service_popup_btn">Уточнить у менеждера</a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php endif ?>
                        </div>
                        <div class="ps-delivery__notice">
                            Доставим в короткие сроки в любой регион на Ваш объект или производство. Перевезем собственным автотранспортом. Также оформляем ж/д перевозки. При необходимости груз страхуем и сопровождаем.
                        </div>
                    </div>
                </div>
            </div>

            <?php $similar_products = get_field('similar_products') ?>
            <?php if (!empty($similar_products)): ?>
            <?php $similar_products = get_posts(['posts_per_page' => -1, 'post__in' => $similar_products]) ?>
            <div class="similar-products">
                <h4 class="services__title">Похожие товары</h1>
                <div class="catalog__items">
                    <?php foreach ($similar_products as $post): ?>
                    <?php setup_postdata($post) ?>
                    <div class="catalog__item">
                        <div class="card">
                            <img class="card__img" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
                            <h3 class="card__title">
                                <a class="" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </h3>

                            <?php if(get_field('link-gost', $post->ID)): ?>
                            <a class="card__gost" target="_blank" href="<?php the_field('link-gost') ?>" rel="noopener nofollow noreferrer"><?php the_excerpt() ?></a>
                            <?php endif ?>

                            <span class="card__gost price"><?php the_field('price') ?></span>
                            <a class="popup-with-zoom-anim card__button button" href="#small-dialog">Оформить заявку</a>

                            <a class="card__gost" href="https://metrels.ru/shpaly/shpaly-sh-1/">Подробнее</a>
                        </div>
                    </div>
                    <?php endforeach; wp_reset_postdata() ?>
                </div>
            </div>
            <?php endif ?>


            <?php endwhile ?>
        <?php endif ?>
        </div>
    </div>
</div>