function setVariable(element, jsProp, cssName, unit = 'px') {
	element.style.setProperty(cssName, jsProp + unit);
}

function setVariables() {
	const htmlEl = document.querySelector('html');
	const headerEl = document.querySelector('header');

	if (!htmlEl) return;

	headerEl && setVariable(htmlEl, headerEl.offsetHeight, '--header-height');
}

setVariables();
