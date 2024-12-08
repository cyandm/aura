function addDeleteButton() {
	const removeLink = document.querySelectorAll(
		'.wc-block-cart-item__remove-link'
	);
	if (!removeLink) return;

	removeLink.forEach((e) => {
		const svg = document.getElementById('trashIcon').cloneNode(true);
		svg.classList.remove('hidden');
		e.appendChild(svg);
	});
}

setTimeout(() => {
	addDeleteButton();
}, 1000);
