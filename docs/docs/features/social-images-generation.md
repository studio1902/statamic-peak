# Social images generation

> You need to manually enable this feature.

Peak can generate your social sharing images (OG and Twitter) and add them to your entries. To use this feature you need to [install Browsershot](https://github.com/spatie/browsershot) and its dependencies. A big thanks to [Spatie](http://spatie.be) and [Puppeteer](https://github.com/puppeteer/puppeteer/)!

## Installation and configuration
On your development machine you can do this by running the following commands:

```bash
composer require spatie/browsershot
npm install puppeteer --global
```

Once you've installed the required software you can enable the functionality in the SEO globals -> Social Sharing. Make sure to flick on the switch and select each collection for which you want to enable auto generated social images.

Finally uncomment the Social Images Route in `routes/web.php`.

Edit `resources/views/social_images.antlers.html` to determine how the images should look. You can go wild with Antlers and Tailwind CSS and add any field you'd like to use. If you want to preview the images in your browser visit `http://yoursite.test/social-images/{id}`.

## Redis as queue driver
The actual generation of the images is a job, so it's queued when you use Redis. To enable Redis as a queue driver make sure it's installed on your server. When you use Ploi or Forge this is done automatically.

Enable Redis by setting `QUEUE_CONNECTION=redis` in your `.env` file. Make sure you start a queue worker in Ploi or Forge for your current site. Use `redis` as a connection and set the current `environment`.


## Generate the images
Once you've opted in the collections you want this available for you can select the entries you want to generate images for in the collection view.

| Global configuration | Generating the images |
|---|---|
| ![Forms backend](/visuals/screenshots/social-images-01.png) | ![Forms frontend](/visuals/screenshots/social-images-02.png) |


## Listable columns
Note that you could opt to toggle the `Social image` and `Twitter image` fields listable in the collections list view. That way you can or your client an easily scan collections for missing images.

| Listable columns |
|---|
| ![Listable columns](/visuals/screenshots/social-images-03.png) |

## Remove feature
By default the toggle to turn this feature on is only visibles to superusers. However if you completely want to remove this feature do the following:

* Delete the `toggle` and `collections` from `resources/blueprints/globals/seo.yaml`
* Delete the action `app/Actions/GenerateSocialImages.php`.
* Delete the job `app/Jobs/GenerateSocialImagesJob.php`.
* Delete the template `social_images.antlers.html`.
* Delete the route from `routes/web.php`.
