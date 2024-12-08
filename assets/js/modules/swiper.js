import { register } from "swiper/element";
register();

import Swiper from "swiper/bundle";

export const productsSlider = new Swiper(".products-swiper", {
  slidesPerView: "auto",
  spaceBetween: "16",
  speed: 1000,

  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },

  breakpoints: {
    1535: {
      slidesPerView: 5.2,
    },

    1024: {
      slidesPerView: 4.2,
    },

    768: {
      slidesPerView: 3.2,
    },

    490: {
      slidesPerView: 2.2,
      spaceBetween: "8",
    },

    280: {
      slidesPerView: 1.2,
      spaceBetween: "8",
    },
  },

  //   navigation: {
  //     nextEl: ".swiper-btn-next",
  //     prevEl: ".swiper-btn-prev",
  //   },
});
