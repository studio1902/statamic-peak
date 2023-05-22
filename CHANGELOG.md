# Changelog

## v12.4 (2023-05-18)

### What's improved
- Disable BrowserSync option for secured sites. #318 by @marcorieser

## v12.3 (2023-05-12)

### What's improved
- Update German translations. #317 by @ymarkus

## v12.2 (2023-05-11)

### What's improved
- Register multiple Alpine plugins at once. dfdb9015 by @robdekort

## v12.1 (2023-05-11)

### What's improved
- Add default title to nav blueprint section. eb4d1587 by @robdekort
- Explanatory display text for common text fields. f93a6f88 by @robdekort
- Use partial tag method for image partial. 30136610 by @robdekort
- Remove redundant section instructions from page blueprint. 348010b3 by @robdekort

## v12.0 (2023-05-09)

### What's new
- Statamic v4 support including grouped page builder and article pickers, form section support and refactoring blueprints into floating sections. #314 by @robdekort
- Add support for morphing live preview edits instead of refreshing the browser. #314 by @jacksleight and @robdekort

### What's improved
- Update Statamic config files. a6ecc364 by @robdekort
- Remove `always_show_set_button` property from Bard fields. 59b5e2e9 by @flolanger
- Disable expect navigation root page by default. d43f76da by @robdekort

### What's fixed
- Stop click events bubbling on up mobile nav toggle. #314 and @robdekort

## v11.7 (2023-04-03)

### What's new
- Add support for secured sites and Browsersync to Vite. #307 by @marcorieser

### What's improved
- Use arrow function to preserve context for `this`. #313 by @marcorieser

## v11.6 (2023-03-23)

### What's improved
- Remove unnecessary comments in form field partials. #310 by @marcorieser

## v11.5 (2023-03-18)

### What's improved
- Use partial tag method. d42f23b5 by @robdekort

## v11.4 (2023-03-16)

### What's changed
- Remove quality setting from default asset preset. 5288bac7 by @robdekort

## v11.3 (2023-03-14)

### What's new
- Added an option to enable/disable `SAVE_CACHED_IMAGES` during the installer. d881a20d by @robdekort

## v11.2 (2023-03-13)

### What's fixed
- Remove some old JS logic from the video partial that doesn't belong anymore. ad935bbf by @robdekort

## v11.1 (2023-03-09)

### What's improved
- Move the Statamic conditonal field form helpers to the Statamic Peak Tools addon. b6e8e080 by @robdekort

## v11.0 (2023-03-09)

### What's improved
- Move the form handler to the Statamic Peak Tools addon. #306 by @robdekort

## v10.8 (2023-03-03)

### What's improved
- Vite refreshes the browser when new Antlers files get created. #304 by @marcorieser

## v10.7 (2023-03-01)

### What's improved
- Adjust table component HTML structure to be formatable by Antlers formatter. #303 by @marcorieser

## v10.6 (2023-02-22)

### What's improved
- Also run `npm i puppeteer` when opting into social images in the post install hook. 10233eff by @robdekort

## v10.5 (2023-02-15)

### What's improved
- Use short locale in typography time partial. 1b1b4024 by @robdekort

## v10.4 (2023-02-14)

### What's improved
- Simplify cookie banner protected video logic. 1416d7fd by @robdekort

## v10.3 (2023-02-13)

### What's new
- Add option to composer require spatie/browsershot in post install hook. b0b97f45 by @robdekort

## v10.2 (2023-02-10)

### What's improved
- Czech translations. #302 by @kuldas

## v10.1 (2023-02-10)

### What's new
- Make default image size bigger. b7c4b129 by @robdekort

## v10.0 (2023-02-09)

### What's new
- Move Browser Appearance related features and a few other tools to two new easily updatable addons. #301 by @marcorieser
- Use new brand color. 36e2cb1c by @robdekort

### What's improved
- Use `fit` is `max` on default asset replacement configuration. daf3fa7a by @robdekort

# Changelog

## v9.0 (2023-02-07)

