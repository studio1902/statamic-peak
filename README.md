<p align="center">
  <img src="https://cdn.studio1902.nl/assets/statamic-peak/statamic-peak-logo.png?v=2" width="160" alt="Statamic Peak Logo" />
</p>
<h1 align="center">
  Statamic Starter Kit
</h1>

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)

Statamic Peak is an opinionated starter kit for all your Statamic sites. It's design agnostic but comes bundled with tools like Tailwind and AlpineJS and a workflow you can use to build anything you want. Peak features a page builder, a rich collection of starter templates, fieldsets, blueprints, configuration and more to get you started on your clients' site straight away. Peak is easy to extend or edit to fit your clients' website needs. 

The aim of Peak is to make it easy to start new projects as they often share much of the same principles. Whether you're new to Statamic or a veteran, there will be something interesting in here for you. Feel free to participate and discuss on how to make Peak better.

### Getting started

* [Browser support](#browser-support)
* [Knowledge assumptions](#knowledge-assumptions)
* [Installation](#installation)
* [Tailwind config](#tailwind-config)

### Features

* [Assets](#assets)
* [Bard](#bard)
* [Buttons](#buttons)
* [Forms](#forms)
* [Globals](#globals)
* [Navigation](#navigation)
* [Page builder](#page-builder)
* [Pagination](#pagination)
* [SEO](#seo)
* [Statamic login screen](#statamic-login-screen)
* [Typography](#typography)

### Other

* [Configuration changes](#configuration-changes)
* [Deployment script](#deployment-script)
* [Focus-visible](#focus-visible)
* [Lighthouse](#lighthouse)
* [Modernizr](#modernizr)
* [Multilingual fields and localization](#multilingual-fields)
* [Reduced motion](#reduced-motion)
* [Upcoming features](#upcoming-features)
* [Warm all caches](#warm-all-caches)

### Contibuting and license

* [Contributing](#contributing)
* [License](#license)

# Getting started

## Browser support
<span id="browser-support"></span>
Peak makes extensive use of CSS Grid so it doesn't support IE11. 

## Knowledge assumptions
<span id="knowledge-assumptions"></span>

Before using Peak make sure you're familiar with:

* Statamic 
* Antlers
* TailwindCSS
* *And to lesser extend:* AlpineJS (JS framework)

## Installation
<span id="installation"></span>

### Installation via the CLI
The easiest way to install Statamic together with Peak is to use the [official CLI](https://github.com/statamic/cli). Install the CLI by running `composer global require statamic/cli` and for each project just run `statamic new my-site` and pick Peak as a starter kit. Alternatively you can skip this manual selection by running: `statamic new my-site --starter="studio1902/statamic-peak"`.

### Manual installation.

**1. Create a new site** - cloning the repo and removing the origin repo.
```bash
git clone git@github.com:studio1902/statamic-peak.git my-site
cd my-site
rm -rf .git
composer install
cp .env.example .env && php artisan key:generate
```

**2. Edit .env file** - make sure you edited the `.env` file with at least the correct values for `APP_NAME`, `APP_URL` and the local mail configuration. 

**3. Make a new user** – you'll want it to be a `super` so you have access to everything.
```bash
php please make:user
```

**4. Compile the fontend assets** - the [TailwindCSS](https://tailwindcss.com/) compiled assets aren't included in this repo. You need to compile it yourself. Compilation is configured in `webpack.mix.js`. Make sure you add your hostname to your `.env` file (`APP_URL`) as it's being used for Browsersync in `webpack.mix.js`.
```bash
npm i && npm run watch (or npm run dev)
```
To compile for production run this (on your server). It will purge all unnecessary utility classes and greatly reduce file size:
```bash
npm run production
```

**5. Build!** - if you're using [Laravel Valet](https://laravel.com/docs/valet), your site should be available at `http://my-site.test`. You can access the control panel at `http://my-site.test/cp` and login with your new user. Build your site, read the [Statamic Docs](https://statamic.dev) and have fun!

## Tailwind configuration
<span id="tailwind-config"></span>

Peak comes with a `tailwind.config.js` which dictates how Tailwind should be compiled. This file imports multiple Tailwind config files each responsible for various parts of your website. Next to the default config, it uses the following configuration files:

1. `tailwind.config.typography.js`: the Tailwind typography configuration for customizing the `prose` class.
2. `tailwind.config.peak.js`: all Peak's configuration, utilities and components.
3. `tailwind.config.site.js`: your site's configuration. This file would typically include all custom styles and config for the project you're currently working on.

All configuration files are fully documented. Read the Tailwind docs on [theme configuration](https://tailwindcss.com/docs/theme/) for more information.

Read up on the [Tailwind Forms](https://github.com/tailwindlabs/tailwindcss-forms) and [Tailwind Typography](https://github.com/tailwindlabs/tailwindcss-typography) plugins. They're easy to customize and the config file for typography already include some basic customization. The plugins are easy to remove if you don't plan on using them.

When your app environment is `local`, Peak will add a breakpoint notice to your site so you can tell on which breakpoint you're currently displaying the website. You can turn this off by removing `{{ environment == 'local' ? 'debug' : '' }}` from `resources/views/layout.antlers.html`.

You can use a helper utility by adding the class `?` to quickly identify elements on screen. Original idea by [Gavin Joyce](https://github.com/GavinJoyce/tailwindcss-question-mark).

# Features

## Assets
<span id="assets"></span>

### Images
Peak comes a picture partial that will add responsive sourcesets to your images. The variants generated are defined in `config/statamic/assets.php` and cover most use cases. In `resources/views/components/_figure.antlers.html` you can see an example of how to include the picture partial. It accepts the following arguments:

* `image`: *asset*, the actual image variable.
* `class`: *string*, optional css classes that should be applied to the image.
* `cover`: *boolean*, true means the image should cover the containing element.
* `sizes`: *string*, the sizes attribute that informs the browser how the image should be rendered.

The following example renders an image and object-fills it's wrapping container: `{{ partial:components/picture :image="image" cover="true" class="w-full h-full" sizes="(min-width: 768px) 35vw, 90vw" }}`

See [this article](https://studio1902.nl/blog/responsive-images-with-statamic-tailwind-and-glide/) for more information.

### Background images
Peak comes with a background image snippet you can use to apply responsive images (WebP included) to an elements background. Just use `{{ partial:snippets/background_image image="YOUR_IMAGE" class="CLASS_OF_ELEMENT_THAT_NEEDS_BG_IMAGE" }}`. The predefined sizes used in `resources/views/snippets/_background_image.antlers.html` are defined in `config/statamic/assets.php`.

## Bard
<span id="bard"></span>

For long form content you can use the `Article` content block. This is a [Bard fieldtype](https://statamic.dev/fieldtypes/bard#content) with multiple sets of fields that are regularly used in longer articles. 

### Adding sets
Edit `resources/fieldsets/article.yaml` to add sets (preferably imports) to the article. In `resources/views/page_builder/_article.antlers.html` you can see the sets being loaded. Antlers will look in the `resources/views/components/` folder for partials with the handle of your set. 

For example if you add a fieldset to the `article.yaml` with the handle `table` make sure you add a `_table.antlers.html` file to the `resources/views/components` folder.

> Note: sets are scoped under `set` to avoid collision with other fields. Make sure you reference variables in a block like this: `{{ set:field_name }}`

### Sizing utilities
An article goes into a CSS Grid with 12 columns. By default all sets get the class `size-md`. As you can see in `tailwind.config.js` on mobile this means those elements span 12 columns. On larger screens however they just span 6 columns (centered). There are other sizing utilities as well:

* *size-sm*: 12 columns on mobile, 4 columns from medium screens up
* *size-md*: 12 columns on mobile, 6 columns from medium screens up
* *size-lg*: 12 columns on mobile, 8 columns from medium screens up
* *size-xl*: 12 columns on mobile, 10 columns from medium screens up

For example use the sizing utilities to let an image break out of it's content. In sets like `figure` and `video` the user can pick their own size using the `size` field in `resources/fieldsets/common.yaml`. 

> Note: the layout doesn't have to be centered and is easy to change in the `tailwind.config.js` file.

[Screenshot Bard Sets](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-bard-01.png) | [Screenshot Bard Figure & Buttons](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-bard-02.png)


## Buttons
<span id="buttons"></span>

The files `resources/fieldsets/buttons.yaml` and `resources/views/components/_buttons.antlers.html` go together. The button fieldset is a set in Bard but can also be called from other fieldsets where you want to include buttons. Just call the buttons partial in your template and one or multiple buttons will be rendered. 

[Screenshot Bard Figure & Buttons](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-bard-02.png)

## Forms
<span id="forms"></span>

Peak renders forms and mail templates dynamically so you can add as many forms as you'd like, just by creating them in the CP. Peak ships with a default basic contact form you can edit using the following files:

* `resources/forms/contact.yaml` The contact form configuration.
* `resources/blueprints/forms/contact.yaml` The forms blueprint defining all the fields.
* `resources/views/page_builder/_form.antlers.html` The forms template file.
* `resources/views/email/form_owner.html` The forms email template that goes out to the site owner. The `_text.html` version contains the text template.
* `resources/views/email/form_sender.html` The forms email template that goes out to the sender of the form. The `_text.html` version contains the text template.

Strings used in the e-mail templates are localized and defined in `resources/lang/en/site.php`, and the form's field labels are localized and defined in `resources/lang/en.json`.

The forms sending is done with AJAX and uses Alpine to display the various notifications. 

> Note: Peak dynamically fetches a CSRF token so you can even use forms with [Static File Caching](https://statamic.dev/static-caching) on. This technique is based on the [Dynamic Token](https://statamic.com/addons/mykolas-mankevicius/dynamic-token) addon for Statamic v2 by Mykolas. It's ported to v3 and included with Peak.

> Note: When using BrowserSync and visit your site by means of an IP adress as url; You'll get an 500-error upon submitting the form. This is caused by Statamic's FormController which identifies your Site by means of the FQDN listed in `config/statamic/sites.php`. As you visit the website through an IP adress this lookup will fail, resulting in the said 500 `Call to a member function shortLocale() on null` error.

[Screenshot Form Page Builder](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-form-01.png) | [Screenshot Form error handling](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-form-02.png) | [Screenshot Form mail to owner](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-form-03.png) | [Screenshot Form mail to sender](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-form-04.png)

## Globals
<span id="globals"></span>

Peak currently comes with two global sets you often need, one to edit content on error pages like the 404 page and one to add social media accounts to your website. There's already a basic 404 template in place (`resources/views/errors/404.antlers.html`) to display those messages. 

[Screenshot Globals Errors](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-globals-01.png) | [Screenshot Globals Social Media](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-globals-02.png)

## Navigation
<span id="navigation"></span>

Peak includes basic unstyled responsive navigation with two levels. Open `resources/views/navigation/_main.antlers.html` to make changes. There's a desktop version that only shows on `md` screens and up as well as a mobile version that shows on smaller screens. AlpineJS takes care of the interactivity. The state of the mobile navigation toggle is defined on the `<body>` tag in `resources/views/layout.antlers.html`.

Peak also includes an optional breadcrumbs partial you can find in `resources/views/navigation/_breadcrumbs.antlers.html`. 

## Page builder
<span id="page-builder"></span>

While you could make different templates for all your page types, the idea is to make pages as modular as possible. Every unique element of your website could be a partial and a dedicated button in the page builder. 

If the layout of a page is totally different - or you really want to - you can always opt for using templates.

[Screenshot page builder](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-builder-01.png)

### Adding blocks
Edit `resources/fieldsets/page_builder.yaml` to add blocks (preferably imports) to the fieldset. In `resources/views/default.antlers.html` you can see the blocks being loaded. Antlers will look in the `resources/views/page_builder/` folder for partials with the handle of your block. Peak ships with the following blocks:

* Article ([`long form content`](#bard))
* Call to action (title, text and a button)
* Collection (title and links to other entries)
* [Forms](#forms)
* Link blocks (blocks with a title and text that link to other entries)

For example if you add a fieldset to the `page_builder.yaml` with the handle `call_to_action` make sure you add a `_call_to_action.antlers.html` file to the `resources/views/page_builder` folder.

> Note: blocks are scoped under `block` to avoid collision with other fields. Make sure you reference variables in a block like this: `{{ block:field_name }}`

[Screenshot link blocks](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-link-blocks-01.png) | [Screenshot link blocks](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-link-blocks-02.png)

## Pagination
<span id="pagination"></span>

When you're working with the collection tag and want to use [pagination](https://statamic.dev/tags/collection#pagination), just add the pagination partial using `partial:components/pagination` to automagically add pagination buttons. They're easily editable in  `resources/views/components/_pagination.antlers.html`. 

The pagination partial automatically adds linktags to your documents head with `rel="next"` and `rel="prev"`.

> Note: the strings used in the partial are translatable and can be edited in `resources/lang/en/site.php`.

## SEO
<span id="seo"></span>

Peak includes full SEO support. It's easy to expand on since it's all built with native fields and templating. You can also easily replace it with a professional addon like [Aardvark SEO](https://statamic.com/addons/candour/aardvark-seo) or [SEO Pro](https://statamic.com/addons/statamic/seo-pro). 

### SEO features
* Edit the title.
* Edit the website title and separator.
* Edit the meta description.
* Add a canonical URL.
* Add Open Graph data and image.
* Add a default Open Graph image.
* Auto generated sitemap.xml, customize which collections are included and per entry frequency and priority settings.
* Turn on no-index for an entry, also have it excluded in the sitemap.
* Add custom JSON-ld schema objects.
* Auto generated hreflang tags on localized sites.
* Add knowledge graph data (organization, person or custom).
* Auto generated optional JSON-ld breadcrumbs.
* Add trackers: Google Analytics, Google Tag Manager, Site Verification or Fathom.

[Screenshot global](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-seo-01.png) | [Screenshot per entry](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-seo-02.png) | [Screenshot per entry](https://studio1902.ams3.cdn.digitaloceanspaces.com/assets/statamic-peak/screenshots/peak-seo-03.png)

### Disable SEO features

If you plan on using an addon for SEO and Peak's built in features, do the following:
* Remove `{{ partial:snippets/seo }}` from `resources/views/layout.antlers.html`.
* Remove `{{ yield:google_tag_manager }}` from `resources/views/layout.antlers.html`.
* Remove the SEO section and import from `resources/blueprints/collections/pages/page.yaml`.
* Remove the whole `{{ section:pagination }}{{ /section:pagination }}` from `resources/views/components/_pagination.antlers.html`.
* Delete the SEO global `content/globals/seo.yaml`.

And optionally to erase all traces:
* Delete the SEO sitemap view `resources/views/sitemap/sitemap.antlers.html`
* Delete the SEO global blueprint `resources/blueprints/globals/seo.yaml`.
* Delete the SEO fieldset `resources/fieldsets/seo.yaml`.
* Delete the SEO partial `resources/views/snippets/_seo.antlers.html`.


## Statamic login screen
<span id="statamic-login-screen"></span>

The *Rad Mode&trade;* on the login screen is disabled by default to give the login screen a less fun, but more businessy look. If you want to re-enable Rad Mode, delete `resources/views/vendor/statamic/auth/login.blade.php`.

If you want to use another logo on the login screen. For example the current sites logo, uncomment the code in `/public/vendor/app/css/cp.css` and point to an image file of choice.

## Typography
<span id="typography"></span>

Peak contains a few basic typography partials in `resources/views/typography`. Whenever you need to render text in your partial you should call the relevant partial or add a new one. Let's say we have a block in our page builder with a `{{ title }}` field. In the template partial for your block you could do the following:

```html
{{ partial:typography/h1 :content="block:title" }}
```

This will render the title with the styling defined in `typography/h1`. This way you ensure the same styling throughout your website without having to add or edit Tailwinds utility classes in multiple template files. You can even change the tag and text color and add classes if need be:

```html
{{ partial:typography/h1 tag="span" color="text-error-600" class="mb-8" :content="block:title" }}
```

Peak comes with a few defaults that are easy to style. Feel free to add more partials for your current website.

# Other

## Configuration changes
<span id="configuration-changes"></span>

Peak changes the default Statamic config. The following is different:

| File | Default | Peak |
| --- | --- | --- |
| `.env.example` |  | Add more default Statamic and Redis settings by default.  
| `app/console/Kernel.php` |  | Add a schedule you can invoke via a cron to [warm all caches](#warm-all-caches).
| `app/Http/Controllers/DynamicToken.php` | - | New Controller for [forms](#forms) |
| `app/Http/Middleware/VerifyCsrfToken.php` | `protected $except = []` | `protected $except = ['/!/DynamicToken']` |
| `app/Tags/DynamicToken.php` | - | New Tag for [forms](#forms) |
| `config/statamic/assets.php` | `'cache' => false` | `'cache' => env('SAVE_CACHED_IMAGES', true),` |
| `config/statamic/assets.php` | `'presets' => [],` | Contains a whole bunch of asset presets. |
| `config/statamic/cp.php` | A getting started widget | A page collection widget |
| `config/statamic/cp.php` | `'link_to_docs' => true` | `'link_to_docs' => false` |
| `config/statamic/editions.php` | `'pro' -> false` | `'pro' -> true` |
| `config/statamic/git.php` |  | Add `[BOT]` to git commit message. |
| `config/statamic/live_preview.php` | Three breakpoints | All tailwinds breakpoints defined in `tailwind.config.js` |
| `config/statamic/stache.php` | `'watcher' => true` | `'watcher' => env('STATAMIC_STACHE_WATCHER', true)` |
| `config/statamic/static_caching.php` | `rules' => [ // ]` | `'rules' => 'all'` |
| `config/statamic/users.php` | `'avatars' => 'initials'` | `'avatars' => 'gravatar'` |
| `routes/console.php` |  | A `php artisan warm` command to [warm the static cache](#warm-all-caches). 
| `routes/web.php` |  | Routes for the sitemap and [dynamic form](#forms) token. 

## Deployment script
 <span id="deployment-script"></span>
 You could use the following deployment script together with Peak to make sure everything runs smoothly after a deploy.

 ```bash
 php artisan cache:clear # Clear the Laravel application cache.
 php artisan config:cache # Clear and refresh the Laravel config cache.
 php artisan statamic:stache:warm # Warm the Statamic stache.
 php artisan statamic:static:clear # Clear the Statamic static cache (if you use this).
 php artisan warm # Warm the Statamic static cache (if you use this / only available in Peak).
 php artisan statamic:assets:generate-presets # Generate all asset presets.
 ```

## Focus-visible
<span id="focus-visible"></span>

Focus-visible solves a lot of issues regarding a11y and styling. To use focus-visible today we need polyfills (for Safari). One in [Javascript](https://github.com/WICG/focus-visible) and one in [PostCSS](https://github.com/csstools/postcss-focus-visible). With focus-visible we can make sure the browser only shows an outline when the user navigates with a keyboard. This means no more outlines in Chrome when you click styled buttons. 

You can take this even further by using the [Tailwind Ring utilties](https://tailwindcss.com/docs/ring-width) together with the `focus-visible:` variant to customize and brand your focus styles. Peak has the `focus-visible:` variant enabled by default for the `ringWidth` utility. You can disable this in `tailwind.config.js`.

## Lighthouse
<span id="lighthouse"></span>

A performant website is extremely important for a11y and search engine ranking. Using Peak's best practices regarding caching, responsive images, ARIA use and SEO it's not hard to optimize your site for a perfect Lighthouse score.

## Modernizr
<span id="modernizr"></span>

Peak comes with Modernizr support. By default the only feature detect that's added is WebP. It will add a `webp` class or a `no-webp` class to the `<html>` tag. If you want to add more feature detects you can edit `modernizr.config.js`.

## Multilingual fields and localization
<span id="multilingual-fields"></span>

It is currently not possible in Statamic to translate field labels and descriptions so I settled for English. Translate the labels and descriptions in all fieldsets (`resources/fieldsets/*.yaml`) and follow the [the instructions in the Statamic documentation](https://statamic.dev/cp-translations#content) to make the Statamic CP available in your language of choice.

## Reduced motion
<span id="reduced-motion"></span>

The default anchor styles configured in `tailwind.config.site.js` respects users that prefer less motion. Other transition utilities used in Peaks' templates are prefixed with the `motion-safe:` variant by default. Motion-safe variants are enabled for all animation and transition utilities. You can disable this in `tailwind.config.js`. Read more on [how motion safe works](https://tailwindcss.com/docs/hover-focus-and-other-states#motion-safe).

## Upcoming features
<span id="upcoming-features"></span>

Check the [issues](https://github.com/studio1902/statamic-peak/issues?q=is%3Aissue+is%3Aopen+is%3Aenhancement) and [pull requests](https://github.com/studio1902/statamic-peak/pulls) for upcoming features.

## Warm all caches
<span id="warm-all-caches"></span>
Running `php artisan warm` after your deployments will visit all urls and warm up the static cache. This is a custom command and is defined in `routes/console.php`. 

Triggering `php artisan schedule:run` with a cronjob on a server will hourly clear and warm all caches. It basically chains all commands defined in the [deployment-script](#deployment-script). Edit `app/console/Kernel.php` if you don't want this hourly but for example daily. [Read more in the Laravel Docs](https://laravel.com/docs/master/scheduling).

# Contributing and license

## Contributing
<span id="contributing"></span>

Contributions and discussions are always welcome, no matter how large or small. Treat each other with respect. Read the [Code of Conduct](CODE_OF_CONDUCT.md).

## License
<span id="license"></span>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. Statamic itself is commercial software and has its' own license.
