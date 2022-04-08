module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/**/**/*.css',
    "./resources/**/*.js",
  ],
  theme: {
    extend: {}
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
    require('@tailwindcss/custom-forms')
  ]
}
