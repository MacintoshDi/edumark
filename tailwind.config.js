const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'background': '#F8F9FC',
        'primary': {
          DEFAULT: '#6366F1',
          '50': '#EEF2FF',
          '100': '#E0E7FF',
          '200': '#C7D2FE',
          '800': '#4338CA',
          'darker': '#4F46E5',
        },
        'secondary': '#6B7280',
        'surface': '#FFFFFF',
        'copy': {
          DEFAULT: '#111827',
          'light': '#374151',
          'lighter': '#4B5563',
          'lightest': '#6B7280',
        },
        'border-color': '#E5E7EB',
      },
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
      boxShadow: {
        'card': '0 1px 2px 0 rgb(0 0 0 / 0.05)',
        'header': '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
      }
    },
  },
  plugins: [],
}
