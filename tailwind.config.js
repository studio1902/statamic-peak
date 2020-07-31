const _ = require('lodash')
const plugin = require('tailwindcss/plugin')

module.exports = {
  purge: {
    content: [
      './resources/views/**/*.html',
      './resources/js/**/*.js',
    ],
    options: {
      whitelist: ['size-sm', 'size-md', 'size-lg', 'size-xl']
    }
  },  
  theme: {
    // These overwrite the default Tailwind colors.
    colors: {
      transparent: 'transparent',
      black:   '#000',
      white:  '#fff',
      // Greys
      neutral: {
        100: '#f7fafc',
        200: '#edf2f7',
        300: '#e2e8f0',
        400: '#cbd5e0',
        500: '#a0aec0',
        600: '#718096',
        700: '#4a5568',
        800: '#2d3748',
        900: '#1a202c',
      },
      // Client primary color, currently indigo.
      primary: {
        100: '#ebf4ff',
        200: '#c3dafe',
        300: '#a3bffa',
        400: '#7f9cf5',
        500: '#667eea',
        600: '#5a67d8',
        700: '#4c51bf',
        800: '#434190',
        900: '#3c366b',
      },
      // Error styling colors: red
      error: {
        50: '#FDF2F2',
        100: '#FCE8E8',
        200: '#FBD5D5',
        300: '#F8B4B3',
        400: '#F88080',
        500: '#F05252',
        600: '#E02423',
        700: '#C81F1D',
        800: '#9B1D1C',
        900: '#771D1D',
      },
      // Notice styling colors: yellow
      notice: {
        50: '#FDFDEA',
        100: '#FDF5B2',
        200: '#FCE96B',
        300: '#FACA16',
        400: '#E3A009',
        500: '#C27805',
        600: '#9F580B',
        700: '#8E4B10',
        800: '#723A14',
        900: '#643112',
      },
      // Success styling colors: green
      success: {
        50: '#F3FAF7',
        100: '#DEF7EC',
        200: '#BBF0DA',
        300: '#84E1BC',
        400: '#30C48D',
        500: '#0D9F6E',
        600: '#047A55',
        700: '#036C4E',
        800: '#06543F',
        900: '#024737',
      },
    },
    extend: {
      padding: {
        // Used to generate responsive video embeds.
        'video': '56.25%',
      },
      screens: {
        // Add a slightly wider breakpoint.
        '2xl': '1440px',
      },
      zIndex: {
        // Z-index stuff behind parent.
        'behind': '-1',
      },
    },
    // Overwrite default prose styling https://github.com/tailwindcss/typography.
    typography: (theme) => ({
      default: {
        css: {
          color: theme('colors.neutral.800'),
          '[class~="lead"]': {
            color: theme('colors.neutral.800'),
          },
          a: {
            color: theme('colors.primary.400'),
            '&:hover': {
              color: theme('colors.primary.600'),
            },
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
    // Overwrite default form styling: https://github.com/tailwindlabs/tailwindcss-custom-forms
    customForms: theme => ({
      default: {
        input: {
          backgroundColor: theme('colors.primary'),
          borderColor: 'transparent',
          borderRadius: 'none',
          color: theme('colors.light'),
          fontSize: '1rem',
          padding: '1rem',
          '&:focus': {
            border: '1px solid rgba(255, 255, 255, .7)',
            boxShadow: '0 0 0 3px rgba(255, 255, 255, .5);',
          },
        },
      },
      error: {
        'input, textarea': {
          borderColor: theme('colors.red.700'),
        },
      },
    })
  },
  variants: {
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/custom-forms'),
    plugin(function({ addBase, theme }) {
      addBase({
        // Used to hide alpine elements before being rendered.
        '[x-cloak]': { 
          display: 'none'
        },
        'html': {
          fontDisplay: 'swap',
          color: theme('colors.black'),
          fontSize: '16px',
          'font-size': 'clamp(1rem, 2vw, 1.15rem)',
          fontFamily: theme('fontFamily.sans').join(', '),
        },
        '::selection': {
          backgroundColor: theme('colors.black'),
          color: theme('colors.white'),
        },
        '::-moz-selection': {
          backgroundColor: theme('colors.black'),
          color: theme('colors.white'),
        },
      })
    }),

    plugin(function({ addUtilities, theme, variants }) {
      const newUtilities = {
        '.fluid-container': {
          width: '100%',
          maxWidth: theme('screens.2xl'),
          marginLeft: 'auto',
          marginRight: 'auto',
          'padding-left': theme('padding.8'),
          'padding-right': theme('padding.8'),
          paddingLeft: 'calc(env(safe-area-inset-left) + ' + theme('padding.8') + ')',
          paddingRight: 'calc(env(safe-area-inset-right) + ' + theme('padding.8') + ')',
        },
        [`@media (min-width: ${theme('screens.lg')})`]: {
          '.fluid-container': {
            'padding-left': theme('padding.12'),
            'padding-right': theme('padding.12'),
          },
        },
      }
      addUtilities(newUtilities, variants('fluidContainer'))
    }),

    plugin(function({ addComponents, theme }) {
      const components = {
        '.no-scroll': {
          height: '100%',
          overflow: 'hidden',
        },
        '.outer-grid': {
          width: '100%',
          display: 'grid',
          rowGap: theme('spacing.12'),
          paddingTop: theme('spacing.12'),
          paddingBottom: theme('spacing.12'),
          '& > *:last-child:has(.w-full)': {
            marginBottom: theme('spacing.12') * -1,
          },
        },
        '.rtl': {
          direction: 'rtl',
        },
        '.ltr': {
          direction: 'ltr',
        },
        '.size-sm, .size-md, .size-lg, .size-xl': {
          gridColumn: 'span 12 / span 12',
        },
        [`@media (min-width: ${theme('screens.md')})`]: {
          '.outer-grid': {
            rowGap: theme('spacing.16'),
            paddingTop: theme('spacing.16'),
            paddingBottom: theme('spacing.16'),
            '& > *:last-child:has(.w-full)': {
              marginBottom: theme('spacing.16') * -1,
            },
          },
          '.size-sm': {
            gridColumn: 'span 4 / span 4',
            gridColumnStart: '3',
          },
          '.size-md': {
            gridColumn: 'span 6 / span 6',
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
          '.outer-grid': {
            rowGap: theme('spacing.24'),
            paddingTop: theme('spacing.24'),
            paddingBottom: theme('spacing.24'),
            '& > *:last-child:has(.w-full)': {
              marginBottom: theme('spacing.24') * -1,
            },
          },
          '.size-sm': {
            gridColumn: 'span 4 / span 4',
            gridColumnStart: '4',
          },
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
      }
      addComponents(components)
    }),
  ]
}