# Runtime parser

In addition to these [required changes](/getting-started/statamic-3.3.html) for Statamic 3.3, if you want to migrate existing Peak sites to the runtime parser, know you usually only have to do three things:

## Update your form field templates
Change:
```html
{{ old ?= value="{old}" }}
```
to:
```html
{{ old ?= 'value="{old}"' }}
```

The original syntax is simply wrong. It should not have worked in the regex parser but it did due to a bug.

## Don't use double curly braces in tags
While in a recent update to the runtime parser double curly braces within tags are allowed, it is not recommended. Don't use double curly braces when `{{ }}` when inside a tag. Change it to single curly braces: `{ }`. This should’ve never worked, but it did and even opened up possibilities when using the regex parser so it's widely used.

## Disambiguate asset variable
Disambiguate the variable `asset` in `resources/views/snippets/_button_attributes.antlers.html` on line 15 by prefixing it with a dollar like this: `$asset`. The Runtime parser gives the `asset` tag first priority.
