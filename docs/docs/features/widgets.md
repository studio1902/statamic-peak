# Widgets

Peak contains a widget to display images in asset containers that miss alt text. This helps your clients awareness on the importance of a11y. By default this widget will be added to your dashboard. If you want to add widgets for other asset containers, add the following to the `widgets` array in `config/statamic/cp.php`:

```php
[
    'type' => 'images_missing_alt',
    'container' => 'assets', // The handle of your asset container.
    'limit' => 5, // The maximum amount of images without alt text you want displayed at once.
    'width' => 50
],
```
