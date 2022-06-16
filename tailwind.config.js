module.exports = {
  content: ['./resources/**/*.vue',
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./node_modules/flowbite/**/*.js"
],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
    require('flowbite/plugin')
  ],
}
