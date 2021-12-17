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
      },
      zIndex: {
        // Z-index stuff behind it's parent.
        'behind': '-1',
      },
    },
  },
  plugins: [
    // Use Tailwinds aspect-ratio plugin for embedded media: https://github.com/tailwindlabs/tailwindcss-aspect-ratio.
    require('@tailwindcss/aspect-ratio'),
    // Use Tailwinds forms plugin for form styling: https://github.com/tailwindlabs/tailwindcss-forms
    require('@tailwindcss/forms'),
    plugin(function({ addBase, theme }) {
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
        // Implement the focus-visible polyfill: https://github.com/WICG/focus-visible
        '.js-focus-visible :focus:not(.focus-visible)': {
          outline: 'none',
        },
        // Display screen breakpoints in debug environment.
        '.breakpoint:before': {
          display: 'block',
          color: theme('colors.notice.900'),
          textTransform: 'uppercase',
          content: '"-"',
        },
        // Sizing utilities for sets in our bard (long form content).
        // On small devices they're full width.
        '.size-md, .size-lg, .size-xl': {
          gridColumn: 'span 12 / span 12',
        },
        [`@media (min-width: ${theme('screens.md')})`]: {
          // Sizing utilities for sets in our bard (long form content).
          // On larger devices they go from medium to extra large.
          // (E.g. an image wider then text in an article.)
          '.size-md': {
            gridColumn: 'span 8 / span 8',
            gridColumnStart: '3',
          },
          '.size-lg': {
            gridColumn: 'span 8 / span 8',
            gridColumnStart: '3',
          },
          '.size-xl': {
            gridColumn: 'span 10 / span 10',
            gridColumnStart: '2',
          },
        },
        [`@media (min-width: ${theme('screens.lg')})`]: {
          // Sizing utilities for sets in our bard (long form content).
          // On larger devices they go from medium to extra large.
          '.size-md': {
            gridColumn: 'span 6 / span 6',
            gridColumnStart: '4',
          },
          '.size-lg': {
            gridColumn: 'span 8 / span 8',
            gridColumnStart: '3',
          },
          '.size-xl': {
            gridColumn: 'span 10 / span 10',
            gridColumnStart: '2',
          },
        },
      })
    }),

    // Render screen names in the breakpoint display.
    plugin(function({ addBase, theme}) {
      const breakpoints = Object.entries(theme('screens'))
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
      )

      addBase(breakpoints)
    }),

    plugin(function({ addComponents, theme }) {
      const components = {
        // The main wrapper for all sections on our website. Has a max width and is centered.
        '.fluid-container': {
          width: '100%',
          maxWidth: theme('screens.xl'),
          marginLeft: 'auto',
          marginRight: 'auto',
          // Use safe-area-inset together with default padding for Apple devices with a notch.
          paddingLeft: `calc(env(safe-area-inset-left, 0rem) + ${theme('padding.8')})`,
          paddingRight: `calc(env(safe-area-inset-right, 0rem) + ${theme('padding.8')})`,
        },
        // The outer grid where all block builder blocks are a child of. Spreads out all blocks
        // vertically with a uniform space between them.
        '.outer-grid': {
          width: '100%',
          display: 'grid',
          rowGap: theme('spacing.12'),
          paddingTop: theme('spacing.12'),
          paddingBottom: theme('spacing.12'),
          // If the last child of the outer grid is full width (e.g. when it has a full width
          // colored background), give it negative margin bottom to get it flush to your
          // sites footer.
          '& > *:last-child.w-full': {
            marginBottom: `-${theme('spacing.12')}`,
          },
        },
        [`@media (min-width: ${theme('screens.md')})`]: {
          // Larger vertical spacing between blocks on larger screens.
          '.outer-grid': {
            rowGap: theme('spacing.16'),
            paddingTop: theme('spacing.16'),
            paddingBottom: theme('spacing.16'),
            '& > *:last-child.w-full': {
              marginBottom: `-${theme('spacing.16')}`,
            },
          },
        },
        [`@media (min-width: ${theme('screens.lg')})`]: {
          // Larger horizontal padding on larger screens.
          '.fluid-container': {
            // Use safe-area-inset together with default padding for Apple devices with a notch.
            paddingLeft: `calc(env(safe-area-inset-left, 0rem) + ${theme('padding.12')})`,
            paddingRight: `calc(env(safe-area-inset-right, 0rem) + ${theme('padding.12')})`,
          },
          // Larger vertical spacing between blocks on larger screens.
          '.outer-grid': {
            rowGap: theme('spacing.24'),
            paddingTop: theme('spacing.24'),
            paddingBottom: theme('spacing.24'),
            '& > *:last-child.w-full': {
              marginBottom: `-${theme('spacing.24')}`,
            },
          },
        },
      }
      addComponents(components)
    }),

    plugin(function({ addUtilities, theme, variants }) {
      const newUtilities = {
        // Fill icons that have a fill defined within their paths. For example coming from an asset container.
        '.fill-current-cascade *': {
          fill: 'currentColor',
        },
      }
      addUtilities(newUtilities)
    }),
  ]
}
