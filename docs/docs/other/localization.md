# Localization and template strings

All strings in templates use the 

```html
{{ trans:strings_file.string_id }}
```
pattern to call the 

```html
{{ trans }}
```
tag and get the correct translation for the current site. Learn more in the [Statamic docs on the translate tag](https://statamic.dev/tags/trans#content).

It is currently not possible in Statamic to translate field labels and descriptions so I settled for English. Translate the labels and descriptions in all fieldsets (`resources/fieldsets/*.yaml`) and follow the [the instructions in the Statamic documentation](https://statamic.dev/cp-translations#content) to make the Statamic CP available in your language of choice.