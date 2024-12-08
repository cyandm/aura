// because of input on price, this is disabled

function getWcPrice() {
	const maxPrice = document.querySelector('input[type="range"]#maxPrice');
	const minPrice = document.querySelector('input[type="range"]#minPrice');

	const minPriceText = document.querySelector('#minPriceText');
	const maxPriceText = document.querySelector('#maxPriceText');

	if (!maxPrice || !minPrice) return;

	minPrice.addEventListener('change', (e) => {
		jQuery(($) => {
			$.ajax({
				type: 'post',
				url: restDetails.url + 'cynApi/v1/formatPrice',
				data: {
					price: e.target.value,
				},

				success: (res) => {
					minPriceText.innerHTML = res;
				},
			});
		});
	});

	maxPrice.addEventListener('change', (e) => {
		jQuery(($) => {
			$.ajax({
				type: 'post',
				url: restDetails.url + 'cynApi/v1/formatPrice',
				data: {
					price: e.target.value,
				},

				success: (res) => {
					maxPriceText.innerHTML = res;
				},
			});
		});
	});
}

// getWcPrice();
