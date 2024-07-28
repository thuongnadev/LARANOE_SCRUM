/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        main: "#009ef7",
        sub: "#F1592A",
      }
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

