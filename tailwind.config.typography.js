//--------------------------------------------------------------------------
// Tailwind Typography configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Typography (or prosé) styles.
// Some defaults are provided.
// More info: https://tailwindcss.com/docs/typography-plugin.
//

const plugin = require('tailwindcss/plugin')

module.exports = {
  theme: {
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: `${theme('colors.neutral.DEFAULT')}`,
            '[class~="lead"]': {
              color: `${theme('colors.neutral.DEFAULT')}`,
            },
            a: {
              color: `${theme('colors.primary.DEFAULT')}`,
              '&:hover': {
                color: `${theme('colors.primary.DEFAULT')}`,
              },
              '&.focus-visible': {
                boxShadow: `0 0 0 2px ${theme('colors.primary.DEFAULT')}`,
                borderRadius: `${theme('borderRadius.sm')}`,
              },
              '&:focus-visible': {
                boxShadow: `0 0 0 2px ${theme('colors.primary.DEFAULT')}`,
                borderRadius: `${theme('borderRadius.sm')}`,
              },
            },
            'a.no-underline': {
              textDecoration: 'none',
            },
            'h1, h2, h3, h4': {
              color: `${theme('colors.primary.DEFAULT')}`,
            },
            blockquote: {
              borderColor: `${theme('colors.primary.DEFAULT')}`,
            },
            hr: {
              borderColor: `${theme('colors.neutral.DEFAULT')}`,
            },
            'ul > li::before': {
              backgroundColor: `${theme('colors.neutral.DEFAULT')}`,
            },
            'ol > li::before': {
              color: `${theme('colors.neutral.DEFAULT')}`,
            },
            'ul > li p, ol > li p': {
              marginTop: '0em !important',
              marginBottom: '0em !important',
            },
            pre: {
              whiteSpace: 'pre-wrap',
            },
            strong: {
              color: `${theme('colors.neutral.DEFAULT')}`,
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
