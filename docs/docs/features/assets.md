# Assets

Peak comes with a picture partial that will add responsive sourcesets to your images. In `resources/views/components/_figure.antlers.html` you can see an example of how to include the picture partial. It accepts the following arguments:

* `image`: *asset*, the actual image variable.
* `aspect_ratio`: *string*, Pass in an aspect ratio to crop the image in a certain way. `16/9` for example or specify a second ratio for larger screens: `1/1 large:1/2`.
* `class`: *string*, optional css classes that should be applied to the image.
* `cover`: *boolean*, true means the image should cover the containing element.
* `sizes`: *string*, the sizes attribute that informs the browser how the image should be rendered.
* `quality` *int* Set image quality. Defaults to 85.

The following example renders a squared image on small screens and a 4/3 image on larger screens. It object-fills it's wrapping container and is lazy loaded:

```html
{{ partial:components/picture :image="image" aspect_ratio="1/1 desktop:4/3" cover="true" sizes="(min-width: 768px) 35vw, 90vw" lazy="true" }}
```

See [this article](https://studio1902.nl/blog/responsive-images-with-statamic-tailwind-and-glide/) for more information. Although it was written for Statamic V2, the concept of the partial remains the same for v3.

> Note: alternatively you could use the fantastic [Responsive Images Addon](https://github.com/spatie/statamic-responsive-images) by [Rias](https://github.com/riasvdv) from Spatie. It has few more features and uses Javascript to auto populate your `sizes` attribute.
