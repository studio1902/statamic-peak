//--------------------------------------------------------------------------
// Tailwind site configuration
//--------------------------------------------------------------------------
//
// Use this file to completely define the current sites design system by
// adding and extending to Tailwinds default utility classes.
//

const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

module.exports = {
  theme: {
    // Here we define the default colors available. If you want to include
    // all default Tailwind colors you should extend the colors instead. 
    colors: {
      transparent: 'transparent',
      black:   '#000',
      white:  '#fff',
      // Grays (currently default TW blue gray).
      neutral: colors.blueGray,
      // Client primary color (currently default TW blue).
      // This is the color set you usually change for each project with brand color shades.
      primary: colors.blue,
      // Error styling colors (currently default TW Red).
      error: colors.red,
      // Notice styling colors (currently default TW Amber).
      notice: colors.amber,
      // Success styling colors (currently default TW Amber).
      success: colors.green,
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
      },
      // Set default transition durations and easing when using the transition utilities.
      transitionDuration: {
        DEFAULT: '300ms',
      },
      transitionTimingFunction: {
        DEFAULT: 'cubic-bezier(0.4, 0, 0.2, 1)',
      },
    },
  },
  plugins: [
    plugin(function({ addBase, theme }) {
      addBase({
        // Default color transition on links unless user prefers reduced motion.
        '@media (prefers-reduced-motion: no-preference)': {
          'a': {
            transition: 'color .3s ease-in-out',
          },
        },
        'html': {
            fontDisplay: 'swap',
            color: theme('colors.neutral.800'),
            //--------------------------------------------------------------------------
            // Set sans, serif or mono stack with optional custom font as default.
            //--------------------------------------------------------------------------
            // fontFamily: theme('fontFamily.mono'),
            fontFamily: theme('fontFamily.sans'),
            // fontFamily: theme('fontFamily.serif'),
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

    // Custom components for this particular site.
    plugin(function({ addComponents, theme }) {
      const components = {
        
      }
      addComponents(components)
    }),

    // Custom utilities for this particular site.
    plugin(function({ addUtilities, theme, variants }) {
      const newUtilities = {
      }
      addUtilities(newUtilities)
    }),
  ]
}
