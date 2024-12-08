jQuery(document).ready(function ($) {
	$('#open-popup').click(function () {
		$('#popup-wrapper').slideDown();
		$('#popup-overlay').fadeIn();
	});

	$('#close-popup').click(function () {
		$('#popup-wrapper').slideUp();
		$('#popup-overlay').fadeOut();
	});

	$('#popup-overlay').click(function () {
		$('#popup-wrapper').slideUp();
		$('#popup-overlay').fadeOut();
	});
});

function filterOpening() {
	const filterOpener = document.getElementById('filterOpener');
	const filterOpening = document.getElementById('filterOpening');
	const filterCloser = document.getElementById('filterCloser');

	if (!filterOpener || !filterOpening || !filterCloser) return;

	filterOpener.addEventListener('click', () => {
		filterOpening.classList.replace(
			'[clip-path:polygon(100%_0%_,_100%_0%,_100%_100%,_100%_100%)]',
			'[clip-path:polygon(0%_0%_,_100%_0%,_100%_100%,_0%_100%)]'
		);
	});

	filterCloser.addEventListener('click', () => {
		filterOpening.classList.replace(
			'[clip-path:polygon(0%_0%_,_100%_0%,_100%_100%,_0%_100%)]',
			'[clip-path:polygon(100%_0%_,_100%_0%,_100%_100%,_100%_100%)]'
		);
	});
}

filterOpening();