### What's new
- Move all SEO related stuff to an easily updatable addon. Thank you so much Marco! #298 by @marcorieser

## v8.19 (2023-02-03)

### What's fixed
- Fix an issue with an undefined consent state in the cookie banner. 846df5e5 by @robdekort

## v8.18 (2023-02-01)

### What's improved
- Simplify default asset config. 5b4cedab by @robdekort

## v8.17 (2023-01-30)

### What's improved
- Show error notification in form on error. cdf5f198 by @robdekort

## v8.16 (2023-01-28)

### What's new
- Support for Statamic 3.4. 434bf9ef by @robdekort
- Add and use a source preset for the images container. ac8c7d17 by @robdekort
- Use smart typography on all Bards. b91f06d6 by @robdekort
- Add option to use `cover="true"` in the picture partial when using SVG's. 6459e394 by @robdekort
- Add option to use `skip_ratio_steps="1"` (1,2,3) in the picture partial to force big images on large mobile screens to keep using your mobile aspect ratio instead of using the large one. 6459e394 by @robdekort

### What's improved
- Updated dependencies. 803ada5e by @robdekort

## v8.15 (2023-01-26)

### What's improved
- Add extra safety check to fallback description if the first field called `text` in the page builder is a Bard. e40f7ced by @robdekort

## v8.14 (2023-01-25)

### What's fixed
- Tpyo. #296 by @vannut

## v8.13 (2023-01-24)

### What's improved
- Remove darkMode reference and redundant JIT config line `tailwind.config.js`. 478d3e13 by @robdekort

## v8.12 (2023-01-17)

### What's improved
- Remove commented search route. The preset installer will tell you what to do. 70f93440 by @robdekort

## v8.11 (2023-01-17)

### What's new
- Move font smoothing to an html class. 05850958 by @robdekort

## v8.10 (2023-01-17)

### What's new
- Use `font-smoothing: antialiased` by default. 43a8f04e by @robdekort

# Changelog

## v8.9 (2023-01-11)

### What's changed
- Rename figure set to image. f5e055d7 by @robdekort

## v8.8 (2023-01-05)

### What's new
- Danish translations. #292 by @rabol

### What's improved
- Prevent an exception in live preview by checking if a form is selected in the form page builder block. c3405f41 by @robdekort

## v8.7 (2022-12-20)

### What's new
- Optionally hide the cookie banner by default when using video embeds so it can only be invoked from pages with embeds. 1bf417c0 by @robdekort

### What's improved
- Git track the new asset containers by default. 5143d170 by @robdekort

## v8.6 (2022-12-15)

### What's improved
- `Social image` is visible by default in CP listings. c2895c76 by @robdekort
- Update dependencies (Vite 4). 88d54fd1 by @robdekort

## v8.5 (2022-12-15)

### What's improved
- Add SVG to default filetypes in missing alt widget. 615218fd by @robdekort

## v8.4 (2022-12-14)

### What's improved
- Use SVG tag instead of inline SVG's for subnav chevrons. ae374d67 by @robdekort

## v8.3 (2022-12-14)

### What's fixed
- Update editor role with access to the new asset containers. 6349ae94 by @robdekort

## v8.2 (2022-12-13)

### What's changed
- Remove preset strings. They should be manually installed from the CLI addon. 5ead678b by @robdekort

## v8.1 (2022-12-13)

### What's improved
- Use files container for downloads in button field. cfc6634c by @robdekort

## v8.0 (2022-12-13)

### What's new
- The Peak CLI commands are moved to an addon so you can easily update all presets and blocks. #291 by @robdekort

### What's changed
- Due to this new setup the installer can't optionally run the `clear-install`, `install-block` and `install-preset` commands. The installer now hints you can manually do this.

## v7.11 (2022-12-12)

### What's improved
- The privacy statement field in the configuration globals is linked to the `files` asset container. 09d06c83 by @robdekort

## v7.10 (2022-12-12)

### What's improved
- Use `x-cloak` on sub nav panels instead of full list items in the desktop navigation. 6b401414 by @robdekort
- Move `x-trap` up so you can tab to close button and add `esc` key listener on mobile navigation. 42c8fe94 by @robdekort

