# Commands

Peak comes with a growing collection of CLI commands to make tedious recurring tasks easier.

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

## Add Page Builder Block
This command adds a block to the Peak Page Builder and generates the files needed.

Run `php please peak:add-block` to:

* Add a set to the Page Builder replicator in `resources/fieldsets/page_builder.yaml`.
* Create a fieldset for your block in `resources/fieldsets/{file_name}.yaml`.
* Create a partial with default markup and IDE hinting in `resources/views/page_builder/_{file_name}.antlers.html`.

<div class='embed-container'><iframe src='https://www.youtube.com/embed/wW1D53nG61c' frameborder='0' allowfullscreen></iframe></div>

## Add Page Builder Article Set
This command adds a set to the Peak Page Builder Article (Bard) block and generates the files needed.

Run `php please peak:add-set` to:

* Add a set to the Article Bard in `resources/fieldsets/article.yaml`.
* Create a fieldset for your set in `resources/fieldsets/{file_name}.yaml`.
* Create a component partial with default markup and IDE hinting in `resources/views/components/_{file_name}.antlers.html`.

## Add Partial
With this command you can choose a type (component/layout) and add a name and description. It will generate a partial with the proper IDE hinting and location comments.

Run `php please peak:add-partial`.

## Clear site
This command clears the default Peak content.

Run `php please peak:clear-site` to:

* Delete all assets from the default asset container.
* Delete all entries but `home`.
* Clear the pagebuilder for the homepage.
* Clear the social media globals.
* Clear caches.

## Install Page Builder Block
This command installs a premade block to the Peak Page Builder and generates the files needed.

Run `php please peak:install-block` to pick a block and:

* Add a set to the Page Builder replicator in `resources/fieldsets/page_builder.yaml`.
* Create a fieldset for the installed block in `resources/fieldsets/{file_name}.yaml`.
* Create a partial with bespoke markup in `resources/views/page_builder/_{file_name}.antlers.html`.

## Install Preset
This command installs a presets into Peak. A preset can be anything. By default you can install a `news` and an `events` collection that installs the relevant blueprints, templates, configuration, pages and page builder blocks into your site. You can also install features like FAQ, Modals, Theme toggle (dark mode), Search, Language picker and Breadcrumbs.

Run `php please peak:install-preset` to pick a set.
