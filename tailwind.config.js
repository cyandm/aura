/** @type {import('tailwindcss').Config} */
import { colors } from "tailwindcss";

module.exports = {
  content: [
    "./node_modules/flowbite/**/*.js",
    "./{partials, templates, woocommerce}/**/*.php",
    "./woocommerce/*.php",
    "./assets/js/**/*.js",
    "./*.php",
    "./**/*.php",
  ],
  theme: {
    container: {
      center: true,
      padding: "1rem",
    },
    extend: {
      fontFamily: {
        peyda: ['"Peyda-1" , sans'],
      },
      listStyleType: {
        none: "none",
        square: "square",
      },
      fontSize: {
        title: "72px",
        title_1: "40px",
        title_2: "28px",
        h1: "48px",
        h2: "36px",
        h3: "32px",
        h4: "28px",
        h5: "24px",
        h6: "20px",
        body: "20px",
        body_s: "16px",
        caption: "12px",
      },
      boxShadow: {
        cxl: "inset 0 0px 12px rgba(0, 0, 0, 0.1)",
        cxt: "inset 0 0px 0px rgba(0, 0, 0, 0.0), 0 0px 12px rgba(0, 0, 0, 0.1)",
      },
      borderRadius: {
        "4xl": "1.75rem",
      },
      typography: {
        DEFAULT: {
          css: {
            maxWidth: "100%",

            img: {
              width: "100%",
              aspectRatio: "16/9",
              objectFit: "cover",
            },

            a: {
              color: "#172EF9",
            },

            h1: {
              fontSize: "48px",
            },
          },
        },
      },
    },
  },
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/aspect-ratio"),
    require("flowbite/plugin"),
    require("tailwind-scrollbar-hide"),
  ],
};
