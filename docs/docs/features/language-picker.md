# Language picker

> You need to install the language picker preset and manually enable this feature.

There's a language picker included you can opt in to when you use multisite. It shows the current language in the navigation with a popout menu that shows all other languages. If an entry isn't translated the selector will link back to the homepage for that language.

If you want to use the language picker you should add:

```html
{{ partial:navigation/language_picker }}
```
as the last list item in the main ul in `resources/views/navigation/_main.antlers.html`.