### What's noteworthy
- All Studio 1902 Twitter references are removed from the default globals and docs. [Follow me on Mastodon](https://mastodon.social/@robdekort). The Twitter account is removed.

## v7.9 (2022-12-11)

### What's new
- Default to two asset containers: images and files. Make the `alt` field a textarea. #289 by @robdekort
- Add an option to install presets to the post install hook. a00e3c5e by @robdekort

### What's changed
- Move language picker, theme toggle, search and breadcrumbs to optional installable presets. #290 by @robdekort
- Don't check for file existence when installing blocks to prevent conflicts when installing presets and blocks. 27664ecc by @robdekort

## v7.8 (2022-12-07)

### What's new
- An installable modal preset. The modal is only rendered once on the page but gets dynamically gets injected it's contents. 11a2dd99 and dec37ac7 by @robdekort

### What's improved
- Fix grammar in `widget_asset_count` string. 036906bc by @robdekort

## v7.7 (2022-12-01)

### What's new
- Add SMS option to button fieldset and partial. Great suggestion by @jaygeorge. c72e397c by @robdekort

### What's changed
- Remove `aspect-ratio` plugin from `package.json`. 1bb353a5 by @robdekort

## v7.6 (2022-12-01)

### What's new
- Use `index_content` methodology for `peak:add-collection` command. 5411386b by @robdekort

### What's improved
- Comments in preset stubs. a0a906a9 by @robdekort

## v7.5 (2022-11-30)

### What's new
- Add `index_content` block to installable blocks. 332b3529 by @robdekort

## v7.4 (2022-11-30)

### What's fixed
- Trash `collection` fieldset that shouldn't be installed by default. 4ea1fa77 by @robdekort

## v7.3 (2022-11-30)

### What's new
- Add `FAQ` preset. 0a46bd89 by @robdekort
- Add `update_role` operation to preset installer and grant all appropriate permissions to `editor` role when installing available presets. 4b975ad5 by @robdekort

### What's improved
- Make ul > li > p more specific in prose config. b5b16f0f by @robdekort

## v7.2 (2022-11-29)

### What's improved
- Improved stub preset templates. 667c560a and 6142ee25 by @robdekort

## v7.1 (2022-11-29)

### What's changed
- Put preset strings in strings file by default. 4f6c1f2e by @robdekort

## v7.0 (2022-11-29)

### What's new
- Refactor commands and add new `Install Preset` command to add complete collections, templates and page builder blocks to your site. #287 by @robdekort

### What's changed
- Remove the Tailwind CSS Aspect Ratio plugin and default to native aspect ratio utilities. 6d6f363 and 1d487ae by @robdekort

## v6.38 (2022-11-28)

### What's improved
- Embeds behind the cookie banner now respect environment tracker configuration. 95d752a9 by @robdekort

## v6.37 (2022-11-28)

### What's new
- Add instructions and and link to the cookie banner on disabled video's. 27d3b3b2 by @robdekort

## v6.36 (2022-11-27)

### What's new
- Add video embeds consent option to the cookie banner and when in use only load video embeds after consent. #286 by @robdekort

## v6.35 (2022-11-26)

### What's new
- Add option to group third party scripts under custom labels in the cookie banner. #285 by @robdekort

## v6.34 (2022-11-25)

### What's improved
- Only check certain for filetypes in the missing alt text dashboard widget. 9462a201 by @robdekort

## v6.33 (2022-11-25)

### What's improved
- Simplify default prose configuration. 8d5c7106 by @robdekort
- Default to `text-neutral` typography headings. ac4b2bc4 by @robdekort
- Improve default pull quote styling. 008b0c96 by @robdekort

## v6.32 (2022-11-21)

### What's fixed
- Fix search results page title. 190ea56f by @robdekort

## v6.32 (2022-11-21)

### What's fixed
- Fix search results page title. 190ea56f by @robdekort

## v6.31 (2022-11-21)

### What's improved
- Better search result URL styling and break words for small screens. f3dfb57b by @robdekort

## v6.30 (2022-11-21)

### What's fixed
- Add back required `{{ asset }}` tag in picture partial for when looping an asset field. 5fe2f0fd by @robdekort

### What's improved
- Use `text-neutral` instead of `text-black` in OG image template. 6e22f901 by @robdekort
- Update dependencies. f4f839f3 by @robdekort

## v6.29 (2022-11-20)

### What's new
- Add all available Glide filters in the picture partial. f5ce09d8 by @robdekort

## v6.28 (2022-11-19)

### What's improved
- Search a11y: close form input when tabbing out. 7ed410ab by @robdekort

## v6.27 (2022-11-18)

### What's new
- Add a contact form widget to the dashboard. 9e4ec550 by @robdekort

### What's improved
- Set a default ratio in the picture partial. Replace stock image with a bigger one. Remove `asset` tag for performance. 80c1557b by @robdekort
- Wrap the Peak toolbar in a nocache tag. 2eec5c01 by @robdekort

## v6.26 (2022-11-17)

### What's improved
- Add quotes in add-block command. #284 by @vannut

## v6.25 (2022-11-16)

### What's new
- A new `User management` role for creating users and assigning them roles. The `Editor` lost all user permissions. 50d6c81f by @robdekort
- Enable the asset zoom function using `focal_crop` not just when aspect ratio cropping. 8f46c794 by @robdekort

### What's improved
- Tailwind JIT: scan `*.blade` files by  default. 7b12a453 by @robdekort

## v6.24 (2022-11-12)

### What's new
- Add Mastodon to Social Media globals, including site verification. 9dfafe55 by @robdekort

## v6.23 (2022-11-11)

### What's improved
- Improve skip to content behaviour. #282 by @klickreflex

## v6.22 (2022-11-10)

### What's improved
- Replace some tabs with spaces. #281 by @hgrimelid

## v6.21 (2022-11-09)

### What's improved
- Inline privacy statement link with label in toggle field. d0c82d46 by @robdekort

## v6.20 (2022-11-09)

### What's improved
- Better defaults for sizes attributes: especially on large screens. Great suggestion by @klickreflex. 98e69497 by @robdekort

## v6.19 (2022-11-09)

### What's improved
- Add small breakpoint to live preview. #279 by @K3CK
- Use `strip_tags`, `entities` and `trim` on SEO fields. #280 by @K3CK
- Add `entities` modifier to fallback description. 59238953 and 6b51b130 by @robdekort

## v6.18 (2022-11-04)

### What's improved
- Generate PNG favicons for safari to support full color icons. Deprecate mask-icon. 77c1aaea by @robdekort
- Use double quotes in `.env.example` and `readme.example.md` and remove quotes from App Name during install. #bb759e36 by @robdekort
- Updated dependencies. d9a115c2 by @robdekort

## v6.17 (2022-11-03)

### What's new
- Add Plausible Analytics options to the global SEO configuration. #278 by @x7ryan

## v6.16 (2022-11-01)

### What's improved
- Use full url's in sitemap index. 186b4f6a by @robdekort
- Enable multisitemap routes by default. 5c9fcf0d by @robdekort

## v6.15 (2022-10-31)

### What's new
- Add a multisite sitemap. #277 by @andreasschantl, 57749aef by @robdekort

## v6.14 (2022-10-28)

### What's improved
- Add an option to init a git repo during installation. 02a4fc99 by @robdekort

## v6.13 (2022-10-26)

### What's improved
- Add `locale` attribute to time partial. 89c238ef by @robdekort

## v6.12 (2022-10-25)

### What's improved
- Improve fallback description logic. d42ef587 by @freshface and @robdekort

## v6.11 (2022-10-20)

### What's new
- Add a typography `time` partial. 471fa0d3 by @robdekort
- Update to Tailwind 3.2. #274 by @klickreflex

### What's improved
- Use the same gap sizes for installable page builder blocks. #274 by @klickreflex
- Change indentiation in `collection.yaml.stub` to 2 spaces. #272 by @pdipatrizio

## v6.10 (2022-10-19)

### What's improved
- Make sure +3 columns work correctly on the column page builder block. e52440d8 by @kobe-f8
- Remove redundant modifier on full image page builder block. 72de7ec6 by @kobe-f8
- Simplify base styling. 48249b2a by @robdekort
- Simplify Ploi deploy script. 020f2e8a by @robdekort

## v6.9 (2022-10-16)

### What's new
- Add installable Images grid block. f4398ec1 by @robdekort
- Add installer option to enable/disable debugbar. 2a888986 by @robdekort

## v6.8 (2022-10-15)

### What's new
- Add installable Columns block. 0ac2e8cf by @robdekort

## v6.7 (2022-10-14)

### What's improved
- Provide `width` and `height` attributes for svg and gif. #269 by @klickreflex

### What's fixed
- Use working `width` and `height` attributes and aspect ratio crop the fallback image. 81efe110 by @robdekort

## v6.6 (2022-10-13)

### What's new
- Add installable full width image block. 6dbb9d44 by @robdekort

## v6.5 (2022-10-13)

### What's improved
- Besides `.env` also update `README.md` during starter kit install. 8600b1b3 by @robdekort

## v6.4 (2022-10-11)

### What's new
- Rewritten `picture` partial, disable asset presets, add breakpoint based picture cropping. #268 by @robdekort

### What's improved
- Updated Czech translations. #267 by @kuldas

## v6.3 (2022-10-09)

### What's new
- Add the option to enable Imagick as an image processor during the install. 6c76cf9c by @robdekort

## v6.2 (2022-10-08)

### What's new
- Add the ability to use aspect ratio cropping when using the picture partial. #265 by @robdekort
- Add two new installable blocks. A divider and an image and text block. #266 by @robdekort

## v6.1 (2022-10-07)

### What's new
- Ask for `APP_NAME` during configuration. bb9724b7 by @robdekort

## v6.0 (2022-10-06)

### What's new
- Add a post install hook when installing Peak. [Update the Statamic/CLI](https://github.com/statamic/cli#updating-the-cli-tool) to use this feature. This optionally offers you to [configure Peak](https://peak.1902.studio/getting-started/installation.html#installation-options). #260 and #263 by @robdekort
- Add a block installer command to install preconfigured blocks (partial and fieldset) into the page builder. #261 by @robdekort
- Add command to add a partial (component, layout or typography) with IDE hinting and file system comments. #262 and #264 by @robdekort

### What's improved
- Update the `peak:clear-site` command so it can be run from the post install hook. 88de7ee7 by @robdekort
- Assume `link_type` is `url` when none is provided to the button component. cab635fc by @robdekort

## v5.16 (2022-09-27)

### What's improved
- Reset class parameter on buttons to avoid collissions. 9a53c281 by @robdekort
- Wait for the network being idle when generating social images to make sure assets are loaded. e94725f2 by @robdekort

## v5.15.1 (2022-09-14)

### What's improved
- Clean up the TW typography CSS added in ecd234f9. bbf46622 by @robdekort

## v5.15 (2022-09-13)

### What's improved
- Force prose first / last children to get mt-0 / mb-0. ecd234f9 by @robdekort

## v5.14 (2022-09-12)

### What's improved
- Localize contact form mail subject. 074d30ac by @robdekort

## v5.13 (2022-09-12)

### What's new
- Add vanity redirect option. 89a42a12 by @robdekort

## v5.12 (2022-09-09)

### What's improved
- Move the toolbar to the bottom of the screen. #254 by @freshface

## v5.11 (2022-09-09)

### What's improved
- Remove unnecessary alpine logic for error labels. 745f2427 by @freshface and @robdekort

## v5.10 (2022-09-07)

### What's improved
- Fallback to default 404 entry when you haven't published the translations in a multisite environment. #253 by @freshface

## v5.9 (2022-09-02)

### What's improved
- Add the option to skip mounting a collection in `php please peak:add-collection`. 796c33e4 by @robdekort

## v5.8 (2022-09-01)

### What's new
- Add the ability to inject third party scripts behind the cookie banner. #252 by @robdekort

## v5.7 (2022-09-01)

### What's improved
- Use `mark` modifier on search result snippet to highlight query hits. 44df2034 by @robdekort

## v5.6.1 (2022-08-29)

### What's fixed
- Revert changing search snippet truncation. 55549864 by @robdekort

## v5.6 (2022-08-29)

### What's new
- Remove empty nodes on Bard fields. 5e8311c4 by @robdekort
- Use `bard_text` modifiers to simplify generating meta descriptions and search result snippets. 55549864 by @robdekort

### What's fixed
- Tpyo's in picture partial. #248 by @websmyth

## v5.5 (2022-08-22)

### What's improved
- Improve nav performance in navs. #243 by @freshface
- Hide fields where input_type == 'hidden'. #245 by @freshface
- Do not add site title when using a custom SEO title on an entry. #246 by @freshface

## v5.4.2 (2022-08-08)

### What's changed
- Removed previously needed changes for a reverted breaking Statamic change. 1ad2bf6c by @robdekort

## v5.4.1 (2022-08-07)

### What's fixed
- Reset class paramater as well to circumvent an unintended breaking Statamic change (#237) *only* for new users. 23b1c7ef by @robdekort

## v5.4 (2022-08-06)

### What's new
- Add `entities` modifier on alt text. 6597c4ff by @robdekort
- Add `aria-hidden="true"` when there's no alt text. 84d8af72 by @robdekort

### What's improved
- Updated dependencies (Vite 3) 02a4f2d1 by @robdekort
- Improve file upload styling. #238 by @freshface

### What's fixed
- Circumventing an unintended breaking Statamic change (#237) *only* for new users. 7d086aea by @robdekort
- Typo in `page_builder.yaml`. #235 by @brendanfalkowski

## v5.3 (2022-07-14)

### What's fixed
- Use vite tag instead of mix in social images layout. 6b77d479 by @robdekort

## v5.2 (2022-07-13)

### What's new
- Czech translations. #233 by @kuldas

## v5.1 (2022-07-06)

### What's improved
- Add aliases to Vite to support Mix commands. d769cdbb by @robdekort

## v5.0 (2022-07-05)

### What's new
- Use Vite instead of Mix. #232 by @robdekort

### What's improved
- Skip to content component comes in from the top instead of bottom.

## v4.21 (2022-06-15)

### What's improved
- Slightly altered no JS experience so users can see the nav on both desktop and mobile. 76966a60 by @robdekort

## v4.20 (2022-06-14)

### What's improved
- Obfuscate email addresses in buttons. c7bfa3a0 by @robdekort
- Upgrade to Tailwind CSS 3.1. 03960084 by @robdekort
- Add Tailwind CSS first-party TypeScript types. 5d2d63be by @robdekort
- Add partial (required) parameter hinting to common partials for VS Code + Antlers Toolbox . f911751b by @robdekort

## v4.19 (2022-06-09)

### What's improved
- Use the `app_url` for browsersync. 2f5723e6 by @delz-dev and @robdekort
- Update dependencies. bd0a5f28 by @robdekort

### What's removed
- The `mount_url` tag as there is now a native `mount` tag in Statamic. 87f9e798 by @robdekort

## v4.18 (2022-05-31)

### What's improved
- Exclude site.webmanifest from static caching. 3226606a by @robdekort

## v4.17 (2022-05-23)

### What's new
- Add German translation. #221 by @klickreflex

## v4.16 (2022-05-19)

### What's improved
- Use new Revealer toggle type to show/hide advanced button controls. 7a319f91 by @robdekort
- Update dependencies. 0bd379bb by @robdekort

## v4.15 (2022-05-13)

### What's fixed
- Remove 'Show controls' feature for buttons as data doesn't get saved in recent Statamic versions. 98eedbf9 by @robdekort

## v4.14 (2022-05-13)

### What's fixed
- Multilingual sitemaps for Statamic 3.3+. 708d5672 by @robdekort

## v4.13 (2022-05-10)

### What's improved
- Glide `fill` SEO JSON-ld image instead of `fit`. 0d2bff96 by @robdekort
- Make change collection title field localizable. d02d4b4f by @robdekort

### What's fixed
- Typo in theme toggle comments. 88f2b82c by @robdekort

## v4.12 (2022-04-22)

### What's new
- Use a store for the theme/dark-mode configuration. This way you can reactively use the current theme/mode in other components. #216 by @robdekort

## v4.11 (2022-04-20)

### What's new
- Add toggle form fieldtype and use it as consent field in the default form. #214 by @robdekort

### What's fixed
- A typo in the globals blueprint. #213 by @tricki

## v4.10 (2022-04-08)

### What's new
- Add a section field and partial to the form builder. 19732c0f by @robdekort

## v4.9 (2022-04-08)

### What's improved
- Remove old meta and generate new upon social image creation. 3c3e7918 by @PunchRockgroin and @robdekort
- Revert earlier decision and ignore assets by default again. I got tired of `git -rm -f` on each and every project when I forgot to uncomment those lines. 6878248e by @robdekort

## v4.8 (2022-03-30)

### What's improved
- Use base strategy for TW forms. 8e8657d8 by @robdekort

### What's fixed
- Previous social images now get purged and don't trigger an error on Laravel 9. f5eaa8b9 by @robdekort

## v4.7 (2022-03-27)

### What's new
- Add Norwegian Nynorsk translation. #207 by @hgrimelid

### What's improved
- Improve Norwegian Nynorsk translation. #208 by @hgrimelid

## v4.6 (2022-03-24)

### What's fixed
- Make OG images job compatible with Statamic 3.3. 3dddf9fe by @robdekort

### What's improved
- Set CSRF token on form header and disable token field on the form partial. #206 by @robdekort
- Simplify syntax in call to action. cc78ee87 by @robdekort
- Improve readability in button partial. 0dbbbbda and fbd3edd2 by @robdekort

## v4.5 (2022-03-23)

### What's fixed
- 419 errors on form submission. b87e674c by @robdekort

### What's improved
- Don't ask about mounts for non public collections when using `peak:add-collection`. 7bb0dc5f by @robdekort
- Remove unused paragraph partial (it's renamed to `p`). a1e2589d by @robdekort

## v4.4 (2022-03-22)

### What's fixed
- Use dynamic public paths when generating favicons to prevent errors when running the multisite command. b3c3d819 by @robdekort

## v4.3 (2022-03-21)

### What's fixed
- Fix max width collision with the article page builder block. afe26aa9 by @robdekort

## v4.2 (2022-03-17)

### What's improved
- Get rid of IDE comment in Sitemap template. It can cause issues on certain hosts. 62beea70 by @robdekort

## v4.1 (2022-03-16)

### What's fixed
- Move up language folder to get `{{ trans }}` and validation working on Laravel 9. #203 by @robdekort

## v4.0 (2022-03-15)

### What's new
- Antlers Runtime parser support. Check this [upgrade guide](https://peak.1902.studio/getting-started/runtime-parser.html) for existing sites. #194, #201 by @robdekort
- Support for conditional form fields. #195 by @robdekort
- Completely reworked dark mode toggle (theme toggle). It has a light, dark and system option now. #197 by @robdekort
- Use the content of an actual 404 entry when a 404 error hits (including SEO data). #199 by @robdekort and @jasonvarga
- Rework the Tailwind Typography configuration to use modifiers in a partial. #190 and ebd09623 by @robdekort
- Add a CP widget displaying assets with missing alt texts. 03059989 by @robdekort and @mikemartin
- Make privacy statement a configuration global and use it in checkbox consent fields instead of just the cookie banner. #191 by @robdekort

### What's improved
- Send CSRF token as header and simplify form submission logic. _Note_: you can use this methodology everywhere you need a dynamic CSRF token. 12a824d8 by @robdekort
- Clear the navigation when running `php please peak:clear-site`. #202 by @robdekort
- Improve form error handling a11y. #196 by @robdekort
- Rename the `paragraph` partial to `p` to be in line with heading partials. 6184f9c3 by @robdekort
- Rewrite the IDE helper for the `caption` partial. 69c6f9ec by @robdekort
- Remove html comments from fallback description partial. 6e80c42e by @robdekort
- Use logo component in social image template. c03f433d by @robdekort
- Make form field instructions localizable. 643fbe83 by @robdekort
- Use semantic markup for pull quote. #200 by @klickreflex
- Use `--queue` flag on the static:warm command in the example readme. 5275036f by @robdekort
- Use `--no-dev` flag on the composer install command in the example readme. 574a268e by @robdekort
- Add example production .env contents to the example readme. 12a824d8 by @robdekort
- Remove examples entry and simplify the starter navigation. 339ce492 by @robdekort

### What's fixed
- Typo on default contact form page. #198 by @kerns
- Remove `bg-neutral-50` from the social image template since Peak can't ship with shades. That's up to the color config of the user. 103086de by @robdekort

## v3.54.0 (2022-02-21)

### What's improved
- Improve table component responsive behaviour. #189 by @klickreflex
- Use `::marker` to style Tailwind CSS Typography marker styles. 2c0fd2da by @robdekort
- Use `!important` to style Tailwind CSS Typography `a:hover` text color. 7b755293 by @robdekort
- Fix logo component template comment. 59b0e04e by @robdekort

## v3.53.0 (2022-02-13)

### What's improved
- Prevent default outline in styled TW typo focus visible. 04118026 by @robdekort.
- Make `caption` component a block element. 513da3a2 by @robdekort
- Update dependencies. 2ad650ac by @robdekort

## v3.52.0 (2022-02-09)

### What's improved
- Lower default concurrency for the `static:warm` command to put less strain on servers. 91893c02 by @robdekort.

## v3.51.0 (2022-02-01)

### What's improved
- Use `@screen` directive in the Tailwind config. #185 by @klickreflex and 97b30e34 by @robdekort

## v3.50.0 (2022-02-01)

### What's improved
- Add aria label to main navigation nav tag. 91c19212 by @robdekort
- Remove focus trap from sub navigation as it's not according to the a11y guidelines. c6c71625 by @robdekort
- Close flyout menus when the user tabs out. 6cc44196 by @robdekort
- Update dependencies and remove postcss nested as it's not used by default. da0443e2 by @robdekort

## v3.49.0 (2022-01-20)

### What's improved
- Remove redundant VerifyCsrfToken config. 2ebbc036 by @robdekort
- Add slightly changed default Ignition config. Auto switch color mode and use vscode as the default editor (since it's the only editor with Antlers support). 25aabc03 by @robdekort
- Fix alphabetical order of Article sets. 01c1f884 by @robdekort

## v3.48.0 (2022-01-17)

### What's new
- Alias dark mode localStorage variable and dynamically update the `theme-color` meta tag when using dark mode and seperate normal/dark mode theme colors. f5a53e4b by @robdekort

## v3.47.0 (2022-01-17)

### What's new
- Include localized entries in sitemap. #185 by @stefankempf

### What's improved
- Specifically add a content type to the sitemap route. #184 by @stefankempf

## v3.46.0 (2022-01-14)

### What's new
- Use alpine focus plugin instead of the deprecated trap plugin (no breaking changes). 4c474a73 by @robdekort

## v3.45.0 (2022-01-10)

### What's improved
- Use queue for asset generation and add `{DO_NOT_NOTIFY}` for Ploi to the deploy script example. d1b0e31f and 2570989c by @robdekort

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
- Installing Peak now uses the new Starter Kit functionality in Peak. [Check the docs](https://peak.1902.studio/getting-started/installation.html).
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
- The ability to auto generate social images based on a template you control. [Read the docs here](https://peak.1902.studio/features/social-images-generation.html).
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

Peak now has it's own docs thanks to Robert Guss: [the Peak docs](https://peak.1902.studio).

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
