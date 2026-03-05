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