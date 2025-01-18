jQuery(document).ready(function ($) {
  $("#mobile-menu .menu-item-has-children").each(function () {
    var $menuItem = $(this);
    var $subMenuToggle = $('<i class="sub-menu-toggle">+</span>');
    $menuItem.prepend($subMenuToggle);

    $subMenuToggle.on("click", function () {
      var $subMenu = $menuItem.children("ul");
      if ($subMenu.is(":visible")) {
        $subMenu.slideUp();
        $subMenuToggle.text("+");
      } else {
        $subMenu.slideDown();
        $subMenuToggle.text("-");
      }
    });
  });
});

// jQuery(document).ready(function ($) {
//   $("#mobile-menu .menu-item-has-children").each(function () {
//     var $menuItem = $(this);
//     var $subMenuToggle = $(
//       '<svg class="icon size-4 rotate-90 duration-300"><use href="#icon-chevron-down" /></svg>'
//     );
//     $menuItem.prepend($subMenuToggle);

//     $subMenuToggle.on("click", function () {
//       var $subMenu = $menuItem.children("ul");
//       if ($subMenu.is(":visible")) {
//         $subMenu.slideUp();
//         $subMenuToggle.replaceWith(
//           '<svg class="icon size-4 rotate-90 duration-300"><use href="#icon-chevron-down" /></svg>'
//         );
//       } else {
//         $subMenu.slideDown();
//         $subMenuToggle.replaceWith(
//           '<svg class="icon size-4 rotate-0 duration-300"><use href="#icon-chevron-down" /></svg>'
//         );
//       }
//     });
//   });
// });
