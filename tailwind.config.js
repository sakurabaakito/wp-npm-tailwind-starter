/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    "./src/**/*.{html,js}",
    "./**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Noto Sans JP", "sans-serif"],
      },
      colors: {
        primary: "#fff",
        blue: {
          DEFAULT: "#000",
          second: "ddd",
        }
      }
    },
  },
  plugins: [],
}
