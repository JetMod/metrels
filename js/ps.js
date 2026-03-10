function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
var viewport = updateViewportDimensions();

var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

var timeToWaitForLast = 100;


var readmore = false;

jQuery(document).ready(function($) {

	// ---- Catalog filter ----
	var $filter = $('#catalog-filter');
	if ($filter.length && typeof catalogFilterData !== 'undefined') {
		var categoryId   = $filter.data('category');
		var rangeDebounce;

		// Toggle panel
		$filter.find('.catalog-filter__toggle').on('click', function() {
			$filter.toggleClass('is-open');
		});

		// Checkboxes — apply immediately
		$filter.on('change', 'input[type="checkbox"]', function() {
			applyFilter();
		});

		// Reset button
		$filter.find('.catalog-filter__reset').on('click', function() {
			$filter.find('input[type="checkbox"]').prop('checked', false);
			$filter.find('.catalog-range-slider').each(function() {
				resetSlider($(this));
			});
			applyFilter();
		});

		// ---- Range sliders ----
		function pct(val, gMin, gMax) {
			return gMax === gMin ? 0 : ((val - gMin) / (gMax - gMin)) * 100;
		}

		function updateSlider($sl) {
			var gMin  = parseFloat($sl.data('min'));
			var gMax  = parseFloat($sl.data('max'));
			var vMin  = parseFloat($sl.find('.catalog-range-slider__thumb--min').val());
			var vMax  = parseFloat($sl.find('.catalog-range-slider__thumb--max').val());
			var pMin  = pct(vMin, gMin, gMax);
			var pMax  = pct(vMax, gMin, gMax);

			$sl.find('.catalog-range-slider__fill').css({ left: pMin + '%', width: (pMax - pMin) + '%' });
			$sl.find('.catalog-range-slider__bubble--min').text(vMin).css('left', pMin + '%');
			$sl.find('.catalog-range-slider__bubble--max').text(vMax).css('left', pMax + '%');

			$sl.find('.catalog-range-slider__hidden-min').val(vMin <= gMin ? '' : vMin);
			$sl.find('.catalog-range-slider__hidden-max').val(vMax >= gMax ? '' : vMax);
		}

		function resetSlider($sl) {
			var gMin = parseFloat($sl.data('min'));
			var gMax = parseFloat($sl.data('max'));
			$sl.find('.catalog-range-slider__thumb--min').val(gMin);
			$sl.find('.catalog-range-slider__thumb--max').val(gMax);
			updateSlider($sl);
		}

		$filter.find('.catalog-range-slider').each(function() {
			var $sl = $(this);
			updateSlider($sl);

			$sl.find('.catalog-range-slider__thumb--min').on('input', function() {
				var $min = $(this);
				var $max = $sl.find('.catalog-range-slider__thumb--max');
				if (parseFloat($min.val()) > parseFloat($max.val())) $min.val($max.val());
				updateSlider($sl);
				clearTimeout(rangeDebounce);
				rangeDebounce = setTimeout(applyFilter, 600);
			});

			$sl.find('.catalog-range-slider__thumb--max').on('input', function() {
				var $max = $(this);
				var $min = $sl.find('.catalog-range-slider__thumb--min');
				if (parseFloat($max.val()) < parseFloat($min.val())) $max.val($min.val());
				updateSlider($sl);
				clearTimeout(rangeDebounce);
				rangeDebounce = setTimeout(applyFilter, 600);
			});
		});
		// ---- End range sliders ----

		function applyFilter() {
			var filters = {};

			// Checkboxes
			$filter.find('input[type="checkbox"]:checked').each(function() {
				var name  = $(this).attr('name');
				var match = name.match(/filter\[(\w+)\]/);
				if (match) {
					var fieldName = match[1];
					if (!filters[fieldName]) filters[fieldName] = [];
					filters[fieldName].push($(this).val());
				}
			});

			// Range slider hidden inputs
			$filter.find('.catalog-range-slider__hidden-min, .catalog-range-slider__hidden-max').each(function() {
				var val = $.trim($(this).val());
				if (val === '') return;
				var name  = $(this).attr('name');
				var match = name.match(/filter\[(\w+)\]\[(min|max)\]/);
				if (match) {
					var fieldName = match[1];
					var type      = match[2];
					if (!filters[fieldName]) filters[fieldName] = {};
					filters[fieldName][type] = val;
				}
			});

			var $items     = $('#catalog-items');
			var $noResults = $('.catalog-filter__no-results');
			$items.addClass('is-loading');

			$.ajax({
				url:  catalogFilterData.ajaxUrl,
				type: 'POST',
				data: {
					action:      'filter_catalog_products',
					nonce:       catalogFilterData.nonce,
					category_id: categoryId,
					filters:     filters,
				},
				success: function(response) {
					$items.removeClass('is-loading');
					if (response.success) {
						if (response.data.count > 0) {
							$items.html(response.data.html).show();
							$noResults.hide();
						} else {
							$items.html('').hide();
							$noResults.show();
						}
					}
				},
				error: function() {
					$items.removeClass('is-loading');
				}
			});
		}
	}
	// ---- End catalog filter ----

	setTimeout(() => {
		$('.js-readmore-block').each(function(index, el) {
			let psCollapsedHeight = 200;

			if ($(el).find('.ps-short-descr-anchor').length) {
				psCollapsedHeight = $(el).find('.ps-short-descr-anchor').position().top;
			}

			$(el).readmore({
				speed: 75,
				embedCSS: false,
				collapsedHeight: psCollapsedHeight,
				moreLink: '<button class="ps-morelessbtn">Подробнее</button>',
				lessLink: '<button class="ps-morelessbtn">Скрыть</button>',
				blockProcessed: function() {
				}
			});
		});
	}, 300);
});

$(window).resize(function() {
	waitForFinalEvent(function() {
		viewport = updateViewportDimensions();
		$('.js-readmore-block').readmore('destroy');
		$('.js-readmore-block').each(function(index, el) {
			let psCollapsedHeight = 200;

			if ($(el).find('.ps-short-descr-anchor').length) {
				psCollapsedHeight = $(el).find('.ps-short-descr-anchor').position().top;
			}

			$(el).readmore({
				speed: 75,
				embedCSS: false,
				collapsedHeight: psCollapsedHeight,
				moreLink: '<button class="ps-morelessbtn">Подробнее</button>',
				lessLink: '<button class="ps-morelessbtn">Скрыть</button>',
				blockProcessed: function() {
				}
			});
		});
	}, timeToWaitForLast, "windowResize");
});