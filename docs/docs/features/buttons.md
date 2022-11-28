# Buttons

The files `resources/fieldsets/buttons.yaml` and `resources/views/components/_buttons.antlers.html` go together. The button fieldset is a set in Bard but can also be called from other fieldsets where you want to include buttons. Just call the buttons partial in your template and one or multiple buttons will be rendered.

| Buttons |
|---|
| ![Buttons](/visuals/screenshots/button.png) |

## Rendering a single button

In some cases you don't want to render dynamic buttons but a button to a specific entry or URL. This is possible using any of the following methods.

Link to the index page the collection `news` is mounted on:
```html
{{ partial:components/button label="All news" link_type="url" url="{mount_url:news}" }}
```

Or link to a single entry:
```html
 {{ partial:components/button label="Read more about this entry" link_type="entry" :entry="entry" }}
```

Or to do fancy Alpine stuff:
```html
{{ partial:components/button }}
    {{ slot:attributes }}
        @click="doSomething()"
    {{ /slot:attributes }}
{{ /partial:components/button }}
```
