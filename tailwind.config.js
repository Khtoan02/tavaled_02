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
          navy:       '#334ca2',
          navy2:      '#1e293b',
          navy3:      '#334ca2',
          navyLight:  '#1e293b',
          navyBg:     '#f8fafc',
          // About page extras
          abDark:     '#0a0f1a',
          abLight:    '#fffcfb',
          gray:       '#1e293b',
        }
      },
      fontFamily: {
        sans: ['"League Spartan"', 'sans-serif'],
      }
    }
  },
  plugins: [],
}
