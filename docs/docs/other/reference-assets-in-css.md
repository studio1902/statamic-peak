# Reference assets in CSS

Vite copies over assets to the build folder. In order for Vite to pick up any of your custom assets you want referenced in your CSS file make sure to use absolute URLS.

## CSS example

```css
.test {
    background-image: url('/public/path/to/file.svg');
}
```

## JS example

```js
plugin(function({ addComponents, theme }) {
    const components = {
        '.test': {
            backgroundImage: 'url(/public/path/to/file.svg)',
        },
    }
    addComponents(components)
})
```
