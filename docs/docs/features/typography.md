# Typography

Peak contains a few basic typography partials in `resources/views/typography`. Whenever you need to render text in your partial you could call the relevant partial or add a new one. Usually typography styles are shared, so this helps keeping your templates DRY. Let's say we have a block in our page builder with a 

```html
{{ title }}
``` 

field. In the template partial for your block you could do the following:

```html
{{ partial:typography/h1 :content="block:title" }}
```

This will render the title with the styling defined in `typography/h1`. This way you ensure the same styling throughout your website without having to add or edit Tailwinds utility classes in multiple template files. Exceptions are possible. You can change the tag, text color and add classes when you need to:

```html
{{ partial:typography/h1 as="span" color="text-error-600" class="mb-8" :content="block:title" }}
```

Peak comes with a few defaults that are easy to style. Add as many partials your website needs.