# Release Notes

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
