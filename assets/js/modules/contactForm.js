import { errorToast, successFormToast } from "./toastify";

function contact() {
  const form = document.querySelector("#contact_form");

  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append("nonce", restDetails.nonce);

    jQuery(($) => {
      $.ajax({
        url: restDetails.url + "cynApi/v1/contactForm",
        type: "post",
        cache: false,
        processData: false,
        contentType: false,
        data: formData,

        success: (res) => {
          successFormToast.showToast();
          form.reset();
        },

        error: (err) => {
          errorToast.showToast();
        },
      });
    });
  });
}

contact();
