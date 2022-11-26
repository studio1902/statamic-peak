# Images

Peak comes with a picture partial that will add responsive sourcesets to your images. In `resources/views/components/_figure.antlers.html` you can see an example of how to include the picture partial. It accepts the following arguments:

* `image`: *asset*, the actual image variable.
* `aspect_ratio`: *string*, Pass in an aspect ratio to crop the image in a certain way. `16/9` for example or specify a second ratio for larger screens: `1/1 large:1/2`.
* `class`: *string*, optional css classes that should be applied to the image.
* `cover`: *boolean*, true means the image should cover the containing element.
* `sizes`: *string*, the sizes attribute that informs the browser how the image should be rendered.
* `quality` *int* Set image quality. Defaults to 85.
* `bg` *string*, Sets a background color for transparent images.
* `blur` *integer*, Adds a blur effect to the image. Use values between 0 and 100.
* `brightness` *string*, Adjusts the image brightness. Use values between -100 and +100, where 0 represents no change.
* `contrast` *string*, Adjusts the image contrast. Use values between -100 and +100, where 0 represents no change.
* `filter` *string*, Applies a filter effect to the image. Accepts `greyscale` or `sepia`.
* `gamma` *float*, Adjusts the image gamma. Use values between 0.1 and 9.99.
* `sharpen` *integer*, Sharpen the image. Use values between 0 and 100.
* `pixelate` *integer*, Applies a pixelation effect to the image. Use values between 0 and 1000.

The following example renders a squared image on small screens and a 4/3 image on larger screens. It object-fills it's wrapping container and is lazy loaded:

```html
{{ partial:components/picture :image="image" aspect_ratio="1/1 large:4/3" cover="true" sizes="(min-width: 768px) 35vw, 90vw" lazy="true" }}
```

See [this article](https://studio1902.nl/blog/responsive-images-with-statamic-tailwind-and-glide/) for more information. Although it was written for Statamic V2, the concept of the partial remains the same for v3.

> Note: alternatively you could use the fantastic [Responsive Images Addon](https://github.com/spatie/statamic-responsive-images) by [Rias](https://github.com/riasvdv) from Spatie. It has few more features and uses Javascript to auto populate your `sizes` attribute.

### Asset presets
Peak doesn't use Asset Presets but generates images on the fly. This results in less storage being consumed and a faster CP experience when uploading assets. The downside is that the **first visit** after using new images will be slow as Statamic has to generate and cache all requested variants. When deploying you can bypass this by running `php please static:warm --queue`. That command will generate the static cache and generate all missing asset variants.

### Aspect cropping
You can specify cropping for small and large screens by providing the picture partial with an `aspect_ratio` argument. For example: `aspect_ratio="1/1 large:1/2"`.

When you're looping a collection you can also do more advanced stuff based on the collection entry fields. Let's say you have a `display` field for when you render images in a grid. This way you can get the correct crops based on how big the users wants an entry displayed.

```antlers
aspect_ratio="
	{ switch(
		(display == 'small') => '1/1',
		(display == 'wide') => '1/1 large:2/1',
		(display == 'tall') => '1/1 large:1/2',
		(display == 'large') => '1/1'
	)}
"
```
> Note: While it might seems like it makes sense to tie these crops to Tailwind breakpoint sizes (`md:`, `lg:` etc), the browser picks images not just based on screen width, but also on pixel density. Using those breakpoints implies that you can perfectly specify cropping per screen size, but this is not the case.

### Focal point and zoom
Whatever options you use to render the image on the frontend, wether it's aspect ratio cropping or background covering an html element, the picture partial will respect the focal point and zoom level set by the Control Panel user.
