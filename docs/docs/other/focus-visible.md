# Focus-visible

Focus-visible solves a lot of issues regarding a11y and styling. To use focus-visible today we need polyfills (for Safari). One in [Javascript](https://github.com/WICG/focus-visible) and one in [PostCSS](https://github.com/csstools/postcss-focus-visible). With focus-visible we can make sure the browser only shows an outline when the user navigates with a keyboard. This means no more outlines in Chrome when you click styled buttons.

You can take this even further by using the [Tailwind CSS Ring utilties](https://tailwindcss.com/docs/ring-width) together with the `focus-visible:` variant to customize and brand your focus styles.
