module.exports = {
  content: [
    './app/components/**/*.{erb,haml,html,slim}',
    './app/helpers/**/*.rb',
    './app/javascript/**/*.js',
    './app/views/**/*.{erb,haml,html,slim}'
  ],
  theme: {
    container: {
      screens: {
        "sm": "640px",
        "md": "768px",
        "lg": "1024px",
        "xl": "1280px"
      }
    },
    extend: {
      colors: {
        "primary": "#3b5249",
        "secondary": "#e0e6d3",
        "accent": "#f5c964"
      },
      fontFamily: {
        "inconsolata": ["Inconsolata"],
        "linotte": ["Linotte"],
        "rubik": ["Rubik"]
      },
      spacing: {
        "18": "4.5rem",
        "2/5": "40%"
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography'),
  ]
}
