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
    colors: {
      transparent: 'transparent',
      black:   '#000',
      white:  '#fff',
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
    },
    extend: {
      padding: {
        'video': '56.25%',
      },
      screens: {
        '2xl': '1440px',
      },
      zIndex: {
        'behind': '-1',
      },
    },
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