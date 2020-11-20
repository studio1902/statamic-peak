//--------------------------------------------------------------------------
// Tailwind Typography configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Typography (or prosé) styles.
// Some defaults are provided.
// More info: https://github.com/tailwindcss/typography.
//

const plugin = require('tailwindcss/plugin')

module.exports = { 
  theme: {
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.neutral.800'),
            '[class~="lead"]': {
              color: theme('colors.neutral.800'),
            },
            a: {
              color: theme('colors.primary.600'),
              '&:hover': {
                color: theme('colors.primary.800'),
              },
            },
            'a.no-underline': {
              textDecoration: 'none',
            },
            'h1, h2, h3, h4': {
              scrollMarginTop: theme('spacing.36'), 
              color: theme('colors.neutral.900'),
            },
            blockquote: {
              borderColor: theme('colors.primary.200'),
            },
            hr: {
              borderColor: theme('colors.neutral.100'), 
            },
            'figure, img, picture, video, code': {
              marginTop: 0,
              marginBottom: 0,
            },
            'figure figcaption': {
              color: 'inherit',
            },
            'ul > li::before': { 
              backgroundColor: theme('colors.neutral.500'),
            },
            'ol > li::before': { 
              color: theme('colors.neutral.500'),
            },
            'figure figcaption': {
              color: theme('colors.neutral.500'),
            },
            thead: {
              borderBottomColor: theme('colors.neutral.200'),
            },
            'tbody tr': {
              borderBottomColor: theme('colors.neutral.100'),
            },
            pre: {
              whiteSpace: 'pre-wrap',
            },
          }
        }
      }),
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
  ]
}
