/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    container: {
      center : true,
    },
    extend: {
      colors: {
        primary: '#BFC890'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ]

  // daisyui: {
  //   themes: ['light', 'dark']
  // }
}

