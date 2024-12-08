function autoSelect() {
	const variationForm = document.querySelector('.variations_form');

	if (!variationForm) return;

	const selectGroup = variationForm.querySelectorAll('select');

	selectGroup.forEach((el) => {
		const option = el.querySelector('option.enabled');
		el.value = option.value;
		el.dispatchEvent(
			new Event('change', {
				bubbles: true,
				cancelable: true,
				composed: true,
			})
		);
	});
}

setTimeout(autoSelect, '500');
