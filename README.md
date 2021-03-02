<p align="center">
  <img src="https://cdn.studio1902.nl/assets/statamic-peak/statamic-peak-logo.png?v=2" width="160" alt="Statamic Peak Logo" />
</p>
<h1 align="center">
  Statamic Starter Kit
</h1>

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)

Statamic Peak is an opinionated starter kit for all your Statamic sites. It's design agnostic but comes bundled with tools like Tailwind and AlpineJS and a workflow you can use to build anything you want. Peak features a page builder, a rich collection of starter templates, fieldsets, blueprints, SEO functionality, configuration and more to get you started on your clients' site straight away. Peak is easy to extend or edit to fit your clients' website needs. 

The aim of Peak is to make it easy to start new projects as they often share much of the same principles. Whether you're new to Statamic or a veteran, there will be something interesting in here for you. Please participate and discuss on how to make our websites better.

[Discuss Peak on Discord](https://discord.gg/sW7KXWaucH)
[Peak on Laravel News](https://laravel-news.com/statamic-peak)

### Getting started

* [Browser support](#browser-support)
* [Knowledge assumptions](#knowledge-assumptions)
* [Installation](#installation)
* [Tailwind and css config](#tailwind-css-config)

### Features

* [Assets](#assets)
* [Bard](#bard)
* [Buttons](#buttons)
* [Dark mode (off by default)](#dark-mode)
* [Favicons](#favicons)
* [Forms](#forms)
* [Globals](#globals)
* [Navigation](#navigation)
* [Page builder](#page-builder)
* [Pagination](#pagination)
* [Redirects](#redirects)
* [Search (off by default)](#search)
* [SEO](#seo)
* [Typography](#typography)

### Other

* [Configuration changes](#configuration-changes)
* [Deployment script](#deployment-script)
* [Focus-visible](#focus-visible)
* [Lighthouse](#lighthouse)
* [Modernizr](#modernizr)
* [Localization and template strings](#localization)
* [Reduced motion](#reduced-motion)
* [Toolbar](#toolbar)
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
* AlpineJS

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

**4. Compile the frontend assets** - the [TailwindCSS](https://tailwindcss.com/) compiled assets aren't included in this repo. You need to compile it yourself. Compilation is configured in `webpack.mix.js`. Make sure you add your hostname to your `.env` file (`APP_URL`) as it's being used for Browsersync in `webpack.mix.js`.
```bash
npm i && npm run watch (or npm run dev)
```
To compile for production run this (on your server). It will purge all unnecessary utility classes and greatly reduce file size:
```bash
npm run production
```

**5. Build!** - if you're using [Laravel Valet](https://laravel.com/docs/valet), your site should be available at `http://my-site.test`. You can access the control panel at `http://my-site.test/cp` and login with your new user. Build your site, read the [Statamic Docs](https://statamic.dev) and have fun!

### Install in existing Laravel project
[Job Verplanke](https://github.com/jobverplanke) is working on a package to install Peak into your current Laravel project. [The package](https://github.com/studio1902/statamic-peak-package) is currently in beta.

## Tailwind and CSS configuration
<span id="tailwind-css-config"></span>

Peak comes with a `tailwind.config.js` which dictates how Tailwind should be compiled. This file imports multiple Tailwind config files each responsible for various parts of your website. Next to the default config, it uses the following configuration files:

1. `tailwind.config.typography.js`: the Tailwind typography configuration for customizing the `prose` class.
2. `tailwind.config.peak.js`: all Peak's configuration, utilities and components.
3. `tailwind.config.site.js`: your site's configuration. This file would typically include all custom styles and config for the project you're currently working on.

All configuration files are fully documented. Read the Tailwind docs on [theme configuration](https://tailwindcss.com/docs/theme/) for more information.

Read up on the [Tailwind Forms](https://github.com/tailwindlabs/tailwindcss-forms) and [Tailwind Typography](https://github.com/tailwindlabs/tailwindcss-typography) plugins. They're easy to customize and the config file for typography already includes some basic customization so your theme colors are automatically applied. The plugins are easy to remove if you don't want to use them.

You can use a helper utility by adding the class `?` to quickly identify elements on screen. Original idea by [Gavin Joyce](https://github.com/GavinJoyce/tailwindcss-question-mark).

> Note: if you don't want to define your custom CSS in Tailwind JS config files you can add it to `resources/css/custom.css`. Make sure to read up on the use of [@layer](https://tailwindcss.com/docs/functions-and-directives#layer) to instruct PurgeCSS. Use whatever method you prefer.

# Features
## Assets
<span id="assets"></span>

### Images
Peak comes with a picture partial that will add responsive sourcesets to your images. The variants generated are defined in `config/statamic/assets.php` and cover most use cases. In `resources/views/components/_figure.antlers.html` you can see an example of how to include the picture partial. It accepts the following arguments:

* `image`: *asset*, the actual image variable.
* `class`: *string*, optional css classes that should be applied to the image.
* `cover`: *boolean*, true means the image should cover the containing element.
* `sizes`: *string*, the sizes attribute that informs the browser how the image should be rendered.

The following example renders an image and object-fills it's wrapping container: `{{ partial:components/picture :image="image" cover="true" class="w-full h-full" sizes="(min-width: 768px) 35vw, 90vw" }}`

See [this article](https://studio1902.nl/blog/responsive-images-with-statamic-tailwind-and-glide/) for more information.

> Note: alternatively you could use the fantastic [Responsive Images Addon](https://github.com/spatie/statamic-responsive-images) by [Rias](https://github.com/riasvdv) from Spatie. It features more asset presets and uses Javascript to auto populate your `sizes` attribute.

### Background images
Peak comes with a background image snippet you can use to apply responsive images (WebP included) to an elements background. Just use `{{ partial:snippets/background_image image="YOUR_IMAGE" class="CLASS_OF_ELEMENT_THAT_NEEDS_BG_IMAGE" }}`. The predefined sizes used in `resources/views/snippets/_background_image.antlers.html` are defined in `config/statamic/assets.php`.

## Bard
<span id="bard"></span>

For long form content you can use the `Article` content block. This is a [Bard fieldtype](https://statamic.dev/fieldtypes/bard#content) with multiple sets of fields that are regularly used in longer articles. 

### Adding sets
Edit `resources/fieldsets/article.yaml` to add sets (preferably imports) to the article. In `resources/views/page_builder/_article.antlers.html` you can see the sets being loaded. Antlers will look in the `resources/views/components/` folder for partials with the handle of your set. 

For example if you add a fieldset to the `article.yaml` with the handle `code` make sure you add a `_code.antlers.html` file to the `resources/views/components` folder.

> Note: sets are scoped under `set` to avoid collision with other fields. Make sure you reference variables in a block like this: `{{ set:field_name }}`

### Sizing utilities
An article goes into a CSS Grid with 12 columns. By default all sets get the class `size-md`. As you can see in `tailwind.config.js` on mobile this means those elements span 12 columns. On larger screens however they just span 6 columns (centered). There are other sizing utilities as well:

* *size-sm*: 12 columns on mobile, 4 columns from medium screens up
* *size-md*: 12 columns on mobile, 6 columns from medium screens up
* *size-lg*: 12 columns on mobile, 8 columns from medium screens up
* *size-xl*: 12 columns on mobile, 10 columns from medium screens up

For example use the sizing utilities to let an image break out of it's content. In sets like `figure` and `video` the user can pick their own size using the `size` field in `resources/fieldsets/common.yaml`. 

> Note: the layout doesn't have to be centered and is easy to change in the `tailwind.config.js` file.

| Bard sizing utilities | 
|---|
| [![Bard sizing utilities](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.15/bard.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.15/bard.png) |

## Buttons
<span id="buttons"></span>

The files `resources/fieldsets/buttons.yaml` and `resources/views/components/_buttons.antlers.html` go together. The button fieldset is a set in Bard but can also be called from other fieldsets where you want to include buttons. Just call the buttons partial in your template and one or multiple buttons will be rendered. 

| Buttons | 
|---|
| [![Buttons](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/button.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/button.png) |

## Dark mode (off by default)
<span id="dark-mode"></span>

In Tailwind you can enable [default dark mode](https://tailwindcss.com/docs/dark-mode) by uncommenting `darkMode: 'media',` in `tailwind.config.js`. This way your website will react to the users OS wide `prefers-color-scheme`.

If you want to use [class based dark mode](https://tailwindcss.com/docs/dark-mode#toggling-dark-mode-manually) you should do the following:

- Uncomment `darkMode: 'class'` in `tailwind.config.js`.
- Add `{{ partial:components/dark_mode_toggle }}` to the <head> in `resources/vies/layout.antlers.html`.
- Add `{{ yield:dark_mode_toggle }}` as the last list item in the main ul in `resources/views/navigation/_main.antlers.html`.

## Favicons
<span id="favicons"></span>

By uploading a single favicon SVG to the favicons asset container you can generate favicons for modern browsers on the fly. The favicon partial will spit out the following favicons:

* The SVG you uploaded as a `rel="icon"`.
* The SVG you uploaded with a custom color attribute as a `rel="mask-icon"`.
* A PNG with a custom colored background as a `rel="apple-touch-icon`.
* A `site.webmanifest` route with a manifest file containing a `android-chrome-512x512.png`.
* A meta with `name="theme-color"` with a custom color.

### Disable favicon feature
If you don't want to use this feature you can leave it disabled (default). To remove all traces, do the following:
* Remove `{{ partial:snippets/favicons }}` from `resources/views/layout.antlers.html`.
* Delete the asset container `content/assets/favicons.yaml`.
* Delete the blueprint `resources/blueprints/globals/favicons.yaml`.
* Delete the global `content/globals/favicons.yaml`.
* Delete the partial `resources/views/snippets/_favicons.antlers.html`.
* Delete the manifest view `resources/views/manifest/manifest.antlers.html`.
* Delete the listener `app/listeners/GenerateFavicons.php`.
* Remove manifest route from `routes/web.php`.
* Remove the listener from `app/providers/EventServiceProvider.php`.

> Note: To use the favicon feature you need to have the `PHP Imagick module` installed. Forge users: newer servers ship with this automatically. Ploi users: you can optionally install this with a click in the Ploi interface.

## Forms
<span id="forms"></span>

Peak renders forms and mail templates dynamically so you can add as many forms as you'd like, just by creating them in the CP. Peak ships with a default basic contact form you can edit using the following files:

* `resources/forms/contact.yaml` The contact form configuration.
* `resources/blueprints/forms/contact.yaml` The forms blueprint defining all the fields.
* `resources/views/page_builder/_form.antlers.html` The forms template file.
* `resources/views/email/form_owner.html` The forms email template that goes out to the site owner. The `_text.html` version contains the text template.
* `resources/views/email/form_sender.html` The forms email template that goes out to the sender of the form. The `_text.html` version contains the text template.

Strings used in the e-mail templates are localized and defined in `resources/lang/en/site.php`, and the form's field labels are localized and defined in `resources/lang/en.json`.

The default contact form has a required consent field. When you use `consent` as a field handle it won't render in the e-mail templates.

The forms sending is done with AJAX and uses Alpine to display the various notifications. 

> Note: Peak dynamically fetches a CSRF token so you can even use forms with [Static File Caching](https://statamic.dev/static-caching) on. This technique is based on the [Dynamic Token](https://statamic.com/addons/mykolas-mankevicius/dynamic-token) addon for Statamic v2 by Mykolas. It's ported to v3 and included with Peak.

> Note: When using BrowserSync and visit your site by means of an IP adress as url; You'll get an 500-error upon submitting the form. This is caused by Statamic's FormController which identifies your Site by means of the FQDN listed in `config/statamic/sites.php`. As you visit the website through an IP adress this lookup will fail, resulting in the said 500 `Call to a member function shortLocale() on null` error.

| Forms backend | Forms frontend  |
|---|---|
| [![Forms backend](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/forms-backend.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/forms-backend.png) | [![Forms frontend](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.15/forms-frontend.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.15/forms-frontend.png) |

## Globals
<span id="globals"></span>

Peak currently comes with two global sets you often need, one to edit content on error pages like the 404 page and one to add social media accounts to your website. There's already a basic 404 template in place (`resources/views/errors/404.antlers.html`) to display those messages. 

| Globals error messages  | Globals social media  |
|---|---|
| [![Globals error messages](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/globals.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/globals.png) | [![Globals social media](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/social-media.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/social-media.png) |

## Navigation
<span id="navigation"></span>

Peak includes basic unstyled responsive navigation with two levels. Open `resources/views/navigation/_main.antlers.html` to make changes. There's a desktop version that only shows on `md` screens and up as well as a mobile version that shows on smaller screens. AlpineJS takes care of the interactivity. The state of the mobile navigation toggle is defined on the `<body>` tag in `resources/views/layout.antlers.html`.

Peak also includes an optional breadcrumbs partial you can find in `resources/views/navigation/_breadcrumbs.antlers.html`. 

## Page builder
<span id="page-builder"></span>

While you could make different templates for all your page types, the idea is to make pages as modular as possible. Every unique element of your website could be a partial and a dedicated button in the page builder. 

If the layout of a page is totally different - or you really want to - you can always opt for using templates.

| Page builder | 
|---|
| [![Page builder](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/page-builder.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/page-builder.png) |

### Adding blocks
Edit `resources/fieldsets/page_builder.yaml` to add blocks (preferably imports) to the fieldset. In `resources/views/default.antlers.html` you can see the blocks being loaded. Antlers will look in the `resources/views/page_builder/` folder for partials with the handle of your block. Peak ships with the following blocks:

* Article ([`long form content`](#bard))
* Call to action (title, text and a button)
* Collection (title and links to other entries)
* [Forms](#forms)
* Link blocks (blocks with a title and text that link to other entries)

For example if you add a fieldset to the `page_builder.yaml` with the handle `call_to_action` make sure you add a `_call_to_action.antlers.html` file to the `resources/views/page_builder` folder.

> Note: blocks are scoped under `block` to avoid collision with other fields. Make sure you reference variables in a block like this: `{{ block:field_name }}`

## Pagination
<span id="pagination"></span>

When you're working with the collection tag and want to use [pagination](https://statamic.dev/tags/collection#pagination), just add the pagination partial using `partial:components/pagination` to automagically add pagination buttons. They're easily editable in  `resources/views/components/_pagination.antlers.html`. 

The pagination partial automatically adds linktags to your documents head with `rel="next"` and `rel="prev"`.

> Note: the strings used in the partial are translatable and can be edited in `resources/lang/en/site.php`.

## Redirects
<span id="redirects"></span>

There is Redirects global where you can define your 301 and 302 redirects. This only kicks in when a 404 error is triggered as all logic is being done in `resources/views/errors/404.antlers.html`.

> Note: by default only `superusers` and the `marketeer` role get access to this feature.

> Note: alternatively you could use the fantastic [Redirect](https://github.com/riasvdv/statamic-redirect) by [Rias](https://github.com/riasvdv). It's very feature rich and even tracks 404 errors you can easily setup redirects for those as well.

## Search (off by default)
<span id="search"></span>

Statamic comes with great search functionality out of the box. If you want to use this you have to do some configuration and templating work. Peak comes with basic search support you can easily customize to suit your needs. To enable default search do the following:

* Add `{{ partial:components/search_form }}` as the last list item in the main ul in `resources/views/navigation/_main.antlers.html`.
* Uncomment the search results route  in `routes/web.php`.
* Add fields you want indexed to the index in `config/statamic/search.php`. The `page_builder` field is added by default.
* Update the search index by running `php please search:update --all`.
* Make sure you add the update command to your [deployment script](#deployment-script).

> Note: the strings used in search form and result templates are translatable and can be edited in `resources/lang/en/site.php`.

> Note: alternatively you could use [Live Search](https://github.com/jonassiewertsen/statamic-live-search) by [Jonas Siewertsen](https://github.com/jonassiewertsen/statamic-live-search). It uses Laravel Livewire to get live search results as you type. It's very easy to implement.

## SEO
<span id="seo"></span>

Peak includes full SEO support. It's easy to expand on since it's all built with native fields and templating. You can also easily replace it with a professional addon like [Aardvark SEO](https://statamic.com/addons/candour/aardvark-seo) or [SEO Pro](https://statamic.com/addons/statamic/seo-pro). 

### SEO features
* Page title.
* Website title and seperator.
* Meta description.
* Canonical URL.
* Open Graph data and images.
* Default Open Graph image.
* Auto generated sitemap.xml.
* Customize the sitemap: which collections are included and per entry frequency and priority settings.
* No-index for entries, also excludes from sitemap.
* JSON-ld schema objects.
* Hreflang tags automatically generated.
* Knowledge graph data (organization, person or custom).
* JSON-ld breadcrumbs.
* Trackers: Google Analytics, Google Tag Manager, Site Verification, Fathom or Cloudflare Web Analytics.
* Cookie Consent Notification. Make sure you listen to `cookie_consent` to be `true` in GTM.

> Note: tracking and cookie consent by default only work on the `production` environment.

> Note: by default only `superusers` and the `marketeer` role get access to the SEO global configuration.

| Globals error messages  | Globals SEO  |  Globals Cookie Banner  |
|---|---|---|
| [![SEO globals JSON-ld](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/seo-globals-01.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/seo-globals-01.png) | [![SEO globals sitemap](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/seo-globals-02.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/seo-globals-02.png) | [![SEO globals cookie banner](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/seo-globals-03.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/seo-globals-03.png) |

| Entry specific SEO | 
|---|
| [![Page builder](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/entry-seo.png)](https://cdn.studio1902.nl/assets/statamic-peak/screenshots/v1.18.8/entry-seo.png) |

### Disable SEO features

If you plan on using an addon for SEO and Peak's built in features, do the following:
* Remove `{{ partial:snippets/seo }}` from `resources/views/layout.antlers.html`.
* Remove `{{ yield:seo_body }}` from `resources/views/layout.antlers.html`.
* Remove the SEO section and import from `resources/blueprints/collections/pages/page.yaml`.
* Remove the whole `{{ section:pagination }}{{ /section:pagination }}` from `resources/views/components/_pagination.antlers.html`.
* Delete the SEO global `content/globals/seo.yaml`.

And optionally to erase all traces:
* Delete the SEO sitemap view `resources/views/sitemap/sitemap.antlers.html`
* Delete the SEO global blueprint `resources/blueprints/globals/seo.yaml`.
* Delete the SEO fieldset `resources/fieldsets/seo.yaml`.
* Delete the SEO partial `resources/views/snippets/_seo.antlers.html`.
* Delete the Cookie Banner fieldset: `resources/views/components/_cookie_banner.antlers.html`.

## Typography
<span id="typography"></span>

Peak contains a few basic typography partials in `resources/views/typography`. Whenever you need to render text in your partial you could call the relevant partial or add a new one. Usually typography styles are shared, so this helps keeping your templates DRY. Let's say we have a block in our page builder with a `{{ title }}` field. In the template partial for your block you could do the following:

```html
{{ partial:typography/h1 :content="block:title" }}
```

This will render the title with the styling defined in `typography/h1`. This way you ensure the same styling throughout your website without having to add or edit Tailwinds utility classes in multiple template files. Exceptions are possible. You can change the tag, text color and add classes when you need to:

```html
{{ partial:typography/h1 tag="span" color="text-error-600" class="mb-8" :content="block:title" }}
```

Peak comes with a few defaults that are easy to style. Add as many partials your website needs.

# Other

## Configuration changes
<span id="configuration-changes"></span>

Peak changes the default Statamic config. The following is different:

| File | Default | Peak |
| --- | --- | --- |
| `.env.example` |  | Add more default Statamic and Redis settings by default.  
| `app/console/Kernel.php` |  | Add a schedule you can invoke via a cron to [warm all caches](#warm-all-caches).
| `app/Http/Controllers/DynamicToken.php` |  | New Controller for [forms](#forms) |
| `app/Http/Middleware/VerifyCsrfToken.php` | `protected $except = []` | `protected $except = ['/!/DynamicToken']` |
| `app/listeners/GenerateFavicons.php` |  | Listen to a GlobalSavedEvent to generate [favicons](#favicons).
| `app/providers/EventServiceProvider.php` |  | Listen to a GlobalSavedEvent to generate [favicons](#favicons).
| `app/Tags/DynamicToken.php` |  | New Tag for [forms](#forms) |
| `config/statamic/assets.php` | `driver' => 'gd'` | `'driver' => env('IMAGE_MANIPULATION_DRIVER', 'gd')` |
| `config/statamic/assets.php` | `'cache' => false` | `'cache' => env('SAVE_CACHED_IMAGES', true),` |
| `config/statamic/assets.php` | `'presets' => []` | Contains a whole bunch of asset presets. |
| `config/statamic/cp.php` | A getting started widget | A page collection widget |
| `config/statamic/cp.php` | `'link_to_docs' => true` | `'link_to_docs' => false` |
| `config/statamic/cp.php` | `'theme' => env('STATAMIC_THEME', 'rad')` | `'theme' => env('STATAMIC_THEME', 'business')` |
| `config/statamic/editions.php` | `'pro' -> false` | `'pro' -> true` |
| `config/statamic/git.php` |  | Add `[BOT]` to git commit message. |
| `config/statamic/live_preview.php` | Three breakpoints | All tailwinds breakpoints defined in `tailwind.config.js` |
| `config/statamic/search.php` | `title` in search index | `title`, and `page_builder` in search index |
| `config/statamic/stache.php` | `'watcher' => true` | `'watcher' => env('STATAMIC_STACHE_WATCHER', true)` |
| `config/statamic/static_caching.php` | `rules' => [ // ]` | `'rules' => 'all'` |
| `config/statamic/users.php` | `'avatars' => 'initials'` | `'avatars' => 'gravatar'` |
| `routes/console.php` |  | A `php artisan warm` command to [warm the static cache](#warm-all-caches). 
| `routes/web.php` |  | Routes for the [favicons](#favicons) feature.  
| `routes/web.php` |  | Routes for the search [functionality](#search). Commented by default.
| `routes/web.php` |  | Routes for the sitemap and [dynamic form](#forms) token.  


## Deployment script
 <span id="deployment-script"></span>
 You can use the following deployment script together with Peak to make sure everything runs smoothly after a deploy.

 ```bash
 php artisan cache:clear # Clear the Laravel application cache.
 php artisan config:cache # Clear and refresh the Laravel config cache.
 php artisan route:cache # Clear and refresh the Laravel route cache.
 php artisan statamic:stache:warm # Warm the Statamic stache.
 php please search:update --all # Update the search index.
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

## Localization and template strings
<span id="localization"></span>

All strings in templates use the `{{ trans:strings_file.string_id }}` pattern to call the `{{ trans }}` tag and get the correct translation for the current site. Learn more in the [Statamic docs on the translate tag](https://statamic.dev/tags/trans#content).

It is currently not possible in Statamic to translate field labels and descriptions so I settled for English. Translate the labels and descriptions in all fieldsets (`resources/fieldsets/*.yaml`) and follow the [the instructions in the Statamic documentation](https://statamic.dev/cp-translations#content) to make the Statamic CP available in your language of choice.

## Reduced motion
<span id="reduced-motion"></span>

The default anchor styles configured in `tailwind.config.site.js` respects users that prefer less motion. Other transition utilities used in Peaks' templates are prefixed with the `motion-safe:` variant by default. Motion-safe variants are enabled for all animation and transition utilities. You can disable this in `tailwind.config.js`. Read more on [how motion safe works](https://tailwindcss.com/docs/hover-focus-and-other-states#motion-safe).

## Toolbar
<span id="toolbar"></span>

Peak adds a hidden toolbar to the top right corner of your screen. It becomes visible when you hover it and it displays the current Tailwind breakpoint (when your env is `local`). It also has an edit button when you're logged in. The toolbar can be permantly fixed to your window by toggling the button.

## Upcoming features
<span id="upcoming-features"></span>

Check the [issues](https://github.com/studio1902/statamic-peak/issues?q=is%3Aissue+is%3Aopen+is%3Aenhancement) and [pull requests](https://github.com/studio1902/statamic-peak/pulls) for upcoming features.

## Warm all caches
<span id="warm-all-caches"></span>
Running `php artisan warm` after your deployments will visit all urls and warm up the static cache. This is a custom command and is defined in `routes/console.php`. 

Triggering `php artisan schedule:run` with a cronjob on a server will daily clear and warm all caches. It basically chains all commands defined in the [deployment-script](#deployment-script). Edit `app/console/Kernel.php` if you don't want this daily but for example hourly. [Read more in the Laravel Docs](https://laravel.com/docs/master/scheduling).

# Contributing and license

## Contributing
<span id="contributing"></span>

Contributions and discussions are always welcome, no matter how large or small. Treat each other with respect. Read the [Code of Conduct](CODE_OF_CONDUCT.md).

## License
<span id="license"></span>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information. Statamic itself is commercial software and has its' own license.
