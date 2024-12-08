jQuery(document).ready(function ($) {
  $("#menu-slide-icon").click(function (event) {
    $("#sliding-menu").addClass("show");
  });

  $("#menu-slide-close").click(function () {
    $("#sliding-menu").removeClass("show");
  });
});

function addIcons() {
  document
    .querySelectorAll("#main-menu .menu-item-has-children")
    ?.forEach((menu) => {
      const svg = document.querySelector("svg#chevron-down")?.cloneNode(true);
      const link = menu.querySelector("a");

      svg.classList.remove("hidden");
      svg.classList.add("mr-1", "size-3");
      link.appendChild(svg);
      const borderMenu = menu.querySelector(".sub-menu");
      borderMenu.classList.add("divide-y");
    });
}

addIcons();
