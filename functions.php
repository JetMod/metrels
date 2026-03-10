<?php

/**
 * Robot.txt
 */
add_action('do_robotstxt', 'my_robotstxt');
function my_robotstxt()
{

	$lines = [
		'User-agent: Yandex',
		'Disallow: /wp-content/themes/metrels/handler.php',
		'Disallow: /wp-content/themes/metrels/assets',
		'Disallow: /wp-content/themes/metrels/mailer',
		'Disallow: /wp-content/themes/metrels/index.php',
		'Disallow: /wp-admin',
		'Disallow: /wp-includes',
		'Disallow: /wp-content/plugins',
		'Disallow: /wp-json/',
		'Disallow: /wp-login.php',
		'Disallow: /wp-register.php',
		'Disallow: */embed',
		'Disallow: */page/',
		'Disallow: /cgi-bin',
		'Disallow: *?s=',
		'Allow: /wp-admin/admin-ajax.php',
		'Host: https://metrels.ru',
		'User-agent: *',
		'Disallow: /wp-admin',
		'Disallow: /wp-includes',
		'Disallow: /wp-content/plugins',
		'Disallow: /wp-json/',
		'Disallow: /wp-login.php',
		'Disallow: /wp-register.php',
		'Disallow: */embed',
		'Disallow: */page/',
		'Disallow: /cgi-bin',
		'Disallow: *?s=',
		'Allow: /wp-admin/admin-ajax.php',
		'Sitemap: https://metrels.ru/sitemap.xml',
		'User-agent: svetabot/1.0',
		'Disallow: /',
	];

	echo implode("\r\n", $lines);

	die; // обрываем работу PHP
}

/**
 * Robot.txt
 */

/**
 * Remove Head
 */
function my_deregister_scripts()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

wp_enqueue_style('wp-block-library');
add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
	wp_dequeue_style('wp-block-library');
}


remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'rsd_link');

remove_action('wp_head', 'rel_canonical');

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);

remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');

remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

function ny_remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'ny_remove_recent_comments_style');
/**
 * Remove Head
 */

/**
 * Регистрация стилей
 */
function register_styles()
{
	wp_register_style('fonts', get_template_directory_uri() .
		'/css/fonts.css');
	wp_register_style('popup', get_template_directory_uri() .
		'/css/popup.css');
	wp_register_style('style', get_template_directory_uri() .
		'/style.css?v=1.03');
	wp_enqueue_style('fonts');
	wp_enqueue_style('popup');
	wp_enqueue_style('style');
	
}

add_action('wp_enqueue_scripts', 'register_styles');
/**
 * Регистрация стилей
 */


/**
 * Регистрация скриптов
 */

function load_my_scripts()
{
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), NULL, true);
	wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), NULL, true);
	wp_enqueue_script('maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array('jquery'), NULL, true);
	wp_enqueue_script('magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), NULL, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery', 'magnific', 'maskedinput'), NULL, true);
}

add_action('wp_enqueue_scripts', 'load_my_scripts');
/**
 * Регистрация скриптов
 */



/**
 * Пользовательский логотип
 */
add_theme_support('custom-logo');

/**
 * Пользовательский логотип
 */




/**
 * Регистрация меню
 */
add_action('after_setup_theme', function () {
	register_nav_menus(
		[
			'header-menu' => 'Верхняя область',
			'middle-menu' => 'Средняя область',
			'footer-menu' => 'Нижняя область',
			'footer-first-menu' => 'Нижняя область 1 колонка',
			'footer-second-menu' => 'Нижняя область 2 колонка',
			'footer-third-menu' => 'Нижняя область 3 колонка'
		]
	);
});
/**
 * Регистрация меню
 */


/**
 * Walker_nav_menu
 */

class Custom_Nav_Menu extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);

		// Default class.
		$classes = array('sub-menu');

		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$output .= "{$n}{$indent}<ul class='sidebar__drop'>{$n}";
	}
}
/**
 * Walker_nav_menu
 */


/**
 * Вывод titles
 */

