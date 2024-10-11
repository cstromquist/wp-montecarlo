/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./template-parts/**/*.{php,html,js}","./*.{php,html,js}"],
  theme: {
    extend: {},
    fontFamily: {
      'serif': ['Capito', 'serif'],
      'sans': ['National', 'sans-serif'],
    },
    colors: {
      'primary': '#1d4b67',
      'secondary': '#eda600',
      'gray': '#5b5b5b',
      'white': '#fff',
    },
  },
  safelist: [
    'lg:justify-start',
    'lg:justify-end',
    'lg:justify-center',
    'cursor-pointer',
    'flex-row',
    'flex-col',
    'flex-row-reverse',
    'lg:flex-row-reverse',
    'lg:flex-row',
  ],
  plugins: [],
  module: {},
  important: true,
}

