/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
    "./node_modules/flowbite/**/*.js",
    'node_modules/preline/dist/*.js',
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
      require('flowbite/plugin'),
      require('preline/plugin'),
  ],
};
