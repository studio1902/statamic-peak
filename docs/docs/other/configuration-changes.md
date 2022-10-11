# Configuration changes

Peak changes the default Statamic config. The following is different:

| File | Default | Peak |
| --- | --- | --- |
| `.env.example` |  | Add more default Statamic and Redis settings by default.
| `app/Console/Kernel.php` |  | Add a schedule you can invoke via a cron to warm all caches.
| `app/Console/Commands/AddBlock.php` |  | A command to generate all files needed to [add a block to the page builder](/features/commands.html#add-page-builder-block).
| `app/Console/Commands/AddCollection.php` |  | A command to generate all files needed to [add a collection](/features/commands.html#add-collection).
| `app/Console/Commands/AddPartial.php` |  | A command to generate all files needed to [add a partial](/features/commands.html#add-partial).
| `app/Console/Commands/AddSet.php` |  | A command to generate all files needed to [add a set to the page builder article](/features/commands.html#add-page-builder-article-set).
| `app/Console/Commands/ClearSite.php` |  | A command to [clear all default Peak content](/features/commands.html#clear-site).
| `app/Console/Commands/InstallBlock.php` |  | A command to [install premade blocks](/features/commands.html#install-page-builder-block).
| `app/Console/Commands/stubs/` |  | Stub files for the various Peak commands.
| `app/Actions/GenerateSocialImages.php` |  | An action to [generate social images](/features/social-images-generation.html) for entries.
| `app/Http/Controllers/DynamicToken.php` |  | New Controller for [forms](/features/forms.html) |
| `app/Jobs/GenerateSocialImagesJob.php` |  | The acutal job to [generate social images](/features/social-images-generation.html) for entries.
| `app/listeners/GenerateFavicons.php` |  | Listen to a GlobalSavedEvent to generate [favicons](/features/browser-appearance.html).
| `app/providers/AppServiceProvider.php` |  | Enables the use of a section field in the form builder.
| `app/providers/AppServiceProvider.php` |  | Adds 404 page entry data to the 404 template when an error hits.
| `app/providers/EventServiceProvider.php` |  | Listen to a GlobalSavedEvent to generate [favicons](/features/browser-appearance.html).
| `app/Widgets/ImagesMissingAlt.php` |  | New widget to [display assets with missing alt texts](/features/widgets.html). |
| `content/assets/favicons.yaml` |  | An asset container where the [automated favicon feature](/features/browser-appearance.html) stores it's favicons in. |
| `config/filesystems.php` |  | Filesystems for the Favicon and Social Images assets. |
| `config/ignition.php` | `'editor' => env('IGNITION_EDITOR', 'phpstorm')` | `'editor' => env('IGNITION_EDITOR', 'vscode')` |
| `config/ignition.php` | `'theme' => env('IGNITION_THEME', 'light')` | `'theme' => env('IGNITION_THEME', 'auto')` |
| `config/statamic/antlers.php` | `version' => 'regex'` | `'version' => 'runtime'` |
| `config/statamic/assets.php` | `driver' => 'gd'` | `'driver' => env('IMAGE_MANIPULATION_DRIVER', 'gd')` |
| `config/statamic/assets.php` | `'cache' => false` | `'cache' => env('SAVE_CACHED_IMAGES', true),` |
| `config/statamic/cp.php` | A getting started widget | Add alt text and page collection widgets. |
| `config/statamic/cp.php` | `'link_to_docs' => true` | `'link_to_docs' => false` |
| `config/statamic/editions.php` | `'pro' -> false` | `'pro' -> true` |
| `config/statamic/git.php` |  | Add `[BOT]` to git commit message. |
| `config/statamic/git.php` |  | Add `favicons` and `social_images` paths to Git tracking. |
| `config/statamic/live_preview.php` | Three breakpoints | All tailwinds breakpoints defined in `tailwind.config.js` |
| `config/statamic/search.php` | `title` in search index | `title`, and `page_builder` in search index |
| `config/statamic/stache.php` | `'watcher' => true` | `'watcher' => env('STATAMIC_STACHE_WATCHER', true)` |
| `config/statamic/static_caching.php` | `'rules' => [ // ]` | `'rules' => 'all'` |
| `config/statamic/static_caching.php` | `'exclude' => [ // ]` | `'exclude' => '/sitemap.xml'` |
| `config/statamic/users.php` | `'avatars' => 'initials'` | `'avatars' => 'gravatar'` |
| `resources/views/widgets/images-missing-alt.blade.php` |  | | `app/Widgets/ImagesMissingAlt.php` |  | New widget to [display assets with missing alt texts](/features/widgets.html). |
| `routes/web.php` |  | Routes for the [favicons](/features/browser-appearance.html) feature.
| `routes/web.php` |  | Routes for the search [functionality](/features/search.html). Commented by default.
| `routes/web.php` |  | Routes for the sitemap and [dynamic form](/features/forms.html) token.
