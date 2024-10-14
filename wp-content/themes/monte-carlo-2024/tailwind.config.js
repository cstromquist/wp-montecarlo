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
      'tertiary': '#0171b1',
      'gray': '#5b5b5b',
      'white': '#fff',
    },
    container: {
      center: true,

      screens: {
        sm: '640px',
        md: '768px',
        lg: '1024px',
        xl: '1200px',
        '2xl': '1200px',
      },
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
    'lg:text-center',
    'p-48',
    'pb-12',
    'px-12',
    'w-7/12',
    'rounded-md',
    'mb-0',
    'mb-16',
    'mt-2',
    'my-6',
    'text-gray',
    'text-lg',
    'mc-block-link',
  ],
  plugins: [],
  module: {},
  important: true,
}

