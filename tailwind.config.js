//--------------------------------------------------------------------------
// Tailwind configuration
//--------------------------------------------------------------------------
//
// Use the Tailwind configuration to completely define the current sites
// design system by adding and extending to Tailwinds default utility
// classes. Various aspects of the config are split inmultiple files.
//

import defaultConfig from 'tailwindcss/defaultConfig';
import typographyConfig from './tailwind.config.typography.js';
import peakConfig from './tailwind.config.peak.js';
import siteConfig from './tailwind.config.site.js';

/** @type {import('tailwindcss').Config} */
export default {
  // The various configurable Tailwind configuration files.
  presets: [
    defaultConfig,
    typographyConfig,
    peakConfig,
    siteConfig
  ],
  // Configure files to scan for utility classes (JIT).
  content: [
    './resources/views/**/*.blade.php',
    './resources/views/**/*.html',
    './resources/js/**/*.js',
    './content/**/*.md',
    './vendor/studio1902/**/*.blade.php',
    './vendor/studio1902/**/*.html',
    './vendor/studio1902/**/*.js',
  ],
  safelist: []
}
