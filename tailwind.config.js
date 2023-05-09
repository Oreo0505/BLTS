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
        'gradient-270': 'linear-gradient(270deg, var(--tw-gradient-stops))'
      },
    },
  },
  plugins: [],
}