add_theme_support('title-tag');
/**
 * Вывод titles
 */

/**
 * Вывод thumbnails из post
 */
add_theme_support('post-thumbnails', array('post', 'page'));
/**
 * Вывод thumbnails из post
 */



/**
 * Возможность загружать изображения для терминов (элементов таксономий: категории, метки).
 *
 * Пример получения ID и URL картинки термина:
 *     $image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
 *     $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
 *
 * @author: Kama http://wp-kama.ru
 *
 * @version 3.0
 */
if (is_admin() && !class_exists('Term_Meta_Image')) {

	// init
	//add_action('current_screen', 'Term_Meta_Image_init');
	add_action('admin_init', 'Term_Meta_Image_init');
	function Term_Meta_Image_init()
	{
		$GLOBALS['Term_Meta_Image'] = new Term_Meta_Image();
	}

	class Term_Meta_Image
	{

		// для каких таксономий включить код. По умолчанию для всех публичных
		static $taxes = []; // пример: array('category', 'post_tag');

		// название мета ключа
		static $meta_key = '_thumbnail_id';
		static $attach_term_meta_key = 'img_term';

		// URL пустой картинки
		static $add_img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAQMAAABKLAcXAAAABlBMVEUAAAC7u7s37rVJAAAAAXRSTlMAQObYZgAAACJJREFUOMtjGAV0BvL/G0YMr/4/CDwY0rzBFJ704o0CWgMAvyaRh+c6m54AAAAASUVORK5CYII=';

		public function __construct()
		{
			// once
			if (isset($GLOBALS['Term_Meta_Image']))
				return $GLOBALS['Term_Meta_Image'];

			$taxes = self::$taxes ? self::$taxes : get_taxonomies(['public' => true], 'names');

			foreach ($taxes as $taxname) {
				add_action("{$taxname}_add_form_fields",   [$this, 'add_term_image'],     10, 2);
				add_action("{$taxname}_edit_form_fields",  [$this, 'update_term_image'],  10, 2);
				add_action("created_{$taxname}",           [$this, 'save_term_image'],    10, 2);
				add_action("edited_{$taxname}",            [$this, 'updated_term_image'], 10, 2);

				add_filter("manage_edit-{$taxname}_columns",  [$this, 'add_image_column']);
				add_filter("manage_{$taxname}_custom_column", [$this, 'fill_image_column'], 10, 3);
			}
		}

		## поля при создании термина
		public function add_term_image($taxonomy)
		{
			wp_enqueue_media(); // подключим стили медиа, если их нет

			add_action('admin_print_footer_scripts', [$this, 'add_script'], 99);
			$this->css();
			?>
			<div class="form-field term-group">
				<label><?php _e('Image', 'default'); ?></label>
				<div class="term__image__wrapper">
					<a class="termeta_img_button" href="#">
						<img src="<?php echo self::$add_img_url ?>" alt="">
					</a>
					<input type="button" class="button button-secondary termeta_img_remove" value="<?php _e('Remove', 'default'); ?>" />
				</div>

				<input type="hidden" id="term_imgid" name="term_imgid" value="">
			</div>
		<?php
				}

				## поля при редактировании термина
				public function update_term_image($term, $taxonomy)
				{
					wp_enqueue_media(); // подключим стили медиа, если их нет

					add_action('admin_print_footer_scripts', [$this, 'add_script'], 99);

					$image_id = get_term_meta($term->term_id, self::$meta_key, true);
					$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : self::$add_img_url;
					$this->css();
					?>
			<tr class="form-field term-group-wrap">
				<th scope="row"><?php _e('Image', 'default'); ?></th>
				<td>
					<div class="term__image__wrapper">
						<a class="termeta_img_button" href="#">
							<?php echo '<img src="' . $image_url . '" alt="">'; ?>
						</a>
						<input type="button" class="button button-secondary termeta_img_remove" value="<?php _e('Remove', 'default'); ?>" />
					</div>

					<input type="hidden" id="term_imgid" name="term_imgid" value="<?php echo $image_id; ?>">
				</td>
			</tr>
		<?php
				}

				public function css()
				{
					?>
			<style>
				.termeta_img_button {
					display: inline-block;
					margin-right: 1em;
				}

				.termeta_img_button img {
					display: block;
					float: left;
					margin: 0;
					padding: 0;
					min-width: 100px;
					max-width: 150px;
					height: auto;
					background: rgba(0, 0, 0, .07);
				}

				.termeta_img_button:hover img {
					opacity: .8;
				}

				.termeta_img_button:after {
					content: '';
					display: table;
					clear: both;
				}
			</style>
		<?php
				}

				## Add script
				public function add_script()
				{
					// выходим если не на нужной странице таксономии
					//$cs = get_current_screen();
					//if( ! in_array($cs->base, array('edit-tags','term')) || ! in_array($cs->taxonomy, (array) $this->for_taxes) )
					//  return;

					$title = __('Featured Image', 'default');
					$button_txt = __('Set featured image', 'default');
					?>
			<script>
				jQuery(document).ready(function($) {
					var frame,
						$imgwrap = $('.term__image__wrapper'),
						$imgid = $('#term_imgid');

					// добавление
					$('.termeta_img_button').click(function(ev) {
						ev.preventDefault();

						if (frame) {
							frame.open();
							return;
						}

						// задаем media frame
						frame = wp.media.frames.questImgAdd = wp.media({
							states: [
								new wp.media.controller.Library({
									title: '<?php echo $title ?>',
									library: wp.media.query({
										type: 'image'
									}),
									multiple: false,
									//date:   false
								})
							],
							button: {
								text: '<?php echo $button_txt ?>', // Set the text of the button.
							}
						});

						// выбор
						frame.on('select', function() {
							var selected = frame.state().get('selection').first().toJSON();
							if (selected) {
								$imgid.val(selected.id);
								$imgwrap.find('img').attr('src', selected.sizes.thumbnail.url);
							}
						});

						// открываем
						frame.on('open', function() {
							if ($imgid.val()) frame.state().get('selection').add(wp.media.attachment($imgid.val()));
						});

						frame.open();
					});

					// удаление
					$('.termeta_img_remove').click(function() {
						$imgid.val('');
						$imgwrap.find('img').attr('src', '<?php echo self::$add_img_url ?>');
					});
				});
			</script>

<?php
		}

		## Добавляет колонку картинки в таблицу терминов
		public function add_image_column($columns)
		{
			// fix column width
			add_action('admin_notices', function () {
				echo '<style>.column-image{ width:50px; text-align:center; }</style>';
			});

			// column without name
			return array_slice($columns, 0, 1) + ['image' => ''] + $columns;
		}

		public function fill_image_column($string, $column_name, $term_id)
		{

			if ('image' === $column_name && $image_id = get_term_meta($term_id, self::$meta_key, 1)) {
				$string = '<img src="' . wp_get_attachment_image_url($image_id, 'thumbnail') . '" width="50" height="50" alt="" style="border-radius:4px;" />';
			}

			return $string;
		}

		## Save the form field
		public function save_term_image($term_id, $tt_id)
		{
			if (isset($_POST['term_imgid']) && $attach_id = (int) $_POST['term_imgid']) {
				update_term_meta($term_id,   self::$meta_key,             $attach_id);
				update_post_meta($attach_id, self::$attach_term_meta_key, $term_id);
			}
		}

		## Update the form field value
		public function updated_term_image($term_id, $tt_id)
		{
			if (!isset($_POST['term_imgid']))
				return;

			$cur_term_attach_id = (int) get_term_meta($term_id, self::$meta_key, 1);

			if ($attach_id = (int) $_POST['term_imgid']) {
				update_term_meta($term_id,   self::$meta_key,             $attach_id);
				update_post_meta($attach_id, self::$attach_term_meta_key, $term_id);

				if ($cur_term_attach_id != $attach_id)
					wp_delete_attachment($cur_term_attach_id);
			} else {
				if ($cur_term_attach_id)
					wp_delete_attachment($cur_term_attach_id);

				delete_term_meta($term_id, self::$meta_key);
			}
		}
	}
}
/**
 * 3.0 - 2019-04-24 - Баг: колонка заполнялась без проверки имени колонки.
 * 2.9 Добавил метаполе для вложений (img_term), где хранится ID термина к которому прикреплено вложение.
 *     Добавил физическое удаление картинки (файла вложения) при удалении его у термина.
 * 2.8 Исправил ошибку удаления картинки.
 */





