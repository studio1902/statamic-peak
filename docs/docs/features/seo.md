# SEO

Peak includes full professional SEO support. It's easy to expand on since it's all built with native fields and templating.

## SEO features
* Page title.
* Website title and seperator.
* Meta description (and set global fallback options).
* Canonical URL.
* Open Graph data and image.
* Default Open Graph image.
* Twitter card and image.
* Default Twitter card image.
* Auto generated sitemaps.xml for a listing of multisitemaps.
* Auto generated /{locale}/sitemap.xml for per site sitemaps.
* Customize the sitemap: which collections are included and per entry frequency and priority settings.
* No-index for entries, also excludes from sitemap.
* JSON-ld schema objects.
* Hreflang tags automatically generated (for selected site locales).
* Knowledge graph data (organization, person or custom).
* JSON-ld breadcrumbs.
* Trackers: Google Analytics, Google Tag Manager, Site Verification, Fathom or Cloudflare Web Analytics.
* Cookie Consent Banner.

> Note: by default only `superusers` and the `marketeer` role get access to the SEO global configuration.

| Globals error messages  | Globals SEO  |  Globals Cookie Banner  | Cookie Banner |
|---|---|---|---|
| ![SEO globals JSON-ld](/visuals/screenshots/seo-globals-01.png) | ![SEO globals sitemap](/visuals/screenshots/seo-globals-02.png) | ![SEO globals cookie banner](/visuals/screenshots/cookie-banner-config.png) | ![Cookie banner](/visuals/screenshots/cookie-banner.png) |

| Entry specific SEO |
|---|
| ![Page builder](/visuals/screenshots/entry-seo.png) |

## Cookie consent banner

When you use Google Analytics or Google Tag Manager you can enable the cookie consent banner to comply with GPDR. The consent banner uses Google's Consent API so you might need to properly set this up in your GTM/Analytics settings.

Users can specify the type of consent they give (analytics, marketing or both). When consent is given a link will be added to the footer for users to reset their consent.

The cookie banner only blocks Google scripts since it uses the consent API, so if you really want to be a marketing-script-abuser and bug your users with a Facebook pixel or Hotjar, you can be GDPR compliant by running all those scripts through GTM.

> Note: tracking and cookie consent by default only work on the `production` environment. However you can tweak this from the `SEO` global.

## Scripts and consent

If you don't use any form of Google tracking: great job! You can still load in scripts. Set the `Tracker type` to `Scripts` and add your scripts by adding script fragments. The scripts will be loaded in the document head on page load.

When you turn on the cookie banner they will be injected using Javascript only when the user has given consent.
