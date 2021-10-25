# Commands

Peak comes with a growing collection of CLI commands to make tedious recurring tasks easier.

## Add Page Builder Block
This command adds a block to the Peak Page Builder and generates the files needed.

Run `php please peak:add-block` to:

* Add a set to the Page Builder replicator in `resources/fieldsets/page_builder.yaml`.
* Create a fieldset for your block in `resources/fieldsets/{file_name}.yaml`.
* Create a partial with default markup and IDE hinting in `resources/views/page_builder/_{file_name}.antlers.html`.

<div class='embed-container'><iframe src='https://www.youtube.com/embed/wW1D53nG61c' frameborder='0' allowfullscreen></iframe></div>

## Add Collection
This command creates a new collection and scaffolds out all needed files with some sane default markup containing the various Peak utilities we use.

Run `php please peak:add-collection` to:

* Create a collection in `content/collections/{handle}.yaml` with the variables you defined in the CLI.
* Create a blueprint for collection in `resources/blueprints/collections/pages/{handle}.yaml` containing the page builder fieldset and the SEO tab when your collection has a public route defined.
* Optionally create an index partial in `resources/views/{handle}/index.antlers.html` with default Peak markup.
* Optionally set the index template to the entry you chose to mount the collection on.
* Optionally create a show partial in `resources/views/{handle}/show.antlers.html` with default Peak markup.
* Optionally add permissions to the `editor` role in `resources/users/roles.yaml`.

<div class='embed-container'><iframe src='https://www.youtube.com/embed/JWVDvTFDvHA' frameborder='0' allowfullscreen></iframe></div>

## Clear site
This command clears the default Peak content.

Run `php please peak:clear-site` to:

* Delete all assets from the default asset container.
* Delete all entries but `home`.
* Clear the pagebuilder for the homepage.
* Clear the social media globals.
* Clear caches.
