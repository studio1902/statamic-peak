# Assets

## Images
Peak comes with a picture partial that will add responsive sourcesets to your images. The variants generated are defined in `config/statamic/assets.php` and cover most use cases. In `resources/views/components/_figure.antlers.html` you can see an example of how to include the picture partial. It accepts the following arguments:

* `image`: *asset*, the actual image variable.
* `class`: *string*, optional css classes that should be applied to the image.
* `cover`: *boolean*, true means the image should cover the containing element.
* `sizes`: *string*, the sizes attribute that informs the browser how the image should be rendered.

The following example renders an image and object-fills it's wrapping container:

```html
{{ partial:components/picture :image="image" cover="true" sizes="(min-width: 768px) 35vw, 90vw" }}
```

See [this article](https://studio1902.nl/blog/responsive-images-with-statamic-tailwind-and-glide/) for more information.

> Note: alternatively you could use the fantastic [Responsive Images Addon](https://github.com/spatie/statamic-responsive-images) by [Rias](https://github.com/riasvdv) from Spatie. It features more asset presets and uses Javascript to auto populate your `sizes` attribute.

## Background images
Peak comes with a background image snippet you can use to apply responsive images (WebP included) to an elements background. Just use

```html
{{ partial:snippets/background_image image="YOUR_IMAGE" class="CLASS_OF_ELEMENT_THAT_NEEDS_BG_IMAGE" }}
```
The predefined sizes used in `resources/views/snippets/_background_image.antlers.html` are defined in `config/statamic/assets.php`.

> Note: You can use either a hardcoded image or an image from an asset field.
