# Configuration changes

Peak changes the default Statamic config. The following is different:

| File | Default | Peak |
| --- | --- | --- |
| `.env.example` |  | Add more default Statamic and Redis settings by default.
| `app/console/Kernel.php` |  | Add a schedule you can invoke via a cron to warm all caches.
| `app/Actions/GenerateSocialImages.php` |  | An action to [generate social images](/features/social-images-generation.html) for entries.
| `app/Http/Controllers/DynamicToken.php` |  | New Controller for [forms](/features/forms.html) |
| `app/Http/Middleware/VerifyCsrfToken.php` | `protected $except = []` | `protected $except = ['/!/DynamicToken']` |
| `app/Jobs/GenerateSocialImagesJob.php` |  | The acutal job to [generate social images](/features/social-images-generation.html) for entries.
| `app/listeners/GenerateFavicons.php` |  | Listen to a GlobalSavedEvent to generate [favicons](/features/browser-appearance.html).
| `app/providers/EventServiceProvider.php` |  | Listen to a GlobalSavedEvent to generate [favicons](/features/browser-appearance.html).
| `app/Tags/MountUrl.php` |  | New Tag to get a mount url [tags](/other/tags.html) |
| `app/Tags/ScopeValue.php` |  | New Tag to scope a value [tags](/other/tags.html) |
| `content/assets/favicons.yaml` |  | An asset container where the [automated favicon feature](/features/browser-appearance.html) stores it's favicons in. |
| `config/filesystems.php` |  | Filesystems for the Favicon and Social Images assets. |
| `config/statamic/assets.php` | `driver' => 'gd'` | `'driver' => env('IMAGE_MANIPULATION_DRIVER', 'gd')` |
| `config/statamic/assets.php` | `'cache' => false` | `'cache' => env('SAVE_CACHED_IMAGES', true),` |
| `config/statamic/assets.php` | `'presets' => []` | Contains a whole bunch of asset presets. |
| `config/statamic/cp.php` | A getting started widget | A page collection widget |
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
| `routes/web.php` |  | Routes for the [favicons](/features/browser-appearance.html) feature.
| `routes/web.php` |  | Routes for the search [functionality](/features/search.html). Commented by default.
| `routes/web.php` |  | Routes for the sitemap and [dynamic form](/features/forms.html) token.
