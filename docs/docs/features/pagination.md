# Pagination

When you're working with the collection tag and want to use [pagination](https://statamic.dev/tags/collection#pagination), just add the pagination partial using `partial:components/pagination` to automagically add pagination buttons. They're easily editable in  `resources/views/components/_pagination.antlers.html`. 

The pagination partial automatically adds linktags to your documents head with `rel="next"` and `rel="prev"`.

> Note: the strings used in the partial are translatable and can be edited in `resources/lang/en/site.php`.