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
  presets: [
    require('tailwindcss/defaultConfig'),
    require('./tailwind.typography.config.js'),
    require('./tailwind.forms.config.js'),
    require('./tailwind.base.config.js'),
  ],
  future: {
    defaultLineHeights: true,
    extendedSpacingScale: true,
    purgeLayersByDefault: true,
    standardFontWeights: true,
    removeDeprecatedGapUtilities: true,
  },
  //--------------------------------------------------------------------------
  // Dark mode (experimental)
  //--------------------------------------------------------------------------
  //
  // Uncomment the following to use experimental dark mode support.
  // More info: https://github.com/tailwindlabs/tailwindcss/pull/2279
  //
  // dark: 'media', // or 'class'
  // experimental {
  //   darkModeVariant: true,
  // },
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
    // You can also create your own colors on https://javisperez.github.io/tailwindcolorshades/#/
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
    require('@tailwindcss/custom-forms')
  ]
}
