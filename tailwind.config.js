/** @type {import('tailwindcss').Config} */
export default {
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

