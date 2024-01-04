//--------------------------------------------------------------------------
// Tailwind custom Peak configuration
//--------------------------------------------------------------------------
//
// Here we define base styles, components and utilities used by Peak.
//

const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

module.exports = {
  theme: {
    extend: {
      colors: {
        current: 'currentColor',
        transparent: 'transparent',
        // Gray colors.
        gray: colors.slate,
        // Error styling colors.
        red: colors.red,
        // Notice styling colors.
        yellow: colors.amber,
        // Success styling colors.
        green: colors.green,
      },
      spacing: {
        // Used for the mobile navigation toggle.
        'safe': 'calc(env(safe-area-inset-bottom, 0rem) + 2rem)',
        'fluid-grid-gap': 'var(--col-gap)'
      },
      zIndex: {
        // Z-index stuff behind it's parent.
        'behind': '-1',
      },
    },
  },
  plugins: [
    // Use Tailwinds forms plugin for form styling: https://github.com/tailwindlabs/tailwindcss-forms
    require('@tailwindcss/forms')({
      strategy: 'base',
    }),
    plugin(function({ addComponents, addUtilities, matchUtilities, addBase, theme }) {
      addBase({
        ':root': {
          // Fluid typography from 1 rem to 1.2 rem with fallback to 16px.
          fontSize: '100%',
          'font-size': 'clamp(1rem, 1.6vw, 1.2rem)',
          // Safari resize fix.
          minHeight: '0vw',
        },
        // Used to hide alpine elements before being rendered.
        '[x-cloak]': {
          display: 'none !important'
        },
        // Display screen breakpoints in debug environment.
        '.breakpoint:before': {
          display: 'block',
          color: theme('colors.yellow.900'),
          textTransform: 'uppercase',
          content: '"-"',
        }
      }),
      // Fluid grid components.
      addComponents({
        '.fluid-grid': {
          '--col-gap': 'clamp(1rem, 3vw, 4rem)',
          '--content-max-width': theme('screens.xl'),
          '--col-width': `calc((min(calc(100% - var(--padding-left) - var(--padding-right) - 2 * var(--col-gap)), var(--content-max-width)) - 11 * var(--col-gap)) / 12)`,
          '--padding-left': 'clamp(calc(env(safe-area-inset-left, 0rem) + 1rem), 2vw, calc(env(safe-area-inset-left, 0rem) + 2rem))',
          '--padding-right': 'clamp(calc(env(safe-area-inset-right, 0rem) + 1rem), 2vw, calc(env(safe-area-inset-right, 0rem) + 2rem))',
          '--side-width': 'minmax(0, 1fr)',
          display: 'grid',
          columnGap: 'var(--col-gap)',
          gridTemplateColumns: '[full-start] var(--side-width) [content-start col-1] var(--col-width) [col-2] var(--col-width) [col-3] var(--col-width) [col-4] var(--col-width) [col-5] var(--col-width) [col-6] var(--col-width) [col-7] var(--col-width) [col-8] var(--col-width) [col-9] var(--col-width) [col-10] var(--col-width) [col-11] var(--col-width) [col-12] var(--col-width) [content-end] var(--side-width) [full-end]',
        }
      }),
      // Add fluid grid utilities.
      addUtilities({
        '.span-content, .span-md, .span-lg, .span-xl': {
          gridColumn: 'content'
        },
        '.span-full': {
          gridColumn: 'full'
        },
        '@media screen(md)': {
          '.span-md': {
            gridColumn: 'col-3 / span 8'
          },
          '.span-lg': {
            gridColumn: 'col-2 / span 10'
          },
          '.span-xl': {
            gridColumn: 'col-1 / span 12'
          }
        },
        '@media screen(lg)': {
          '.span-md': {
            gridColumn: 'col-4 / span 6'
          },
          '.span-lg': {
            gridColumn: 'col-3 / span 8'
          },
          '.span-xl': {
            gridColumn: 'col-2 / span 10'
          }
        }
      }),
      // Stack utilities.
      matchUtilities(
        {
          stack: (value) => ({
            '--stack-space': value,
            '> *:not(.no-space-y, .no-space-b) + *:not(.no-space-y, .no-space-t)': {
              marginBlockStart: 'var(--stack-space, 4rem)'
            },
          }),
        },
        { values: theme('spacing') }
      ),
      // Stack gap utilities.
      matchUtilities(
        {
          'stack-space': (value) => ({
            '--stack-space': value,
          }),
        },
        { values: theme('spacing') }
      ),
      // Render screen names in the breakpoint display.
      addBase(Object.entries(theme('screens'))
        .filter(value => typeof value[1] == 'string')
        .sort((a, b) => {
          return a[1].replace(/\D/g, '') - b[1].replace(/\D/g, '')
        })
        .map((value) => {
          return {
            [`@media (min-width: ${value[1]})`]: {
              '.breakpoint::before': {
                content: `"${value[0]}"`,
              }
            }
          }
        }
      ))
    }),
  ]
}
