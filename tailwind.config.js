//--------------------------------------------------------------------------
// Tailwind configuration
//--------------------------------------------------------------------------
//
// Use the Tailwind configuration to completely define the current sites 
// design system by adding and extending to Tailwinds default utility 
// classes. Various aspects of the config are split inmultiple files.
//

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
  // Uncomment the next line to enable Dark mode using `prefers-color-scheme`.
  // darkMode: 'media', 
  // Or use the next line to use darkmode by adding a class to your html.
  // darkMode: 'class',
  mode: 'jit',
  // Configure Purge CSS.
  purge: {
    content: [
      './resources/views/**/*.html',
      './resources/js/**/*.js',
    ],
    layers: ['components', 'utilities'],
  },
}
