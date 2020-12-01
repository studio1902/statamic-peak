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
  future: {  },
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
      // Always remove the following classes during purging.
      blocklist: ['?',],
      // Remove unused keyframes during purging.
      keyframes: true,
      // Always keep the following classes during purging.
      safelist: ['size-sm', 'size-md', 'size-lg', 'size-xl'],
    }
  },
  // Extend variants.
  variants: {
    extend: {
      scale: ['group-hover'],
      skew: ['group-hover'],
      rotate: ['group-hover'],
      translate: ['group-hover'],
      // typography: ["dark"],
    }
  }
}
