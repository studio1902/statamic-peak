# Tags

## Mount URL
Peak adds a tag to get a collections mount URL. So you can use the following to generate a `View all news articles` link for example.
```html
{{ mount_url from="news" }}
```

Thanks [Simon Bédard](https://statamic.com/forum/4925-get-url-of-page-with-mounted-collection).

You can combine this with the button partial like this:
```html
 {{ partial:components/button label="{trans:strings.news_all}" button_type="inline" link_type="url" url="{mount_url from='news'}" }}
```
