/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/js/**/*.vue',  // Tailwind will look at your Vue files in the js folder
    './resources/views/**/*.blade.php',  // Tailwind will look at your Blade templates
    './resources/css/**/*.css'  // Ensure this is also included for the global styles
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
