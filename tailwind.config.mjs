import { defineConfig } from 'tailwindcss'

export default defineConfig({
  content: [
    "./*.php",
    "./**/*.php",
    "./template-parts/**/*.php",
  ],
  safelist: [
    'font-yekan', // 👈 اینجا!
  ],
  theme: {
    extend: {
      fontFamily: {
        yekan: [Yekan Bakh, 'sans-serif'],
      },
    },
  },
  plugins: [],
})