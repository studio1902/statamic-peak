# Release Notes

## v3.44.0 (2021-12-21)

### What's improved
- Improve footer layout on desktop and transition the social icon color on hover. a1a1d368 by @robdekort
- Update AlpineJS. 4db54ad3 by @robdekort

## v3.43.1 (2021-12-17)

### What's improved
- Move the init of the Tailwind forms and aspect plugin back to `tailwind.config.peak.js`. 1c4df41e by @robdekort

## v3.43.0 (2021-12-13)

### What's new
- TailwindCSS v3 support. #183 by @robdekort

## v3.42.0 (2021-11-30)

### What's new
- You can now use custom domains for Fathom in the SEO trackers global. 7ca58eb2 by @robdekort

## v3.41.0 (2021-11-30)

### What's fixed
- Remove unused CSS include from social images template. 76de6942 by @robdekort
- Don't assume queue driver is Redis or Sync. 5c59b4c7 by @robdekort
- Update dependencies. da9d0e94 by @robdekort

## v3.40.0 (2021-11-25)

### What's fixed
- Tpyo's. 7fe96e39 by @robdekort
- Update translations. 6517e61d by @robdekort

## v3.39.0 (2021-11-24)

### What's new
- All templates and snippets got filename and location hinting as HTML comments. #182 by @robdekort

## v3.38.0 (2021-11-23)

### What's new
- `README.example.md` gets installed as `README.md` upon installing a new instance of Peak. 931b1e02 by @robdekort

## v3.37.0 (2021-11-19)

### What's changed
- Remove stuff from index stub that really shouldn't be there. b9c1b5d1 by @robdekort

## v3.36.0 (2021-11-18)

### What's changed
- Simplify hreflang configuration. d18793cf by @robdekort

### What's improved
- Dutch localizations. da0d980f by @robdekort
- Update cookie banner focus styles. d96a0ccf 2c8d89ee by @robdekort

## v3.35.0 (2021-11-13)

### What's new
- Add an opt in language picker partial. #179 by @robdekort

## v3.34.0 (2021-11-12)

### What's improved
- Use template literals in Tailwind CSS Typography config. 8aa9c908 by @robdekort
- Remove tabindex from skip to content. Bad practice and not needed. c907e98e by @robdekort

## v3.33.0 (2021-11-11)

### What's new
- Use Alpine Store with a persistent value to live revoke cookie consent. 5cfcbea0 by @robdekort
- Add Dutch and Norwegian translated frontend string files. 405ce48c by @robdekort

### What's improved
- Bind search submit disabled state to value's length. #178 by @klickreflex
- Rename toolbar localStorage value to be in line with the cookie banner values. 1c4ea330 by @robdekort
- Set `link_noopener: true` on common bard fields. 91020e3d by @robdekort
- Improve flow and fix bugs in `peak:add-collection`. 13cf5055 59f39f13 0a6545d1 4b96c4eb by @robdekort
- Remove `tabindex="1"` from mobile nav button as this is not recommended. 5bc09234 by @robdekort
- Change npm i to npm ci in readme.example.md. eebd9c8b by @robdekort

### What's fixed
- Set `x-trap` for mobile nav on the correct element. 5bc09234 by @robdekort

## v3.32.0 (2021-11-10)

### What's new
- New `rtl`, `ltr` and `fill-current-cascade` utilities for Tailwind. #177 by @robdekort

### What's improved
- Add default asset container to common text bard fields. b526f5c3 by @robdekort

### What's fixed
- Styling issue mobile nav when you have sub-items. 4774c735 by @robdekort
- A link block title should be required because we need it for the aria-label. 84cb945d by @robdekort

## 3.31.0 (2021-11-09)

### What's improved
- Change `sort` based on input in peak:add-collection. 55d5f28 by @robdekort
- Remove redundant gap classes. a6d2313 by @robdekort
- Add section field before button. f542b2e by @robdekort

## 3.30.0 (2021-11-08)

### What's improved
- Add default focus-visible styles to all interactive elements. #176 by @robdekort
- Add `tabindex="1"` to mobile navigation button. 39cc721 by @robdekort
- Hide skip to content on mobile. 4896781 by @robdekort

## 3.29.0 (2021-11-06)

### What's improved
- Add advanced button control toggle and clean up all fieldsets by removing redundant instructions and positioning under the field where it helps visually. #175 and ec35235 by @robdekort

## 3.28.0 (2021-11-04)

### What's new
- A `php please peak:add-set` command to generate all files needed for a fresh page builder article set. You get a named fieldset with a sizing button group, a named partial component and the fieldset get's added to `resources/fieldsets/article.yaml`. #174 by @robdekort

## 3.27.0 (2021-11-04)

### What's new
- Invoke (/) and close (esc) search input with keyboard. #172 by @robdekort
- Alpine v3.5 with `inert` and `noscroll`. #171 by @robdekort

### What's improved
- Autogenerate block filename in `php please peak:add-block`. 58493263 by @robdekort
- Add IDE comment helper to social image component. 2fd78dc by @robdekort
- Replace color shade in breadcrumbs partial to support TW shades/no-shades out of the box. 03d93db by @robdekort

