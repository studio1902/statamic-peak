# Statamic 3.3

If you want to migrate existing Peak sites to Statamic 3.3, in addition to the [Runtime parser](/getting-started/runtime-parser.html) please change the following. 

### Control panel forms now only submit visible fields

From the Statamic Docs:

```
Control Panel forms now only submit visible fields (as originally intended) which fixes `sometimes` / `required_if` / etc. validation rules, among other things.

This could potentially be a breaking change if you were using field conditions purely for cosmetic showing/hiding of form fields.
```

The button fieldset in Peak relied on this unintended use of conditionally hiding fields. To fix this replace your (vanilla) Peak button fieldset (`resources/fieldsets/button.yaml`) with this [updated file](https://github.com/studio1902/statamic-peak/blob/main/resources/fieldsets/button.yaml).
