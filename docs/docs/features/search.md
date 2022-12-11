# Search

> You need to install the search preset and manually enable this feature.

Statamic comes with great search functionality out of the box. If you want to use this you have to do some configuration and templating work. Peak comes with basic search support you can easily customize to suit your needs. To enable default search do the following:

* Add
```html
{{ partial:components/search_form }}
```
as the last list item in the main ul in `resources/views/navigation/_main.antlers.html`.
* Uncomment the search results route  in `routes/web.php`.
* Add fields you want indexed to the index in `config/statamic/search.php`. The `page_builder` field is added by default.
* Update the search index by running `php please search:update --all`.
* Make sure you add the update command to your [deployment script](/other/deployment-script.html).

> Note: the strings used in search form and result templates are translatable and can be edited in `resources/lang/en/site.php`.

> Note: alternatively you could use [Live Search](https://github.com/jonassiewertsen/statamic-live-search) by [Jonas Siewertsen](https://github.com/jonassiewertsen/statamic-live-search). It uses Laravel Livewire to get live search results as you type. It's very easy to implement.
