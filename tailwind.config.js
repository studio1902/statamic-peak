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
    require('./tailwind.config.typography.js'),
    require('./tailwind.config.forms.js'),
    require('./tailwind.config.peak.js'),
    require('./tailwind.config.site.js'),
  ],
  future: {
    defaultLineHeights: true,
    extendedSpacingScale: true,
    purgeLayersByDefault: true,
    standardFontWeights: true,
    removeDeprecatedGapUtilities: true,
  },
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
