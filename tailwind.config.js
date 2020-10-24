//--------------------------------------------------------------------------
// Tailwind configuration
//--------------------------------------------------------------------------
//
// Use this file to completely define the current sites design system by
// adding and extending to Tailwinds default utility classes. Various 
// aspects are split up in to multiple files.
//

const _ = require('lodash')
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

module.exports = {
  presets: [
    require('tailwindcss/defaultConfig'),
    require('./tailwind.peak.config.js'),
    require('./tailwind.typography.config.js'),
    require('./tailwind.forms.config.js'),
    require('./tailwind.site.config.js')

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
  }
}
