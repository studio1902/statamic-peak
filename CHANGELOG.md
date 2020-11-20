# Release Notes

## Unreleased

### What's improved
- Hide contact form success message after 2500secs. Thanks Frederik!
- Don't let the site be indexed when not in production. Thanks Frederik!
- Improve basic form styling.

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
