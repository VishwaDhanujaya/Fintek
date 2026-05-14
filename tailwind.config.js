/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./includes/**/*.php",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'fintek-blue': '#0056b3',
        'fintek-blue-light': '#3380cc',
      },
      fontFamily: {
        sans: ['Inter', 'Roboto', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
