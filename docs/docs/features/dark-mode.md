# Dark mode

> You need to manually enable this feature.

In Tailwind CSS you can enable [default dark mode](https://tailwindcss.com/docs/dark-mode) by uncommenting `darkMode: 'media',` in `tailwind.config.js`. This way your website will react to the users OS wide `prefers-color-scheme`.

If you want to use [class based dark mode](https://tailwindcss.com/docs/dark-mode#toggling-dark-mode-manually) you should do the following:

1. Uncomment `darkMode: 'class'` in `tailwind.config.js`.
2. Add

```html
{{ partial:components/dark_mode_toggle }}
```
to the `<head>` in `resources/views/layout.antlers.html`.

3. Add

```html
{{ yield:dark_mode_toggle }}
```
as the last list item in the main ul in `resources/views/navigation/_main.antlers.html`.
