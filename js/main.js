var checkDate = function () {
	if (window.location.pathname == '') {
		return
	}
	var t = 15,
		e = new Date($('meta[name="today-date"]').attr('content')),
		a = new Date,
		n = new Date;
	n.setUTCHours(0, 0, 0, 0);
	a.setDate(a.getDate() + 1);
	a.setUTCHours(0, 0, 0, 0);
	var i = a - e,
		o = n - e;
	(i <= t * 60 * 1e3 || o >= -(t * 60 * 1e3)) && $('.alert-notice[data-alert="reset"]').show()
};
$(function () {
	if ($('body.cube').length) {
		var t = function (t) {
				$('body.cube .time').html((t.hours > 0 ? this.leadingZeros(t.hours) : 0) + 'h ' + this.leadingZeros(t.min) + 'm ' + this.leadingZeros(t.sec >= 60 ? 0 : t.sec) + 's')
			},
			e = function () {
				i = Date.now() - a;
				o = Math.floor(i / n);
				r = a + (o + 1) * n;
				this.restart({
					date: new Date(r),
					render: t,
					onEnd: e
				})
			},
			a = 1537335680000,
			n = 1661550,
			i = Date.now() - a,
			o = Math.floor(i / n),
			r = a + (o + 1) * n;
		$('body.cube .time').countdown({
			date: new Date(r),
			render: t,
			onEnd: e
		})
	}
});
$(document).ready(function () {
	$('.filter-button').click(function () {
		var t = $(this).attr('data-filter');
		t == 'all' ? $('.filter').stop().show('1000') : ($('.filter').not('.' + t).stop().hide('3000'), $('.filter').filter('.' + t).stop().show('3000'));
		$(window).trigger('scroll')
	});
	$('.filter-button').removeClass('active') && ($(this).removeClass('active'), $(window).trigger('scroll'));
	$(this).addClass('active');
	if ($('.shop-rotation').length) {
		var t = $('meta[name="today-date"]').attr('content'),
			e = new Date(t);
		e.setDate(e.getDate() + 1);
		e.setUTCHours(0, 0, 0);
		$('.shop-rotation .countdown').countdown({
			date: e,
			render: function (t) {
				var e = '';
				t.hours > 6 ? (e = t.hours + ' hour' + (t.hours == 1 ? '' : 's')) : (e = (t.hours >= 1 ? t.hours + ':' : '') + this.leadingZeros(t.min) + ':' + this.leadingZeros(t.sec >= 60 ? 0 : t.sec));
				$('.shop-rotation .countdown').text(e)
			},
			onEnd: function () {
				console.info('Countdown finished, refreshing tab');
				$('.shop-rotation .countdown-badge').fadeOut(400);
				setTimeout(function () {
					window.location.reload()
				}, 5e3)
			}
		})
	}
