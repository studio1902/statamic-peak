# Theme toggle (dark mode)

> You need to install the theme toggle preset and manually enable this feature.

In Tailwind CSS you can enable [default dark mode](https://tailwindcss.com/docs/dark-mode) by uncommenting `darkMode: 'media',` in `tailwind.config.js`. This way your website will react to the users OS wide `prefers-color-scheme`.

If you want to use [class based dark mode](https://tailwindcss.com/docs/dark-mode#toggling-dark-mode-manually) (recommended) you can use the theme switcher built into Peak that gives visitors the option of visiting your site in light mode, dark mode or the system preference. To use it do the following:

1. Uncomment `darkMode: 'class'` in `tailwind.config.js`.
2. Add

```html
{{ partial:components/theme_toggle }}
```
as the last list item in the main ul in `resources/views/navigation/_main_desktop.antlers.html`. The `section:theme_toggle` is automatically yielded in `resources/views/snippets/_browser_appearance.antlers.html`.

| Dark mode toggle  |
|---|
| ![Dark mode toggle](/visuals/screenshots/dark-mode.png) |
