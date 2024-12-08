function categoryDropdown() {
  const productCat = document.querySelectorAll("form#productCat");
  if (!productCat) return;

  productCat.forEach((form) => {
    const select = form.querySelector("select");
    const baseUrl = form.querySelector('input[name="baseUrl"]');
    const categoryBase = form.querySelector('input[name="categoryBase"]');

    const pathArray = window.location.pathname.split("/");
    const currentSlug = pathArray[pathArray.indexOf(categoryBase.value) + 1];

    if (currentSlug) {
      select.value = currentSlug;
    }

    select.addEventListener("change", (event) => {
      if (event.target.value === "shop") {
        window.location.href = "/shop";
      } else {
        window.location.href = baseUrl.value + "/" + event.target.value;
      }
    });
  });
}

categoryDropdown();
