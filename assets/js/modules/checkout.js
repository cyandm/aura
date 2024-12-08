function checkout() {
	const wrapper = document.querySelector(
		'.woocommerce-billing-fields__field-wrapper'
	);

	if (!wrapper) return;

	function moveElementToDiv(elementsArr, addClass) {
		const div = document.createElement('div');
		div.classList.add('flex');
		div.classList.add('md:gap-2');
		div.classList.add('flex-col');
		div.classList.add('md:flex-row');
		addClass && div.classList.add(addClass);

		elementsArr.forEach((elem) => {
			elem.classList.add('flex-1');
			div.appendChild(elem);
		});

		wrapper.appendChild(div);
	}

	setTimeout(() => {
		moveElementToDiv(
			[
				document.querySelector('#billing_first_name_field'),
				document.querySelector('#billing_last_name_field'),
			],
			'order-1'
		);

		moveElementToDiv(
			[
				document.querySelector('#billing_state_field'),
				document.querySelector('#billing_city_field'),
			],
			'order-2'
		);

		moveElementToDiv(
			[
				document.querySelector('#billing_address_1_field'),
				document.querySelector('#billing_postcode_field'),
			],
			'order-3'
		);
	}, 100);
}

checkout();
