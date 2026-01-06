import { defineConfig } from 'tailwindcss'

export default defineConfig({
  content: [
    "./*.php",
    "./**/*.php",
    "./template-parts/**/*.php",
  ],
  safelist: [
    'font-modam', // 👈 اینجا!
  ],
  theme: {
    extend: {
      fontFamily: {
        modal: [ModamWeb, 'sans-serif'],
      },
    },
  },
  plugins: [],
})