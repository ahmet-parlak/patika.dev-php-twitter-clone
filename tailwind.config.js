/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')

module.exports = {
  mode: "jit",
  content: [
    "./public/**/*.{html,js}",
    "./app/view/**/*.{php,js}",
  ],
  theme: {
    extend: {
      colors: {
        blue: {
          50: "#e4eefd",
          100: "#c7dcfb",
          200: "#a9cbf8",
          300: "#88bbf6",
          400: "#61abf3",
          500: "#1d9bf0",
          600: "#247fc4",
          700: "#256599",
          800: "#224b71",
          900: "#1c334b",
          950: "#141d28",
        },
        default: "#1d9bf0",
        dark: "#15202b",
        disabled: "#177cc0",
        hoverblue: "#1a8cd8",

      },
      width: {
        '598': '37.375rem',
      },
    },
  },
  plugins: [
    plugin(function ({ addBase, theme }) {
      addBase({
        'h1': { fontSize: theme('fontSize.3xl'), fontWeight: 'bold' },
        'h2': { fontSize: theme('fontSize.xl'), fontWeight: 'bold' },
        'h3': { fontSize: theme('fontSize.lg'), fontWeight: 'bold' },
      })
    })
  ],
}

