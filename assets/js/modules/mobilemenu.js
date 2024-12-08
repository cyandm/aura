jQuery(document).ready(function ($) {
	$('#mobile-menu .menu-item-has-children').each(function () {
		var $menuItem = $(this);
		var $subMenuToggle = $('<i class="sub-menu-toggle">+</span>');
		$menuItem.prepend($subMenuToggle);

		$subMenuToggle.on('click', function () {
			var $subMenu = $menuItem.children('ul');
			if ($subMenu.is(':visible')) {
				$subMenu.slideUp();
				$subMenuToggle.text('+');
			} else {
				$subMenu.slideDown();
				$subMenuToggle.text('-');
			}
		});
	});
});
