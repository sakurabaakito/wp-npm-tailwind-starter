/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    "./src/**/*.{html,js}",
    "./**/*.php",
    "./safelist.txt"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Noto Sans JP", "sans-serif"],
      },
      colors: {
        primary: "#004A7C",
        secondary: "#F2F9FD",
        tertiary: "#383850",
        red: "#CB3636",
        orange: "#FF4F4F",
        orangeCta: "#FF804F",
        pink: "#F26F80",
        blue: {
          DEFAULT: "#1DB7CE",
          1: "#5F8DAC",
          2: "#4C80A3",
          3: "#1A5C89",
          4: "#F2F9FD",
          5: "#E9E8E8",
        },
        gray: {
          DEFAULT: "#B3B3B3",
          1: "#F1F1F1",
          2: "#777777",
        },

      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