## 3.26.0 (2021-11-02)

### What's improved
- Add Pinterest as option to social media channels. #170 by @klickreflex

## 3.25.0 (2021-11-02)

### What's improved
- Update social media globals. Rename fields and add email. #169 by @robdekort

### What's fixed
- Change incorrect comment in `.gitignore`.

## 3.24.0 (2021-10-30)

### What's improved
- Add aria-expanded where missing and update positions for existing ones. #163 by @robdekort

### What's fixed
- Fix empty sizes attribute when using a figure from Bard. #165 by @robdekort

## 3.23.0 (2021-10-28)

### What's improved
- Remove alt from social and favicon assets blueprint. #162 by @robdekort

## 3.22.0 (2021-10-27)

### What's improved
- Performance enhancements. #159 by @jasonvarga and @robdekort

## 3.21.1 (2021-10-26)

### What's fixed
- Actually include `app/Console/Commands/ClearSite.php` in `starter-kit.yaml` so you can use it.

## 3.21.0 (2021-10-26)

### What's new
- Generating social images now works in multisite environments. #157 by @robdekort

## 3.20.0 (2021-10-26)

### What's improved
- Delete old social images when generating new ones. #156 by @robdekort

## 3.19.0 (2021-10-25)

### What's new
- A `php please peak:clear-site` command to clear all default Peak content. #152 by @robdekort

## 3.18.0 (2021-10-25)

### What's new
- Add license file. #154 by @robdekort
- Add contributing file. #155 by @robdekort

### What's improved
- Add missing IDE helper comments to various partials. #151 by @robdekort

## 3.17.0 (2021-10-24)

### What's new
- Add the ability to create a new page to mount your new collection on when running `peak:add-collection`. #150 by @robdekort

## 3.16.0 (2021-10-22)

### What's improved
- Fix typo and duplicate translatable strings. #146 by @sjardim
- Add intrinsic image dimensions. #149 by @klickreflex

## 3.15.0 (2021-10-20)

### What's new
- Optionally grant all collection permissions to the `editor` role when using `php please peak:add-collection`. #145 by @robdekort

### What's improved
- Move noscript out of head to body. #144 by @robdekort

## 3.14.0 (2021-10-18)

### What's improved
- Use `motion-safe` on all transitions. #141 by @robdekort
- Don't hard code 16px as the base font size. #142 by @klickreflex

## 3.13.0 (2021-10-15)

### What's improved
- Include RDFa meta data to breadcrumbs partial. #140 by @klickreflex

## 3.12.0 (2021-10-12)

### What's improved
- Use front matter in picture partial. #137 by @JohnathonKoster
- Use front matter in notification partial. #138 by @JohnathonKoster

## 3.11.0 (2021-10-09)

### What's improved
- a11y improvements. #136 by @robdekort

## 3.10.0 (2021-10-06)

### What's new
- A `php please peak:add-collection` command to generate all files needed for a brand new completely custom collection. You get a collection file, a collection blueprint (with all Peak goodies), and index page and a show page. And it's all mounted, setup and ready to go.
Files new/changed:
    - `app/Console/Commands/AddCollection.php`
    - `app/Console/Commands/stubs/collection_blueprint_private_dated.yaml.stub`
    - `app/Console/Commands/stubs/collection_blueprint_private.yaml.stub`
    - `app/Console/Commands/stubs/collection_blueprint_public_dated.yaml.stub`
    - `app/Console/Commands/stubs/collection_blueprint_public.yaml.stub`
    - `app/Console/Commands/stubs/collection.yaml.stub`
    - `app/Console/Commands/stubs/index.antlers.html.stub`
    - `app/Console/Commands/stubs/show.antlers.html.stub`

### What's improved
- Use `{}` around variables in:
    - `app/Console/Commands/AddBlock.php`.
- Added a `no_results` string to:
    - `resources/lang/en/strings.php`.
- Added a wrapper around pagination that takes a custom class in:
    - `resources/views/components/_pagination.antlers.html`.

## 3.9.3 (2021-10-05)

### What's improved
- Refactor `app/Console/Commands/AddBlock.php` and added `app/Console/Commands/stubs/block.html.stub` and `app/Console/Commands/stubs/fieldset.yaml.stub`.

## 3.9.2 (2021-10-04)

### What's improved
- Add unique # to social images filename to circumvent caching issues in `app/Jobs/GenerateSocialImagesJob.php`.

## 3.9.1 (2021-09-29)

### What's improved
- The default generated block template is pimped up a little: `app/Console/Commands/AddBlock.php`.

## 3.9.0 (2021-09-29)

### What's new
- A `php please peak:add-block` command to generate all files needed for a fresh page builder block. You get a named fieldset, a named partial and the fieldset get's added with instructions to `resources/fieldsets/page_builder.yaml`. You can use all your saved time to learn about NFT's. Please don't though, it's stupid and bad for the environment. Go play with your kids.

## 3.8.1 (2021-09-29)

