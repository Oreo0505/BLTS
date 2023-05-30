/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
      backgroundImage: {
        'gradient-30': 'linear-gradient(30deg, var(--tw-gradient-stops))',
        'gradient-90': 'linear-gradient(90deg, var(--tw-gradient-stops))',
        'gradient-215': 'linear-gradient(215deg, var(--tw-gradient-stops))',
        'gradient-270': 'linear-gradient(270deg, var(--tw-gradient-stops))'
      },
      fontFamily: {
        'roboto': ['Roboto','sans-serif']
      }
    },
  },
  plugins: [],
}

