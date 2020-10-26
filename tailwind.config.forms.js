//--------------------------------------------------------------------------
// Tailwind Custom Forms configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Custom Forms styles.
// Some defaults are provided.
// More info: https://github.com/tailwindlabs/tailwindcss-custom-forms.
//

const plugin = require('tailwindcss/plugin')

module.exports = {
  theme: {
    customForms: theme => ({
      default: {
        input: {
          borderColor: theme('colors.neutral.300'),
          color: theme('colors.neutral.800'),
        },
      },
      error: {
        'input, textarea': {
          borderColor: theme('colors.error.700'),
        },
      },
    })
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
  ]
}