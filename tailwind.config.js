//--------------------------------------------------------------------------
// Tailwind configuration
//--------------------------------------------------------------------------
//
// Use the Tailwind configuration to completely define the current sites 
// design system by adding and extending to Tailwinds default utility 
// classes. Various aspects of the config are split inmultiple files.
//

const _ = require('lodash')
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
  // The various configurable Tailwind configuration files.
  presets: [
    require('tailwindcss/defaultConfig'),
    require('./tailwind.config.typography.js'),
    require('./tailwind.config.peak.js'),
    require('./tailwind.config.site.js'),
  ],
  // Opt in to future Tailwind features.
  future: {
    defaultLineHeights: true,
    extendedSpacingScale: true,
    purgeLayersByDefault: true,
    standardFontWeights: true,
    removeDeprecatedGapUtilities: true,
  },
  // Dark mode
  dark: 'media', // or 'class'
  experimental: {
    darkModeVariant: false,
    // Add extra breakpoint.
    additionalBreakpoint: false,
  },
  // Configure Purge CSS.
  purge: {
    content: [
      './resources/views/**/*.html',
      './resources/js/**/*.js',
    ],
    options: {
      whitelist: ['size-sm', 'size-md', 'size-lg', 'size-xl']
    }
  },
  // Define all variants available.
  variants: {
    boxShadow: ['responsive', 'hover', 'focus', 'group-hover'],
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'],
    opacity: ['responsive', 'hover', 'focus', 'group-hover'],
    scale: ['responsive', 'hover', 'focus', 'group-hover'],
    skew: ['responsive', 'hover', 'focus', 'group-hover'],
    rotate: ['responsive', 'hover', 'focus', 'group-hover'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    translate: ['responsive', 'hover', 'focus', 'group-hover'],
  }
}
