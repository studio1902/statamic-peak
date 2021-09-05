# Browser appearance

Peak adds a `Browser appearance` global where you can set multiple browser specific properties and generate favicons.

## General settings
You can set the following properties/meta-tags:

* Disable telephone detection.
* Disable e-mail detection.
* Disable address detection.
* Use theme color property (regular and for optional dark mode).
* Run as Apple mobile web app (and change status bar color).
* Run as Android mobile web app.

| Browser appearance |
|---|
| ![Browser appearance](/visuals/screenshots/browser-appearance.png) |

## Favicons
By uploading a single favicon SVG to the favicons asset container you can generate favicons for modern browsers on the fly. The favicon partial will spit out the following favicons:

* The SVG you uploaded as a `rel="icon"`.
* The SVG you uploaded with a custom color attribute as a `rel="mask-icon"`.
* A PNG with a custom colored background as a `rel="apple-touch-icon`.
* A `site.webmanifest` route with a manifest file containing a `android-chrome-512x512.png`.
* A meta with `name="theme-color"` with a custom color.

> Note: To use the favicon feature you need to have the `PHP Imagick module` installed. Forge users: newer servers ship with this automatically. Ploi users: you can optionally install this with a click in the Ploi interface.

| Favicons |
|---|
| ![Favicons](/visuals/screenshots/favicons.png) |
