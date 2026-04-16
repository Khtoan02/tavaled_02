/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./assets/**/*.js",
  ],
  theme: {
    extend: {
      screens: {
        'xs': '475px',
      },
      colors: {
        brand: {
          // Core (header / footer / global)
          orange:     '#f05a25',
          orangedark: '#c8451a',
          dark:       '#1d2857',
          light:      '#fff8f6',
          // Homepage dark theme
          navy:       '#1c2857',
          navy2:      '#1e293b',
          navy3:      '#1c2857',
          navyLight:  '#1e293b',
          navyBg:     '#f8fafc',
          // About page extras
          abDark:     '#0a0f1a',
          abLight:    '#fffcfb',
          gray:       '#1e293b',
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        serif: ['"Be Vietnam Pro"', 'sans-serif'],
        heading: ['"Be Vietnam Pro"', 'sans-serif']
      }
    }
  },
  plugins: [],
}
