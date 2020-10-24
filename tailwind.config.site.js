//--------------------------------------------------------------------------
// Tailwind site configuration
//--------------------------------------------------------------------------
//
// Use this file to completely define the current sites design system by
// adding and extending to Tailwinds default utility classes.
//

const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
  theme: {
    // Here you may register all of the colors you need for this project. 
    // These colors overwrite all the default Tailwind colors. If you don't want
    // this you should remove this part and extend color instead.
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
      }
    }
  },
  plugins: [
    plugin(function({ addBase, theme }) {
      addBase({
        // Default color transition on links.
        'a': {
          transition: 'color .2s ease-in-out',
        },
        'html': {
            fontDisplay: 'swap',
            color: theme('colors.neutral.800'),
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
      })
    }),
  ]
}
