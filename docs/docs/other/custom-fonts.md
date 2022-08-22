# Custom fonts

Custom fonts don't really have much to do with Peak, but you often need them setup. This is how.

## Convert your font files
If you don't have `.woff` and `.woff2` font files you can convert your licensed or free fonts easily on [fontsquirrel.com](https://www.fontsquirrel.com/tools/webfont-generator). For modern browsers (those that support grid) you really only need `.woff2` files. Including both won't hurt though. The browser only downloads the files it uses.

## Include your fonts
You can place your font files somewhere in the public folder. For example in a `public/fonts/` (doesn't exist by default).

Now it's time to add the `@font-face` rules to your CSS build. You can put it the Tailwind CSS base layer in `resources/css/custom.css`. Let's say we have one font family with two weights, both in italics.

```css
@layer base {
    @font-face {
        font-family: 'awesome';
        src: url('/public/fonts/awesome-regular.woff2') format('woff2'),
            url('/public/fonts/awesome-regular.woff') format('woff');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'awesome';
        src: url('/public/fonts/awesome-regular-italic.woff2') format('woff2'),
            url('/public/fonts/awesome-regular-italic.woff') format('woff');
        font-weight: 400;
        font-style: italic;
        font-display: swap;
    }

    @font-face {
        font-family: 'awesome';
        src: url('/public/fonts/awesome-bold.woff2') format('woff2'),
            url('/public/fonts/awesome-bold.woff') format('woff');
        font-weight: 700;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'awesome';
        src: url('/public/fonts/awesome-bold-italic.woff2') format('woff2'),
            url('/public/fonts/awesome-bold-italic.woff') format('woff');
        font-weight: 700;
        font-style: italic;
        font-display: swap;
    }
}
```
> Note that all font-family share the same name. It's just the properties (weight and style) that change according to the font file being used.

## Configure Tailwind CSS
The default Peak Tailwind CSS configuration assumes you might want to use custom fonts so it's easier to implement them. Let's say our font `awesome` is a sans-serif font and it's the only font we're currently using. The relevant part of the configuration in `tailwind.config.site.js` would look like this:

```js
module.exports = {
  theme: {
    // Remove the font families you don't want to use.
    fontFamily: {
        sans: [
        // Use a custom sans serif font for this site by changing 'Gaultier' to the
        // font name you want and uncommenting the following line.
        'awesome',
        ...defaultTheme.fontFamily.sans,
        ],
    },
    // The font weights available for this site.
    fontWeight: {
        // hairline: 100,
        // thin: 200,
        // light: 300,
        normal: 400,
        // medium: 500,
        // semibold: 600,
        bold: 700,
        // extrabold: 800,
        // black: 900,
    },
  }
}
```
> Note that we *don't* extend the configuration here but rewrite it. That way we only have classes that actually belong to fonts we want to use.

## Using the fonts
In your templates you can now use `font-serif` (with a fallback stack), `font-normal`, `font-bold`, `italic` and `not-italic`.
