/*　カスタム JavaScript */
$(function() {
	$('.front-menu__icon').on('click', function() {
		if($('.front-nav').hasClass('active') == true) {
			$('.front-nav').removeClass('active');
			$('.front-menu__icon').removeClass('active');
		} else {
			$('.front-nav').addClass('active');
			$('.front-menu__icon').addClass('active');
		}
	});
});
