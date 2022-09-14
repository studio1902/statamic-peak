//--------------------------------------------------------------------------
// Tailwind Typography configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Typography (or prosé) styles or configure certain variants.
// More info: https://tailwindcss.com/docs/typography-plugin.
//

const plugin = require('tailwindcss/plugin')

module.exports = {
  theme: {
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            'ul > li p, ol > li p': {
              marginTop: '0em !important',
              marginBottom: '0em !important',
            },
            ':where(.prose > div > :first-child)': {
              marginTop: '0 !important',
            },
            ':where(.prose > div > :last-child)': {
              marginBottom: '0 !important',
            },
            '.not-prose': {
              margin: '2rem 0 !important',
            }
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
