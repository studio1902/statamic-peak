# Bard

For long form content you can use the `Article` content block. This is a [Bard fieldtype](https://statamic.dev/fieldtypes/bard#content) with multiple sets of fields that are regularly used in longer articles.

## Adding sets
Add a set by using the [add set command](/features/commands.html#add-page-builder-article-set). Alternatively you could edit `resources/fieldsets/article.yaml` to add sets (preferably imports) to the article. In `resources/views/page_builder/_article.antlers.html` you can see the sets being loaded. Antlers will look in the `resources/views/components/` folder for partials with the handle of your set.

For example if you add a fieldset to the `article.yaml` with the handle `code` make sure you add a `_code.antlers.html` file to the `resources/views/components` folder.

> Note: sets are scoped under `set` to avoid collision with other fields. Make sure you reference variables in a block like this:

```html
{{ set:field_name }}
```

## Sizing utilities
An article goes into a CSS Grid with 12 columns. By default all sets get the class `size-md`. As you can see in `tailwind.config.js` on mobile this means those elements span 12 columns. On larger screens however they just span 6 columns (centered). There are other sizing utilities as well:

* *size-sm*: 12 columns on mobile, 4 columns from medium screens up
* *size-md*: 12 columns on mobile, 6 columns from medium screens up
* *size-lg*: 12 columns on mobile, 8 columns from medium screens up
* *size-xl*: 12 columns on mobile, 10 columns from medium screens up

For example use the sizing utilities to let an image break out of it's content. In sets like `figure` and `video` the user can pick their own size using the `size` field in `resources/fieldsets/common.yaml`.

> Note: the layout doesn't have to be centered and is easy to change in the `tailwind.config.js` file.

| Bard sizing utilities |
|---|
| ![Bard sizing utilities](/visuals/screenshots/bard.png) |
