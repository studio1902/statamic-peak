//--------------------------------------------------------------------------
// Tailwind Typography configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Typography (or prosé) styles.
// Some defaults are provided.
// More info: https://github.com/tailwindlabs/tailwindcss-typography.
//

const plugin = require('tailwindcss/plugin')

module.exports = { 
  theme: {
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.neutral.DEFAULT'),
            '[class~="lead"]': {
              color: theme('colors.neutral.DEFAULT'),
            },
            a: {
              color: theme('colors.primary.DEFAULT'),
              '&:hover': {
                color: theme('colors.primary.DEFAULT'),
              },
            },
            'a.no-underline': {
              textDecoration: 'none',
            },
            'h1, h2, h3, h4': {
              color: theme('colors.neutral.DEFAULT'),
            },
            blockquote: {
              borderColor: theme('colors.primary.DEFAULT'),
            },
            hr: {
              borderColor: theme('colors.neutral.DEFAULT'), 
            },
            'ul > li::before': { 
              backgroundColor: theme('colors.neutral.DEFAULT'),
            },
            'ol > li::before': { 
              color: theme('colors.neutral.DEFAULT'),
            },
            'ul > li p, ol > li p': { 
              marginTop: '0em !important',
              marginBottom: '0em !important',
            },
            pre: {
              whiteSpace: 'pre-wrap',
            },
            strong: {
              color: theme('colors.neutral.DEFAULT'),
            },
          }
        }
      }),
    }
  },
  plugins: [
    require('@tailwindcss/typography')({
      modifiers: [],
    }),
  ]
}
