# Release Notes

## 1.18.12 (2021-01-21)

### What's improved
- Use Tailwind layers to instruct PurgeCSS in `tailwind.config.js` and `resources/css/custom.css`. Thanks for the tip Tom.

## 1.18.11 (2021-01-20)

### What's improved
- Ignore errors in the `php artisan warm` command in `routes/console.php`.
- Remove `php artisan inspire` from `routes/console.php`.
- Add note in `README.example.md` for Ploi users.

## 1.18.10 (2021-01-19)

### What's improved
- Actually commit the `1.18.9` changes regarding site locale. Sorry!
- Remove unused `scrollMarginTop` declaration from `tailwind.config.typography.js`.

## 1.18.9 (2021-01-19)

### What's improved
- Use the proper locale variable `site:locale` for localizing form e-mails. The previous variable `locale` returns `default` for the default site and that could cause issues translating your e-mails. Thanks [Jason](https://github.com/jasonvarga).
- The [README.md](https://github.com/studio1902/statamic-peak/blob/main/README.md) now has inline and updated screenshots.

## 1.18.8 (2021-01-17)

### What's new
- Revoke all cookie consent given before a certain date so users have to consent again. Handy when your privacy policy changed. 
- Add a field called `button_type` to buttons. It has two options by default: `inline` and `button`. The template `views/components/_button.antlers.html` defaults to `button`. 

### What's improved
- Translatable labels using the `{{ trans key="{ label }" }}` pattern for checkboxes, radio's and selects. 
- Updated JS dependencies.

## 1.18.7 (2021-01-15)

### What's improved
- Damned trailing comma's! [#65](https://github.com/studio1902/statamic-peak/pull/65) Thanks [Vannut](https://github.com/vannut).
- Persons and organizations deserve their own URL. [#65](https://github.com/studio1902/statamic-peak/pull/65) Thanks [Vannut](https://github.com/vannut).

## 1.18.6 (2021-01-14)

### What's improved
- Use the right OG image dimensions. Thanks [#64](https://github.com/studio1902/statamic-peak/pull/64) [Vannut](https://github.com/vannut).

## 1.18.5 (2021-01-11)

### What's new
- Added `resources/css/custom.css` if you prefer defining your custom CSS in actual CSS.

### What's improved
- Consistent use of template string in `tailwind.config.peak.js`.

## 1.18.4 (2021-01-08)

### What's improved
- The page builder replicator is now localizable by default. Thanks [Manuel](https://github.com/mnlmaier).
- Update DynamicToken route to be compatible with Laravel 8. Thanks [Duncan](https://github.com/damcclean).

## 1.18.3 (2021-01-08)

### What's improved
- Update `tailwind.config.js` proper key for `darkMode`, remove `future` and `expiremental` keys. Thanks [Vlad](https://github.com/vladdu).

## 1.18.2 (2021-01-07)

### What's improved
- Fix CSS selector and value so the negative margin bottom actually works on last childs with a class of `w-full` in the `outer-grid`. Thank you [Manuel](https://github.com/mnlmaier).

## 1.18.1 (2021-01-06)

### What's improved
- Prevent cookie banner from showing when GTM is off.
- Style.

## 1.18.0 (2021-01-05)

### What's new
- Search functionality. Disabled by default. See the readme for more details on how to [enable and extend search](https://github.com/studio1902/statamic-peak#search). 

### What's improved
- Updated and added (missing) inline documentation.

## 1.17.1 (2021-01-05)

### What's improved
- You can now either link to an asset (PDF) or entry from the cookie banner regarding more information about your privacy policy.

## 1.17.0 (2021-01-05)

### What's new
- **Breaking**: Added an optional cookie notification banner. This changes some SEO field handles and the SEO yield name. If you're updating manually make sure you:
    1. overwrite `resources/blueprints/seo.yaml`
    2. overwrite `resources/views/snippets/_seo.antlers.html`
    3. merge `resources/lang/en/strings.php`
    4. merge `resources/js/site.js`
    5. rename `yield:google_tag_manager` to `yield:seo_body` in `resources/views/layout.antlers.html`
    6. add `resources/components/_cookie_banner.antlers.html`

> Note: tracking and cookie consent by default only work on the `production` environment.

## 1.16.0 (2020-12-29)

### What's improved
- Upgrade to Laravel Mix 6.

### What's gone
- Modernzr integration for WebP detection (previously used in the background image snippet).

## 1.15.4 (2020-12-28)

### What's improved
- Include `package-lock.json` for now to prevent compilation errors. Compatibility for Laravel Mix 6 is in the works but the `laravel-mix-modernizr` plugin isn't compatible yet. Keep an eye out on: https://github.com/studio1902/statamic-peak/tree/feature/laravel-mix-6

## 1.15.3 (2020-12-20)

### What's new
- Updated `README.example.md` with NGINX config for static resource caching.
- Updated composer.json to support PHP8.

## 1.15.2 (2020-12-15)

### What's improved
- Return of the `last` variant for `margin` as this is used in `resources/views/typography/_paragraph.antlers.html`.

## 1.15.1 (2020-12-13)

### What's improved
- Don't purge `.js-focus-visible` otherwise focus-visible won't work on production.
- Don't overwrite default transition duration but extend it.
- Change default transition length to 300ms.
- Add `motion-safe` variant for `transitionDuration`.

## 1.15.0 (2020-12-10)

### What's new
- Use and implement `focus-visible` Polyfill: https://github.com/studio1902/statamic-peak#focus-visible 
- Use and implement the `motion-safe` variant: https://github.com/studio1902/statamic-peak#reduced-motion
- Add Cloudflare Web Analytics Tracker. Thanks Vaggelis!

### What's improved
- Remove deprecated `scrolling-touch` utility from `resources/views/navigation/_main.antlers.html`.

## 1.14.3 (2020-12-03)

### What's improved
- Fixed a bug in the Tailwind config that prevented the VS Code Intellisense plugin from working. 

## 1.14.2 (2020-12-03)

### What's improved
- Use `config:app:name` for the logo aria-label.
- Tpyo's removed from the README. Thanks Jelle!
- Updated the example README with a space for both the production and the development env vars.

## 1.14.1 (2020-12-01)

### What's new
- Added a helper utility by adding the class `?` to quickly identify elements on screen. Original idea by [Gavin Joyce](https://github.com/GavinJoyce/tailwindcss-question-mark).
- Added the `php artisan statamic:assets:generate-preset` to the deploy script part of the README.example.md.

### What's improved
- Link to the new Tailwind Typography repo in the inline docs.

## 1.14.0 (2020-11-20)

### What's new
- A Table set for Bard.
- A new and bigger asset preset.

### What's improved
- Hide contact form success message after 2500secs. Thanks Frederik!
- Don't let the site be indexed when not in production. Thanks Frederik!
- Improve default form styling.
- Fix Tailwind prose classes not compiling. 
- Only apply prose class to `resources/views/components/_text.antlers.html` so bard sets don't inherit prose styles.
- Update bard sets styling with margin y. 

## 1.13.0 (2020-11-19)

### What's new
- Upgraded to Tailwind 2.
- Applied the Tailwind 2 migration guide.
- Now importing Tailwind color sets.
- Extend variants instead of overwriting them.
- Use default transition duration and easing.

### What's improved
- The common asset fieldset now uses list mode to render assets in the CP.

## 1.12.1 (2020-11-16)

### What's improved
- Don't init an alpine component on the body for the mobile navigation logic. Move it to where it's actually being used (thanks @philipboomy).

## 1.12.0 (2020-11-14)

### What's improved
- [Breaking] Ditch the old and use the new Tailwind form plugin. No more specificity and config, just use utility classes in your partials: https://github.com/tailwindlabs/tailwindcss-forms

## 1.11.0 (2020-11-13)

### What's improved
- [Breaking] Use Tailwind's aspect ratio plugin for media embeds: https://github.com/tailwindlabs/tailwindcss-aspect-ratio
- [Breaking] Remove Peak's custom breakpoint.
- [Breaking] Add config to use Tailwinds new experimental breakpoint: https://github.com/tailwindlabs/tailwindcss/pull/2468/files

## 1.10.0 (2020-11-2)

### What's new
- Completely reworked buttons to support internal linking, external linking, linking to phone numbers, e-mail addresses and downloadable assets. The button fieldset uses the just fixed conditional logic in available in Statamic.

### What's improved
- Default to position center for background images which saves us a conditional check (thanks @philipboomy).
- Remove localization workaround in mail templates that's not needed anymore since Statamic 3.0.18.
- Actually use the alt attribute in mail templates.
- Collapse page builder replicator sets by default.

## 1.9.2 (2020-10-26)

### What's improved
- Only output SEO tracker code on production environment.
