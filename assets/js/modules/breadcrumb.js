const separator = document.querySelectorAll(".separator");

separator?.forEach((el) => {
  el.innerHTML =
    '<svg class="icon size-3 rotate-90"><use href="#icon-chevron-down"/></svg>';
});
