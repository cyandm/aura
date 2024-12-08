function toggleTab() {
	const tabs = document.querySelectorAll('.toggle-tab');

	if (!tabs) return;

	tabs.forEach((tab) => {
		const opening = tab.querySelector('.toggle-opening');
		const opener = tab.querySelector('.toggle-opener');
		const svg = tab.querySelector('svg');
		svg.style.transition = 'all 300ms';

		if (!opener || !opening) return;

		opener.addEventListener('click', () => {
			const isOpen = opening.classList.contains('grid-rows-[1fr]');

			if (isOpen) {
				opening.classList.replace('grid-rows-[1fr]', 'grid-rows-[0fr]');
				svg.style.rotate = '0deg';
			} else {
				opening.classList.replace('grid-rows-[0fr]', 'grid-rows-[1fr]');
				svg.style.rotate = '45deg';
			}
		});
	});
}

toggleTab();
