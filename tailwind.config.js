/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        'primary': 'rgb(156, 197, 75)',  // Main custom primary color
        'primary-30': 'rgb(193, 219, 155)', // Lighter shade (30%)
        'primary-50': 'rgb(174, 208, 115)', // Lighter shade (50%)
        'primary-70': 'rgb(156, 197, 75)',  // Main primary color (70%)
        'primary-90': 'rgb(137, 175, 56)',  // Darker shade (90%)
        'primary-100': 'rgb(117, 154, 36)', // Darkest shade (100%)
        'custom-pink': 'rgb(240, 18, 102)',
        'custom-gray': 'rgb(75, 74, 73)',  
        'custom-gray-90': 'rgb(114, 111, 109)',
      },
      padding: {
        '15': '3.75rem', // Custom padding
      },
      skew: {
        '-20': '-20deg', // Custom skew for -20 degrees
      },
    },
  },
  plugins: [],
}
