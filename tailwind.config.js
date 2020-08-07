//--------------------------------------------------------------------------
// Tailwind configuration
//--------------------------------------------------------------------------
//
// Use this file to completely define the current sites design system by
// adding and extending to Tailwinds default utility classes.
//

const _ = require('lodash')
const defaultTheme = require('tailwindcss/defaultTheme')
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
    //--------------------------------------------------------------------------
    // Color configuration
    //--------------------------------------------------------------------------
    //
    // Here you may register all of the colors you need for this project.
    // These colors overwrite all the default Tailwind colors. If you don't want
    // this you should remove this part and extend color instead.
    //
    colors: {
      transparent: 'transparent',
      black:   '#000',
      white:  '#fff',
      // Grays (default TW gray)
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
      // Client primary color, currently blue.
      primary: {
        100: '#ebf8ff',
        200: '#bee3f8',
        300: '#90cdf4',
        400: '#63b3ed',
        500: '#4299e1',
        600: '#3182ce',
        700: '#2b6cb0',
        800: '#2c5282',
        900: '#2a4365',
      },
      // Error styling colors: red (TW Red)
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
      // Notice styling colors: yellow (TW Yellow)
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
      // Success styling colors: green (TW Green)
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
    //--------------------------------------------------------------------------
    // Extend configuration
    //--------------------------------------------------------------------------
    //
    // Here you may extend Tailwinds utility classes. Some defaults are 
    // provided.
    //
    extend: {
      fontFamily: {
        mono: [
          // Use a custom mono font for this site by changing 'Anonymous' to the 
          // font name you want and uncommenting the following line.
          // 'Anonymous',
          ...defaultTheme.fontFamily.mono,
        ],
        sans: [
          // Use a custom sans serif font for this site by changing 'Gaultier' to the 
          // font name you want and uncommenting the following line.
          // 'Gaultier',
          ...defaultTheme.fontFamily.sans,
        ],
        serif: [
          // Use a custom serif font for this site by changing 'Lavigne' to the 
          // font name you want and uncommenting the following line.
          // 'Lavigne',
          ...defaultTheme.fontFamily.serif,
        ],
      },
      padding: {
        // Used to generate responsive video embeds.
        'video': '56.25%',
      },
      screens: {
        // Add a slightly wider breakpoint.
        '2xl': '1440px',
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
    //--------------------------------------------------------------------------
    // Tailwind Typography configuration
    //--------------------------------------------------------------------------
    //
    // Here you may overwrite the default Tailwind Typography (or prosé) styles.
    // Some defaults are provided.
    // More info: https://github.com/tailwindcss/typography.
    //
    typography: (theme) => ({
      default: {
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
    //--------------------------------------------------------------------------
    // Tailwind Custom Forms configuration
    //--------------------------------------------------------------------------
    //
    // Here you may overwrite the default Tailwind Custom Forms styles.
    // Some defaults are provided.
    // More info: https://github.com/tailwindlabs/tailwindcss-custom-forms.
    //
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
  //--------------------------------------------------------------------------
  // Tailwind variants configuration
  //--------------------------------------------------------------------------
  //
  // Here you may extend the variants Tailwind generates.
  // Some often used group-hover variants are added here.
  // More info: https://tailwindcss.com/docs/configuration/#app
  //
  variants: {
    boxShadow: ['responsive', 'hover', 'focus', 'group-hover'],
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'],
    opacity: ['responsive', 'hover', 'focus', 'group-hover'],
    scale: ['responsive', 'hover', 'focus', 'group-hover'],
    skew: ['responsive', 'hover', 'focus', 'group-hover'],
    rotate: ['responsive', 'hover', 'focus', 'group-hover'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    translate: ['responsive', 'hover', 'focus', 'group-hover'],
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/custom-forms'),
    //--------------------------------------------------------------------------
    // Tailwind custom Peak plugins
    //--------------------------------------------------------------------------
    //
    // Here we define base styles used by Peak. You may overwrite those to
    // reflect your sites brand or add more.
    //
    plugin(function({ addBase, theme }) {
      addBase({
        // Used to hide alpine elements before being rendered.
        '[x-cloak]': { 
          display: 'none'
        },
        'html': {
          fontDisplay: 'swap',
          color: theme('colors.neutral.800'),
          fontSize: '16px',
          // Fluid typography from 1 rem to 1.15 rem. 
          'font-size': 'clamp(1rem, 2vw, 1.15rem)',
          //--------------------------------------------------------------------------
          // Set sans, serif or mono stack with optional custom font as default.
          //--------------------------------------------------------------------------
          // fontFamily: theme('fontFamily.mono').join(', '),
          fontFamily: theme('fontFamily.sans').join(', '),
          // fontFamily: theme('fontFamily.serif').join(', '),
        },
        '::selection': {
          backgroundColor: theme('colors.primary.600'),
          color: theme('colors.white'),
        },
        '::-moz-selection': {
          backgroundColor: theme('colors.primary.600'),
          color: theme('colors.white'),
        },
        //--------------------------------------------------------------------------
        // Display screen breakpoints in debug environment.
        //--------------------------------------------------------------------------
        'body.debug::before': {
          display: 'block',
          position: 'fixed',
          zIndex: '99',
          top: theme('spacing.1'),
          left: theme('spacing.1'),
          padding: theme('spacing.1'),
          border: '1px',
          borderStyle: 'solid',
          borderColor: theme('colors.notice.300'),
          borderRadius: theme('borderRadius.full'),
          backgroundColor: theme('colors.notice.200'),
          fontSize: '.5rem',
          color: theme('colors.notice.900'),
          textTransform: 'uppercase',
          fontWeight: theme('fontWeight.bold'),
          content: '"-"',
          pointerEvents: 'none',
        },
      })
    }),

    plugin(function({ addBase, theme}) {
      const breakpoints = _.map(theme('screens'), (value, key) => {
        return {
          [`@media (min-width: ${value})`]: {
            'body.debug::before': {
              content: `"${key}"`,
            }
          }
        }
      })
      addBase(breakpoints)
    }),

    //--------------------------------------------------------------------------
    // Tailwind custom components
    //--------------------------------------------------------------------------
    //
    // Here we define custom components used by Peak.
    //
    plugin(function({ addComponents, theme }) {
      const components = {
        // The main wrapper for all sections on our website. Has a max width and is centered. 
        '.fluid-container': {
          width: '100%',
          maxWidth: theme('screens.2xl'),
          marginLeft: 'auto',
          marginRight: 'auto',
          // Use safe-area-inset together with default padding for Apple devices with a notch.
          paddingLeft: 'calc(env(safe-area-inset-left, 0rem) + ' + theme('padding.8') + ')',
          paddingRight: 'calc(env(safe-area-inset-right, 0rem) + ' + theme('padding.8') + ')',
        },
        // Disable scroll e.g. when a modal is open. Should be used on the <body>
        '.no-scroll': {
          height: '100%',
          overflow: 'hidden',
        },
        // The outer grid where all our blocks are a child of. Spreads out all blocks vertically
        // with a uniform space between them.
        '.outer-grid': {
          width: '100%',
          display: 'grid',
          rowGap: theme('spacing.12'),
          paddingTop: theme('spacing.12'),
          paddingBottom: theme('spacing.12'),
          // If the last child of the outer grid is full width (e.g. when it has a full width 
          // colored background), give it negative margin bottom to get it flush to your 
          // sites footer.
          '& > *:last-child:has(.w-full)': {
            marginBottom: theme('spacing.12') * -1,
          },
        },
        [`@media (min-width: ${theme('screens.md')})`]: {
          // Larger vertical spacing between blocks on larger screens.
          '.outer-grid': {
            rowGap: theme('spacing.16'),
            paddingTop: theme('spacing.16'),
            paddingBottom: theme('spacing.16'),
            '& > *:last-child:has(.w-full)': {
              marginBottom: theme('spacing.16') * -1,
            },
          },
        },
        [`@media (min-width: ${theme('screens.lg')})`]: {
          // Larger horizontal padding on larger screens.
          '.fluid-container': {
            // Use safe-area-inset together with default padding for Apple devices with a notch.
            paddingLeft: 'calc(env(safe-area-inset-left, 0rem) + ' + theme('padding.12') + ')',
            paddingRight: 'calc(env(safe-area-inset-right, 0rem) + ' + theme('padding.12') + ')',
          },
          // Larger vertical spacing between blocks on larger screens.
          '.outer-grid': {
            rowGap: theme('spacing.24'),
            paddingTop: theme('spacing.24'),
            paddingBottom: theme('spacing.24'),
            '& > *:last-child:has(.w-full)': {
              marginBottom: theme('spacing.24') * -1,
            },
          },
        },
      }
      addComponents(components)
    }),

    //--------------------------------------------------------------------------
    // Tailwind custom utilities
    //--------------------------------------------------------------------------
    //
    // Here we define custom utilities not provided by Tailwind.
    //
    plugin(function({ addUtilities, theme, variants }) {
      const newUtilities = {
        // Sizing utilities for sets in our bard (long form content).
        // On small devices they're full width.
        '.size-sm, .size-md, .size-lg, .size-xl': {
          gridColumn: 'span 12 / span 12',
        },
        [`@media (min-width: ${theme('screens.md')})`]: {
          // Sizing utilities for sets in our bard (long form content).
          // On larger devices they go from small to extra large.
          // (E.g. an image wider then text in an article.)
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
          // Sizing utilities for sets in our bard (long form content).
          // On larger devices they go from small to extra large.
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
      addUtilities(newUtilities)
    }),
  ]
}