/**
 * Вывод категорий
 */

class Custom_Wp_Category extends Walker_Category
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		if ('list' != $args['style']) {
			return;
		}

		$indent  = str_repeat("\t", $depth);
		$output .= "$indent<ul class='sidebar__drop'>\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array())
	{
		if ('list' != $args['style']) {
			return;
		}

		$indent  = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
	{
		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters(
			'list_cats',
			esc_attr($category->name),
			$category
		);

		// Don't generate an element if the category name is empty.
		if ('' === $cat_name) {
			return;
		}

		$atts         = array();
		$atts['href'] = get_term_link($category);

		if ($args['use_desc_for_title'] && !empty($category->description)) {
			/**
			 * Filters the category description for display.
			 *
			 * @since 1.2.0
			 *
			 * @param string $description Category description.
			 * @param object $category    Category object.
			 */
			//$atts['title'] = strip_tags(apply_filters('category_description', $category->description, $category));
		}

		/**
		 * Filters the HTML attributes applied to a category list item's anchor element.
		 *
		 * @since 5.2.0
		 *
		 * @param array   $atts {
		 *     The HTML attributes applied to the list item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $href  The href attribute.
		 *     @type string $title The title attribute.
		 * }
		 * @param WP_Term $category Term data object.
		 * @param int     $depth    Depth of category, used for padding.
		 * @param array   $args     An array of arguments.
		 * @param int     $id       ID of the current category.
		 */
		$atts = apply_filters('category_list_link_attributes', $atts, $category, $depth, $args, $id);

		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (!empty($value)) {
				$value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$link = sprintf(
			'<a%s>%s</a>',
			$attributes,
			$cat_name
		);

		if (!empty($args['feed_image']) || !empty($args['feed'])) {
			$link .= ' ';

			if (empty($args['feed_image'])) {
				$link .= '(';
			}

			$link .= '<a href="' . esc_url(get_term_feed_link($category->term_id, $category->taxonomy, $args['feed_type'])) . '"';

			if (empty($args['feed'])) {
				/* translators: %s: category name */
				$alt = ' alt="' . sprintf(__('Feed for all posts filed under %s'), $cat_name) . '"';
			} else {
				$alt   = ' alt="' . $args['feed'] . '"';
				$name  = $args['feed'];
				$link .= empty($args['title']) ? '' : $args['title'];
			}

			$link .= '>';

			if (empty($args['feed_image'])) {
				$link .= $name;
			} else {
				$link .= "<img src='" . esc_url($args['feed_image']) . "'$alt" . ' />';
			}
			$link .= '</a>';

			if (empty($args['feed_image'])) {
				$link .= ')';
			}
		}

		if (!empty($args['show_count'])) {
			$link .= ' (' . number_format_i18n($category->count) . ')';
		}
		if ('list' == $args['style']) {
			$output     .= "\t<li";
			$css_classes = array(
				'cat-item',
				'sidebar__button',
			);

			if (!empty($args['current_category'])) {
				// 'current_category' can be an array, so we use `get_terms()`.
				$_current_terms = get_terms(
					$category->taxonomy,
					array(
						'include'    => $args['current_category'],
						'hide_empty' => false,
					)
				);

				foreach ($_current_terms as $_current_term) {
					if ($category->term_id == $_current_term->term_id) {
						$css_classes[] = 'current-cat';
					} elseif ($category->term_id == $_current_term->parent) {
						$css_classes[] = 'current-cat-parent';
					}
					while ($_current_term->parent) {
						if ($category->term_id == $_current_term->parent) {
							$css_classes[] = 'current-cat-ancestor';
							break;
						}
						$_current_term = get_term($_current_term->parent, $category->taxonomy);
					}
				}
			}

			/**
			 * Filters the list of CSS classes to include with each category in the list.
			 *
			 * @since 4.2.0
			 *
			 * @see wp_list_categories()
			 *
			 * @param array  $css_classes An array of CSS classes to be applied to each list item.
			 * @param object $category    Category data object.
			 * @param int    $depth       Depth of page, used for padding.
			 * @param array  $args        An array of wp_list_categories() arguments.
			 */
			$css_classes = implode(' ', apply_filters('category_css_class', $css_classes, $category, $depth, $args));
			$css_classes = $css_classes ? ' class="' . esc_attr($css_classes) . '"' : '';
			$output .= $css_classes;
			$image_id = get_term_meta($category->term_id, '_thumbnail_id', 1);
			$image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
			$cat_link = get_category_link($category->term_id);
			$output .= ">";
			if ($category->parent != 0) {
				$output .= "<div class='sidebar__box-image'>";
				$output .= "<a href='$cat_link'>";
				$output .= "<img class='sidebar__image' src='$image_url' alt=''>";
				$output .= "</a>";
				$output .= "</div><div class='sidebar__box-line'></div>";
				$output .= "$link\n";
				$output .= " <svg class='sidebar__icon'><use xlink:href='#plus'></use></svg>";
			} else {
				$output .= "$link\n";
				$output .= " <svg class='sidebar__icon'><use xlink:href='#plus'></use></svg>";
			}
		} elseif (isset($args['separator'])) {
			$output .= "\t$link" . $args['separator'] . "\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
	function end_el(&$output, $page, $depth = 0, $args = array())
	{
		if ('list' != $args['style']) {
			return;
		}

		$output .= "</li>  \n";
	}
}

/**
 * Вывод категорий
 */





class Custom_Footer_Wp_Category extends Walker_Category
{

	function start_lvl(&$output, $depth = 0, $args = array())
	{
		if ('list' != $args['style']) {
			return;
		}

		$indent  = str_repeat("\t", $depth);
		$output .= "$indent<ul class='footer__subtitle'>\n";
	}
}






class Custom_Walker_Page extends Walker_Page
{
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		if (isset($args['item_spacing']) && 'preserve' === $args['item_spacing']) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$indent  = str_repeat($t, $depth);
		$output .= "{$n}{$indent}<ul class='footer__subtitle'>{$n}";
	}
}


/**
 * Custom fields
 */

function true_custom_fields()
{
	add_post_type_support('book', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}

add_action('init', 'true_custom_fields');
/**
 * Custom fields
 */

/**
 * Изменение номера телефона
 */
function number_correct($raw)
{
	$good = preg_replace(
		'/^(\d)(\d{3})(\d{3})(\d{2})(\d{2})$/',
		'+ \1 (\2) \3 \4 \5',
		(string) $raw
	);
	return $good;
}
/**
 * Изменение номера телефона
 */


add_action('wp_enqueue_scripts', 'ps_scripts', 999);
function ps_scripts() {
	wp_enqueue_style('ps', get_stylesheet_directory_uri() . '/css/ps.css', array(), '1.0.2', 'all');
	wp_enqueue_script('readmore', get_stylesheet_directory_uri() . '/js/readmore.js', array('jquery'), '1.0.1', true);
	wp_enqueue_script('ps', get_stylesheet_directory_uri() . '/js/ps.js', array('jquery'), '1.0.2', true);
	wp_localize_script('ps', 'catalogFilterData', [
		'ajaxUrl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('catalog_filter_nonce'),
	]);
}

/**
 * AJAX-обработчик фильтрации товаров в каталоге
 */
add_action('wp_ajax_filter_catalog_products', 'filter_catalog_products_handler');
add_action('wp_ajax_nopriv_filter_catalog_products', 'filter_catalog_products_handler');

function filter_catalog_products_handler() {
	check_ajax_referer('catalog_filter_nonce', 'nonce');

	$category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
	$filters     = isset($_POST['filters']) && is_array($_POST['filters']) ? $_POST['filters'] : [];

	$meta_query   = ['relation' => 'AND'];

	// Текстовые поля — точное совпадение (IN)
	$text_fields = ['rail_brand', 'steel_grade', 'gost'];
	foreach ($text_fields as $fname) {
		if (!empty($filters[$fname])) {
			$values = array_map('sanitize_text_field', (array) $filters[$fname]);
			$meta_query[] = [
				'key'     => $fname,
				'value'   => $values,
				'compare' => 'IN',
			];
		}
	}

	// Числовые поля — диапазон (от / до)
	$range_fields = ['height_mm', 'length_mm', 'width_mm', 'weight_1_pcs', 'rail_1_meter_kg', 'measuring_length_m'];
	foreach ($range_fields as $fname) {
		if (!empty($filters[$fname]) && is_array($filters[$fname])) {
			$min = isset($filters[$fname]['min']) && $filters[$fname]['min'] !== '' ? floatval($filters[$fname]['min']) : null;
			$max = isset($filters[$fname]['max']) && $filters[$fname]['max'] !== '' ? floatval($filters[$fname]['max']) : null;
			if ($min !== null && $max !== null) {
				$meta_query[] = [
					'key'     => $fname,
					'value'   => [$min, $max],
					'compare' => 'BETWEEN',
					'type'    => 'NUMERIC',
				];
			} elseif ($min !== null) {
				$meta_query[] = [
					'key'     => $fname,
					'value'   => $min,
					'compare' => '>=',
					'type'    => 'NUMERIC',
				];
			} elseif ($max !== null) {
				$meta_query[] = [
					'key'     => $fname,
					'value'   => $max,
					'compare' => '<=',
					'type'    => 'NUMERIC',
				];
			}
		}
	}

	// Поле "Состояние" — чекбокс ACF, хранится сериализованным массивом
	if (!empty($filters['state'])) {
		$state_values = array_map('sanitize_text_field', (array) $filters['state']);
		$state_meta   = ['relation' => 'OR'];
		foreach ($state_values as $sv) {
			$state_meta[] = [
				'key'     => 'state',
				'value'   => '"' . $sv . '"',
				'compare' => 'LIKE',
			];
		}
		$meta_query[] = $state_meta;
	}

	$args = [
		'posts_per_page' => -1,
		'category'       => $category_id,
	];
	if (count($meta_query) > 1) {
		$args['meta_query'] = $meta_query;
	}

	$posts = get_posts($args);

	ob_start();
	foreach ($posts as $post) {
		setup_postdata($post);
		$post_id = $post->ID;
		?>
		<div class="catalog__item">
			<div class="card">
				<img class="card__img" src="<?php echo esc_url(get_the_post_thumbnail_url($post_id)); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
				<h3 class="card__title"><a href="<?php echo esc_url(get_permalink($post_id)); ?>"><?php echo esc_html(get_the_title($post_id)); ?></a></h3>
				<?php if (get_field('link-gost', $post_id)): ?>
					<a class="card__gost" target="_blank" href="<?php echo esc_url(get_field('link-gost', $post_id)); ?>" rel="noopener nofollow noreferrer"><?php echo esc_html(get_the_excerpt()); ?></a>
				<?php endif; ?>
				<span class="card__gost price"><?php the_field('price', $post_id); ?></span>
				<a class="popup-with-zoom-anim card__button button" href="#small-dialog">Оформить заявку</a>
				<a class="card__gost" href="<?php echo esc_url(get_permalink($post_id)); ?>">Подробнее</a>
			</div>
		</div>
		<?php
	}
	wp_reset_postdata();
	$html = ob_get_clean();

	wp_send_json_success(['html' => $html, 'count' => count($posts)]);
}
/**
 * Конец AJAX-обработчика фильтрации
 */

function custom_filter_acf_text_field($value, $post_id, $field) {
	if ($field['name'] === 'modal-description') {
		$value = str_replace('##ps-short-descr##', '<span class="ps-short-descr-anchor"></span>', $value);
	}

	return $value;
}

add_filter('acf/format_value', 'custom_filter_acf_text_field', 10, 3);
