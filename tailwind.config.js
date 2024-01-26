module.exports = {
  mode: 'jit',
 purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},

    spinner: (theme) => ({
      default: {
        color: '#dae1e7', // color you want to make the spinner
        size: '1em', // size of the spinner (used for both width and height)
        border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
        speed: '500ms', // the speed at which the spinner should rotate
      },
    }),
  },
  variants: {
    extend: {
      backgroundColor: ['active'],
      // color: ['active'],
    },
  },
  plugins: [
    require('tailwindcss-spinner'),
  ],
}