### What's changed
- Split out mobile and desktop navigation into two partials in `resources/views/navigation/_main.antlers.html`, `resources/views/navigation/_main_desktop.antlers.html` and `resources/views/navigation/_main_mobile.antlers.html`.

### What's fixed
- Use correct field name (`what_to_add` instead of `fallback`) for collection titles on show pages in `resources/views/snippets/_seo.antlers.html`.

## 3.8.0 (2021-09-29)

### What's new
- Hey, `x-trap` is back. Why? Because I continue screwing this up: `package.json`, `resources/js/site.js`, `resources/views/navigation/_main.antlers.html` are changed. All is fine now. I promise. Sort of. No I don't.
- Added `x-collapse` to the mobile navigation: `package.json`, `resources/js/site.js`, `resources/views/navigation/_main.antlers.html`.
- Updated the mobile nav layout in `resources/views/navigation/_main.antlers.html`.

## 3.7.0 (2021-09-28)

### What's changed
- Remove x-trap. It wasn't doing anything as there are no input elements in the main nav and it was booted wrong. Sorry: `package.json`, `resources/js/site.js`, `resources/views/navigation/_main.antlers.html`.
- Add mime type to svg favicon. Thanks [Daniel](https://github.com/klickreflex).
- Update dependencies.

## 3.6.1 (2021-09-27)

### What's changed
- Remove useless font swap rule from `tailwind.config.site.js`.

## 3.6 (2021-09-27)

### What's new
- Set copyright year and name in a global in `resources/blueprints/globals/configuration.yaml` and `resources/views/layout/_footer.antlers.html`.
- Define for which sites hreflang tags should be auto generated in `resources/blueprints/globals/seo.yaml` and `resources/views/snippets/_seo.antlers.html`.

### What's improved
- Rename default site to `English` in `config/statamic/sites.php`.

## 3.5 (2021-09-24)

### What's new
- Toggles to set on which environments Peak should auto-add noindex/nofollow, trackers and the cookie banner: `resources/blueprints/globals/seo.yaml` and `resources/views/snippets/_seo.antlers.html`.

### What's improved
- Update dependencies.
- Remove whitespace from `resources/views/default.antlers.html`. Thanks [Flemming](https://github.com/flemssound).

## 3.4.3 (2021-09-21)

### What's improved
- Use `mime_type` data from the actual image in `resources/views/components/_picture.antlers.html`. Thanks [Daniel](https://github.com/klickreflex).
- Rename fields for Change Collection Title in `resources/blueprints/globals/seo.yaml` and `statamic-peak/resources/views/snippets/_seo.antlers.html`.
- Improve `resources/views/components/_buttons.antlers.html` with flex and flex gap.

## 3.4.2 (2021-09-17)

### What's improved
- Make the footer sticky. Thanks [Daniel](https://github.com/klickreflex).

## 3.4.1 (2021-09-15)

### What's fixed
- Propertly include `x-trap`.

## 3.4 (2021-09-09)

### What's new
- Add `x-trap` to trap focus in `resources/views/navigation/_main.antlers.html`. Also changed: `resources/site.js` and `package.json`.

### What's improved
- Update dependencies.

### What's removed
- Remove unreliable backdrop blur variant in `tailwind.config.peak.js`.

## 3.3 (2021-09-04)

### What's new
- Ok that previous version simply wasn’t finished. The last resort wouldn’t even dive into OG tags. Can you imagine? Now it does. But all in the collection grid. You might have to copy and paste stuff one or two times, but the wild fallback cascade became kind of a last resort on itself anyway. This is cleaner. Thanks again Mountain Watcher David. Updated files: `resources/views/snippets/_seo.antlers.html`, `resources/views/snippets/_fallback_description.antlers.html` and `resources/blueprints/globals/seo.yaml`.

## 3.2 (2021-09-03)

### What's new
- Add a last resort meta description field in `resources/views/snippets/_seo.antlers.html` and `resources/blueprints/globals/seo.yaml`. Thanks David!

## 3.1.2 (2021-08-27)

### What's new
- Render form field instructions when they are being used in `resources/views/snippets/_form_fields.antlers.html`.

### What's improved
- Clean up `resources/views/components/_notification.antlers.html` by using Antlers conditional variable fallbacks.

## 3.1.1 (2021-08-26)

### What's improved
- Grant editors the ability to rename and move assets in `resources/users/roles.yaml` since 3.2 automagically updates all asset references. Lovely!

## 3.1 (2021-08-25)

### What's new
- Add SEO global option to add content to the page title on a per collection basis in: `resources/views/snippets/_seo.antlers.html`, and `resources/blueprints/globals/seo.yaml`.

### What's improved
- Add `strip_tags` modifier in `resources/views/snippets/_fallback_description.antlers.html` when fallback is set to `field`.

## 3.0 (2021-08-24)

### What's new
- Installing Peak now uses the new Starter Kit functionality in Peak. [Check the docs](https://peak.studio1902.nl/getting-started/installation.html).
- Add the new Peak branding to the default templates, pages and e-mails.
- Add some starter content to explain what Peak can do.

### What's improved
- Use the Glide tag in `resources/views/snippets/_background_image.antlers.html` so you can use either an asset or a hard coded image. E.g: `{{ partial:snippets/background_image image="visuals/some-image.jpg" selector="footer" }}`.
- Set widths to fields in the redirect grid in `resources/blueprints/globals/redirects.yaml`.
- Update `README.example.md` with zero downtime deployment `{CLEAR_NEW_RELEASE}` command.
- Change `font-black` to `font-bold` in `resources/views/typography/_h2.antlers.html` and `resources/views/typography/_h3.antlers.html`.

## 2.2 (2021-08-03)

### What's improved
- Clean up JS logic in `resources/views/components/_cookie_banner.antlers.html`.
- Add fallback-description to social-media image partial `resources/views/components/_social_image.antlers.html`. Thanks [Goldnead](https://github.com/goldnead).
- Added a no-script explainer text to `resources/views/snippets/_noscript.antlers.html` and `resources/lang/en/strings.php`.
- Removed `peak:warm` command (`app/Console/Commands/WarmCommand.php`) as this is now built into Statamic. Also updated `app/Console/Kernel.php`, `README.example.md` and `config/statamic/static_caching.php` to reflect this change.
- Automatically add `w-full h-full` when calling in `resources/views/components/_picture.antlers.html` using `cover="true"`.
- Add default asset container to the bard field in `resources/fieldsets/article.yaml`.
- Use `overflow-auto` instead of `overflow-scroll` to prevent an always visible scrollbar on Windows in `resources/views/components/_table.antlers.html`.
- Updated dependencies.

## 2.1.1 (2021-07-29)

### What's fixed
- Fix bugs after reorganizing the favicons feature into 'Browser appearance'. Files changed: `app/Listeners/GenerateFavicons.php`, `resources/views/manifest/manifest.antlers.html` and `resources/views/snippets/_browser_appearance.antlers.html`.

## 2.1 (2021-07-23)

### What's improved
- Get rid of `JSON.parse()` when using `$persist` in `resources/views/components/_toolbar.antlers.html`, `resources/views/components/_dark_mode_toggle.antlers.html` and `resources/views/components/_cookie_banner.antlers.html`. The final release of the plugin does this for us automatically.
- Use the `queue` flag in `README.example.md` for the assets generate presets command so the queue get's used when available.

## 2.0 (2021-07-22)

### Alpine v3
- Use Alpine's v3 persist plugin throughout peak: cookie banner, dark mode toggle, toolbar in `resources/views/components/_cookie_banner.antlers.html`, `resources/views/components/_dark_mode_toggle.antlers.html` and `resources/views/components/_toolbar.antlers.html`.

### Cookie Banner
- Use the GTM Consent API for cookie consent: https://developers.google.com/tag-manager/consent in `resources/views/components/_cookie_banner.antlers.html` and `resources/views/snippets/_seo.antlers.html`.
- Enable the cookie banner for Google Analytics as well. It's not needed anymore to traffic GA through GTM if you don't anonymize IP's (please don't though) in `resources/blueprints/globals/seo.yaml` and `resources/views/snippets/_seo.antlers.html`.
- Adds the ability to specify which cookies you accept.
- Adds the ability to revoke cookie consent when you `{{ yield:reset_cookie_consent }}` in `resources/views/layout/_footer.antlers.html`.
- Remove all cookie functions from the window object in `resources/js/site.js`.

### SEO
- Add the ability to set fallback meta, OG and Twitter descriptions in `resources/views/snippets/_seo.antlers.html`, `resources/blueprints/globals/seo.yaml`, `resources/views/snippets/_fallback_description.antlers.html` and `app/Tags/ScopeValue.php`.
- Reorder tracking fields in the SEO global blueprint in `resources/blueprints/globals/seo.yaml`.

### Browser appearance
- Add a new browser appearance appearance global for configuring browser specific meta tags.
- Merge favicons globals into a new Browser appearance global: `content/globals/browser_appearance.yaml` and `resources/blueprints/globals/browser_appearance.yaml` and rename certain fields.
- The favicon listener in `app/Listeners/GenerateFavicons.php` now listens to `browser_appearance` instead of `favicons`.
- Rename `resources/views/snippets/_favicons.antlers.html` to `resources/views/snippets/_browser_appearance.antlers.html` and add new browser appearance logic.
- Call in `browser_appearance` partial instead of `favicons` in `resources/views/layout.antlers.html`.

### What else is improved
- Peak now ships with compiled assets so `npm i && npm run dev` is not needed upon installation. This is in preparation to the new starter kits feature coming in Statamic 3.2.
- Add a noscript partial `resources/views/snippets/_noscript.antlers.html` and import it in `resources/views/layout.antlers.html`. Use it to disable the CSS that hides x-cloak elements for users that have Javascript disabled.
- Add default file upload styling in `resources/views/vendor/statamic/forms/fields/assets.antlers.html` and `tailwind.config.site.js`.
- Rename dark mode localizable strings in `resources/views/components/_dark_mode_toggle.antlers.html` and `resources/lang/en/strings.php`.
- Change 'CACHING_STRATEGY' for 'STATAMIC_STATIC_CACHING_STRATEGY' to be on par with Statamic in `.env.example` and `config/statamic/static_caching.php`.
- Rename `bard` to `article` in `resources/views/search.antlers.html`.
- Explain how redirects work better in `resources/blueprints/globals/redirects.yaml`.
- Use a unique form ID per form in `resources/views/page_builder/_form.antlers.html`. Thanks [Daniel](https://github.com/klickreflex).
- Seperate form fields from form logic in `resources/views/page_builder/_form.antlers.html` by adding `resources/views/snippets/_form_fields.antlers.html`. Thanks [Daniel](https://github.com/klickreflex).
- Use placeholder data in `resources/views/vendor/statamic/forms/fields/text.antlers.html` and `resources/views/vendor/statamic/forms/fields/textarea.antlers.html`. Thanks [Sense and Image](https://github.com/SenseAndImage).
- Exclude the sitemap from static caching in `config/statamic/static_caching.php`. Thanks [Sense and Image](https://github.com/SenseAndImage).

## 1.31.5 (2021-07-06)

### What's improved
- Update S3 filesystem config.

## 1.31.4 (2021-06-24)

### What's improved
- Comment all scheduled commands in `App/Console/Kernel.php` by default.
- Use `x-effect` to toggle `no-scroll` on the body in `resources/views/navigation_main.antlers.html`.
- Remove `scope="set"` from `resources/views/page_builder/_article.antlers.html` since it wasn't being used in the actual sets, and the data is usually so far nested in that it won't collide with anything.

## 1.31.3 (2021-06-23)

### What's improved
- Fix id selectors in `resources/views/social_images.antlers.html`. Sorry folks.

## 1.31.2 (2021-06-23)

### What's improved
- Remove Alpine logic from the social images template to prevent issues with Browsershot and Puppeteer. Thanks [Michael](https://github.com/aerni) for finding this issue.
- Yield a translateable page title on the `resources/views/search.antlers.html` template just like on the 404 template.

## 1.31.1 (2021-06-19)

### What's improved
- Use `.xml` for sitemap template and remove redundant `content_type` from route.
- Add a custom Tailwind variant to check support of backdrop blur so you can do stuff like: `supports-backdrop-blur:bg-opacity-80`.

## 1.31.0 (2021-06-18)

### What's improved
- Make cookie banner decline button actually readeable by default.
- No more whitespace in the default textarea view in `resources/views/vendor/statamic/forms/fields/textarea.antlers.html`.
Upgrade to AlpineJS v3:
- Defer loading of the script tag in the document head in `resources/views/layout.antlers.html`.
- Import Alpine, Start Alpine and set window.Alpine in `resources/js/site.js`.
- Use `@click` in `resources/views/components/_search_form.antlers.html`.
- Use `.outside` in `resources/views/components/_search_form.antlers.html` and `resources/views/navigation/_main.antlers.html`.
- Properly setup Alpine.data function function in `resources/views/page_builder/_form.antlers.html`.

## 1.30.0 (2021-06-17)

### What's improved
Upgrade to Tailwind 2.2:
- Move `::selection` from the tailwind config to `resources/views/layout.antlers.html` as utility classes.
- Added caret color utilities to the appropriate published form views.
- Remove the now redudant `transform` utility (so is `filter` but we don't use it by default).
- Re-added an empty `safelist` array in `tailwind.config.js` since the JIT engine now supports protecting classes from being purged.

## 1.29.6 (2021-06-16)

### What's improved
- Add ->filter() method to warm command.

## 1.29.5 (2021-06-16)

### What's improved
- Fixes bug that caused wrong URL's in JSON-ld breadcrumbs in `resources/views/snippets/_seo.antlers.html`.

## 1.29.4 (2021-06-15)

### What's improved
- Move `fontFamily` settings out of `extend`.
- Add `fontWeight` settings.

## 1.29.3 (2021-06-12)

### What's improved
- Add a more informative toast notification message when generation social images.

## 1.29.2 (2021-06-11)

### What's improved
- Return `0` in the warm script to prevent deployment errors.

## 1.29.1 (2021-06-10)

### What's improved
- Fix typo in `resources/views/components/_dark_mode_toggle.antlers.html`. Thanks [Jelle](https://github.com/jelleroorda).
- Fix color contrast issue in `resources/views/components/_cookie_banner.antlers.html`.
- Remove duplicate `localizable` key in `resources/blueprints/globals/redirects.yaml`.

## 1.29.0 (2021-06-01)

### What's improved
- Generating social images is now a job and queuable when you use Redis.
- You can include and exclude URL's for the static caching warm command. Thanks [Jelle](https://github.com/jelleroorda).
- The .env example is more structured. Thanks [Jelle](https://github.com/jelleroorda).

## 1.28.4 (2021-06-02)

### What's improved
- Make redirects localizable.

## 1.28.3 (2021-05-27)

### What's improved
- Don't show canonical links when the entry has `seo_noindex` set in `resources/views/snippets/_seo.antlers.html`. Thanks for the headsup Fabbow!
- Only show `hreflang` tags when `seo_canonical_type` is pointing to itself and when the entry doesn't have `seo_noindex` set in `resources/views/snippets/_seo.antlers.html`. Thanks for the headsup Fabbow!

## 1.28.2 (2021-05-26)

### What's improved
- Fixed typo. Thanks [Matthew](https://github.com/matthewbdaly).
- Merged in config file difference from more recent Statamic updates.
- Use grid display for social sharing images in the SEO tab.
- Updated dependencies.

## 1.28.1 (2021-05-12)

### What's improved
- Clear cache after generating social images.
- Track changes in git for the `favicons` and `social_images` asset containers.
- .gitkeep `public/social_images`.

## 1.28.0 (2021-05-11)

### What's new
- The ability to auto generate social images based on a template you control. [Read the docs here](https://peak.studio1902.nl/features/social-images-generation.html).
- Social images are now saved in a seperate asset container.

## 1.27.8 (2021-05-10)

### What's new
- You can now remove the toolbar for the current request. Thanks [Jelle Roorda](https://github.com/jelleroorda).

## 1.27.7 (2021-05-10)

### What's improved
- Add `strong` rule in `tailwind.config.typography.js` and set it to the DEFAULT neutral color.
- Remove duplicate `if local` check in `resources/views/components/_toolbar.antlers.html`. Thanks [Vlad](https://github.com/vladdu).
- No hyphen in `Email address` in `resources/blueprints/forms/contact.yaml` and `resources/lang/en.json`.

## 1.27.6 (2021-05-06)

### What's new
- Updated template comment/description system for future benefit.

### What's improved
- Move the `button_attributes` partial to snippets as it's not a component and update the partials requiring it it.
- Rename `bard` handle to `article` just like `page_builder` isn't called `replicator`.

## 1.27.5 (2021-05-04)

### What's improved
- Remove extra quote in the search results view. Thanks [Craig](https://github.com/intrepidws).

## 1.27.4 (2021-04-26)

### What's improved
- The property `minifyFontValues` is added and set to `false` in `webpack.mix.js` to prevent cssNano from stripping quotes from font names. Thanks [Vlad](https://github.com/vladdu).
- The `window.getToken` function has been touched by an actual developer, so it's shorter now. Thanks [Jonas](https://github.com/jonassiewertsen).

## 1.27.3 (2021-04-24)

### What's improved
- Use regular expression for sorting breakpoints to use in the Peak toolbar to make it a little more secure.
- Set some sensible `localizable` defaults to all fields so using Peak in a multisite environment means less configuration.

## 1.27.2 (2021-04-23)

### What's improved
- Use `config:app:name` instead of `site:name` in the SEO partial. When you use descriptive site names in a multisite situation (e.g. 'Dutch', or 'English'), the partial won't fall back to that in the page title.
- Support for extending breakpoints in the breakpoint indicator.
- Remove redundant title from e-mail templates.

## 1.27.1 (2021-04-21)

### What's improved
- Fixed tpyo in SEO partial causing the Twitter image not to load. Thanks [Eric](https://github.com/EricBusch).

## 1.27.0 (2021-04-21)

### What's new
- Revamped the [default color config](https://github.com/studio1902/statamic-peak/pull/96).
- Add the sizing utility to the pull quote set.

### What's improved
- Add `@click.away` to subnav list instead of parent anchor to prevent accidentally closing the subnav.
- Fix focus styles in Safari for buttons and the search input.
- Revert using `slug` instead of `title | slugify` for link blocks as we don't know if there is a `slug`.
- Use `as` instead of `tag` to overrule typography partial tags. This is a little more natural: `{{ partial:typograph/h1 as="h2" }}`.
- Use padding in navigation links instead of spacing the items. Thanks [Daniel](https://github.com/klickreflex).

### What's removed
- The Tailwind highlight utility.

## 1.26.4 (2021-04-13)

### What's improved
- Improved `GenerateFavicons.php` listener so it doesn't break the `php please multisite` command. Thanks [Jelle Roorda](https://github.com/jelleroorda).

## 1.26.3 (2021-04-09)

### What's new
- Add a `notice` state and icon to `resources/views/components/_notification.antlers.html`.

## 1.26.2 (2021-04-08)

### What's improved
- Repeat search form on the search results template in `resources/views/search.antlers.html`.
- Use `slug` instead of `title | slugify` for link blocks a11y ID's.

### What's changed
- Remove the ability for editors to create users, since they can't select roles due to a Statamic issue. Superusers have to do this.
- Remove `sm` sizing utility in one specific breakpoint missed before.

## 1.26.1 (2021-04-06)

### What's changed
- Remove `validation: required` from `resources/fieldsets/link_blocks.yaml` and `resources/fieldsets/button.yaml` due to validation currently not working as expected in Statamic. Please open an issue or a PR if this is needed in more places.
- Added some conditionalis to `resources/views/page_builder/_link_blocks.antlers.html` and `resources/views/components/_button.antlers.html` due to the validation being removed.

## 1.26.0 (2021-04-05)

### What's new
- Use Tailwind 2.1 with native JIT support.

## 1.25.8 (2021-04-05)

### What's improved
- Also add current locale as hreflang tag in `resources/views/snippets/_seo.antlers.html`.
- Make social media `aria-label` in `resources/views/layout/_footer.antlers.html` more descriptive.
- Alphabetize strings based on category in `resources/lang/en/strings.php`.

## 1.25.7 (2021-04-05)

### What's improved
- Use the new `honepot` variable instead of hard coding it.
- Close mobile sub navigation when clicking the the parent again.
- The `menu` and `close` labels in the menu button are now localisable.

## 1.25.6 (2021-04-02)

### What's improved
- Add `x-cloak` to `resources/views/components/_search_form.antlers.html`.
- Editor role can view and delete contact form submissions by default.

## 1.25.5 (2021-03-31)

### What's improved
- Use `{{ xml_header }}` in `resources/views/sitemap.xml`. Thanks [Taylor](https://github.com/taylorcammack).
- Somewhere along the way the `overflow-scroll` got lost on the table partial. It's back now for a better mobile experience.

## 1.25.4 (2021-03-30)

### What's improved
- The caption partial should, and now is located in `resources/views/typography/_caption.antlers.nl`.
- Update `.env.example` with the right whitelabel variables.

## 1.25.3 (2021-03-29)

### What's improved
- DRY caption for `_figure.antlers.html`, `_table.antlers.html` and `_video.antlers.html` in `resources/views/components/_caption.antlers.nl`.
- Add some HTML content to the empty configuration global.

## 1.25.2 (2021-03-27)

### What's improved
- Remove `sm` sizing utility.
- Move sizing utilities and `js-focus-visible` to the Tailwind base layer so we don't need to whitelist those classes.
- Remove purge options options from `tailwind.config.js`, since the JIT compiler doesn't actually use Purge CSS.
- Use `max-w-none` on `.prose` instead of disabling the `max-width` in the `tailwind.config.typography.js` as per the Tailwind Typography docs.

## 1.25.1 (2021-04-25)

### What's improved
- Disable margin on p's in li's in ul's or ol's in `tailwind.config.typography.js`.

## 1.25.0 (2021-04-25)

### What's new
- Remove `app/Tags/DynamicToken.php` and move this logic to to the window as a global helper function so you can reuse `window.getToken()`.

### What's improved
- Add empty `alt` attributes to SVG icons for improved a11y according to best practices. This makes sure VoiceOver won't read the filename for those decorative icons.
- Update `composer.json` to use Statamic 3.1.*.

## 1.24.1 (2021-03-24)

### What's new
- Add Twitter Image Alt meta tag.

## 1.24.0 (2021-03-24)

### What's new
- Add Twitter `Summary Large Image` card support.
- Propertly enforce `focus-visible` where applicable.

Peak now has it's own docs thanks to Robert Guss: [the Peak docs](https://peak.studio1902.nl).

## 1.23.2 (2021-03-22)

### What's new
- Add a tag to get a collections mount URL. So you can use `{{ mount_url from="news" }}` to generate a `View all news articles` link. Thanks [Simon Bédard](https://statamic.com/forum/4925-get-url-of-page-with-mounted-collection).
- Add `~` as a page title separator.
- Properly define the warm command in it's own file. *Important*: you must now run `php please peak:warm` or `php artisan statamic:peak:warm`.

## 1.23.1 (2021-03-20)

### What's improved
- Remove `npm i && npm run dev` from `post-create-project` in `composer.json` to prevent issues when using the Statamic CLI together with the Tailwind JIT compiler.

## 1.23.0 (2021-03-20)

### What's new
- Use [Tailwinds JIT](https://github.com/tailwindlabs/tailwindcss-jit/) compiler.

### What's improved
- Ensure a full stop in the alt text in `resources/views/components/_picture.antlers.html`.
- Use defined variable in Dynamic Token tag. Thanks [Alexander](https://github.com/stoffelio).
- Default to `rad` mode, but set `STATAMIC_THEME` to `business` in `.env.example`.
- Restore an empty `public/vendor/app/css/cp.css` to prevent a 404 error in the console.

## 1.22.1 (2021-02-18)

### What's new
- Add a `class` attribute to the button partial.

### What's improved
- Update `app/Http/Controllers/DynamicToken.php` and `app/Tags/DyamicToken.php` to use async/await instead of Ajax and return JSON so you can use the dynamic token route in other places as well.
- Only show `resources/views/components/_toolbar.antlers.html` when environment is `local` and not when you're logged in as that won't work with static caching.

## 1.22.0 (2021-02-17)

### What's new
- Support for Statamic 3.1 white labeling.

### What's improved
- Disable `max-width` on `prose` class by default (as it's already in a container).
- Disable `size-modifiers` for Tailwind Typography by default since we use fluid typography.
- Fix Knowledge Graph JSON-ld Organisation logo url.
- Contain Knowledge Graph JSON-ld Organisation logo in it's square.
- Scope sitemap results to prevent empty `<url>` entries in it.
- Actually use `.env` `IMAGE_MANIPULATION_DRIVER` in `config/statamic/assets.php` (defaults to `gd`).

## 1.21.1 (2021-02-17)

### What's new
- Use `inverted="true"` on `resources/views/components/_buttons.antlers.html` or `resources/views/component/_button.antlers.html` to use inverted styled buttons. Usefull on contrasting backgrounds (BYOS: bring your own styling).
- Added GitHub to the Social Media blueprint. Thanks [Gal](https://github.com/morpheus7CS).

## 1.21.0 (2021-02-12)

### What's new
- Added an optional dark mode toggle. Follow the instructions in README or `resources/views/components/_dark_mode_toggle.antlers.html` on how to enable (class based) Dark Mode.
- Search disabled and removed from partials by default to clean the templates up a little. Follow the instructions in README or `resources/views/components/_search_form.antlers.html` on how to enable search.

## 1.20.5 (2021-02-11)

### What's new
- Add commented `IMAGE_MANIPULATION_DRIVER=imagick` to `.env.example` to make it easier to enable Imagick.

### What's improved
- Disable darkmode by default. That shaves of some dev build size and will make your debugger faster. Woof!

## 1.20.4 (2021-02-10)

### What's new
- Use Mailhog as the default SMTP config in `.env.example` since it's a local service and free, unlike Mailtrap, the Laravel default. Run `brew install mailhog`, `valet proxy mailhog http://127.0.0.1:8025` and catch your mails on `https://mailhog.test`.

### What's improved
- Published the password reset blade views and removed rad mode to be in line with the login view. This method will likely improve siginificantly with the upcoming release of Statamic 3.1 containing white-labeling features.

## 1.20.3 (2021-02-09)

### What's improved
- Make DynamicToken check work with both non www and www domains. Thanks [Frederik](https://github.com/freshface).
- Only make search submit button enabled when the search input field has a value. Thanks for reporting [Kerns](https://github.com/kerns).

## 1.20.2 (2021-02-08)

### What's improved
- Use fixed positioning for the toolbar instead of absolute.

## 1.20.1 (2021-02-08)

### What's new
- The ability to override different favicons with custom assets.
- The Tailwind breakpoint pill replaced by a toolbar in the top right corner. It also contains an edit button when you're logged in. The toolbar can be permantly fixed to your window by toggling the button. A great idea by [Kerns](https://github.com/kerns).

### What's improved
- Use fakerphp/faker instead of fzaninotto/faker. Thanks [Julius](https://github.com/Jubeki).
- Update Tailwind and other JS dependencies.
- Use the `{{ svg }}` tag where possible.

## 1.20.0 (2021-02-07)

### What's new
- Redirects old URL's to new URL's and present it in a fancy grid. That's it. Only kicks in when a 404 is triggered. Just like the SEO global it's only accessible to the superusers and the `marketeer` role (which you add to users with the `editor` role).

## 1.19.3 (2021-02-06)

### What's improved
- Rewrote and simplified the favicon image generation. You can now use any SVG, don't need a squared viewport and it will still be centered in the resulting PNG's.

## 1.19.2 (2021-02-06)

### What's fixed
- Specify asset container for image fields.

## 1.19.1 (2021-02-05)

### What's disabled
- Disabled centering your favicon for when you're SVG viewport is not already squared due to possible bugs. For now.

## 1.19.0 (2021-02-05)

### What's new
- Add favicon support. Generate favicons for modern browsers with a single SVG. Thanks to [David](https://github.com/austriker27) for the inspiration!

## 1.18.16 (2021-01-28)

### What's new
- Added a `marketeer` role you can grant certain `editors` to access the SEO globals.

### What's improved
- Add `replicator_preview: false` by default to bard fields in `resources/fieldsets/common.yaml`.
- Make subnav toggable. Thank you [Philip](https://github.com/philipboomy).
- The readme.

## 1.18.15 (2021-01-27)

### What's new
- Add a consent field to the default form.
- Don't e-mail form fields that have `consent` as a handle: those are usually single checkbox field that have to be checked for the form to be valid.
- Yield a SEO title to `resources/views/snippets/_seo.antlers.html` from `resources/views/error/404.antlers.html` to render a page title on the error page. This pattern is reusable to optional other error pages.

### What's improved
- Update deploy scripts in `README.example.md`.
- Add `route:cache` command to optional schedule in `app/Console/Kernel.php`.
- Set the optional clear and warm schedule to daily by default instead of hourly in `app/Console/Kernel.php`.

## 1.18.14 (2021-01-24)

### What's improved
- Fix typo's in `README.example.md`. Thanks [Sam](https://github.com/sjclark).
- Fix forge deploy script.

## 1.18.13 (2021-01-21)

### What's improved
- Fix error in Ploi deployment script.

## 1.18.12 (2021-01-21)

### What's improved
- Use Tailwind layers to instruct PurgeCSS in `tailwind.config.js` and `resources/css/custom.css`. Thanks for the tip Tom.
- Update JS dependencies.
- Update Forge/Ploi references in the README files.

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
- Update DynamicToken route to be compatible with Laravel 8. Thanks [Duncan](https://github.com/duncanmcclean).

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
