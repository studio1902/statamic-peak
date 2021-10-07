<template><h1 id="configuration-changes" tabindex="-1"><a class="header-anchor" href="#configuration-changes" aria-hidden="true">#</a> Configuration changes</h1>
<p>Peak changes the default Statamic config. The following is different:</p>
<table>
<thead>
<tr>
<th>File</th>
<th>Default</th>
<th>Peak</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>.env.example</code></td>
<td></td>
<td>Add more default Statamic and Redis settings by default.</td>
</tr>
<tr>
<td><code>app/Console/Kernel.php</code></td>
<td></td>
<td>Add a schedule you can invoke via a cron to warm all caches.</td>
</tr>
<tr>
<td><code>app/Console/Commands/AddBlock.php</code></td>
<td></td>
<td>A command to generate all files needed to add a block to the <RouterLink to="/features/page-builder.html#adding-blocks">page builder</RouterLink>.</td>
</tr>
<tr>
<td><code>app/Console/Commands/AddBlock.php</code></td>
<td></td>
<td>A command to generate all files needed to add a block to the <RouterLink to="/features/page-builder.html#adding-blocks">page builder</RouterLink>.</td>
</tr>
<tr>
<td><code>app/Console/Commands/stubs/block.html.stub</code></td>
<td></td>
<td>A stub file for the <code>peak:add-block</code> command.</td>
</tr>
<tr>
<td><code>app/Console/Commands/stubs/fieldset.yaml.stub</code></td>
<td></td>
<td>A stub file for the <code>peak:add-block</code> command.</td>
</tr>
<tr>
<td><code>app/Actions/GenerateSocialImages.php</code></td>
<td></td>
<td>An action to <RouterLink to="/features/social-images-generation.html">generate social images</RouterLink> for entries.</td>
</tr>
<tr>
<td><code>app/Http/Controllers/DynamicToken.php</code></td>
<td></td>
<td>New Controller for <RouterLink to="/features/forms.html">forms</RouterLink></td>
</tr>
<tr>
<td><code>app/Http/Middleware/VerifyCsrfToken.php</code></td>
<td><code>protected $except = []</code></td>
<td><code>protected $except = ['/!/DynamicToken']</code></td>
</tr>
<tr>
<td><code>app/Jobs/GenerateSocialImagesJob.php</code></td>
<td></td>
<td>The acutal job to <RouterLink to="/features/social-images-generation.html">generate social images</RouterLink> for entries.</td>
</tr>
<tr>
<td><code>app/listeners/GenerateFavicons.php</code></td>
<td></td>
<td>Listen to a GlobalSavedEvent to generate <RouterLink to="/features/browser-appearance.html">favicons</RouterLink>.</td>
</tr>
<tr>
<td><code>app/providers/EventServiceProvider.php</code></td>
<td></td>
<td>Listen to a GlobalSavedEvent to generate <RouterLink to="/features/browser-appearance.html">favicons</RouterLink>.</td>
</tr>
<tr>
<td><code>app/Tags/MountUrl.php</code></td>
<td></td>
<td>New Tag to get a mount url <RouterLink to="/other/tags.html">tags</RouterLink></td>
</tr>
<tr>
<td><code>app/Tags/ScopeValue.php</code></td>
<td></td>
<td>New Tag to scope a value <RouterLink to="/other/tags.html">tags</RouterLink></td>
</tr>
<tr>
<td><code>content/assets/favicons.yaml</code></td>
<td></td>
<td>An asset container where the <RouterLink to="/features/browser-appearance.html">automated favicon feature</RouterLink> stores it's favicons in.</td>
</tr>
<tr>
<td><code>config/filesystems.php</code></td>
<td></td>
<td>Filesystems for the Favicon and Social Images assets.</td>
</tr>
<tr>
<td><code>config/statamic/assets.php</code></td>
<td><code>driver' =&gt; 'gd'</code></td>
<td><code>'driver' =&gt; env('IMAGE_MANIPULATION_DRIVER', 'gd')</code></td>
</tr>
<tr>
<td><code>config/statamic/assets.php</code></td>
<td><code>'cache' =&gt; false</code></td>
<td><code>'cache' =&gt; env('SAVE_CACHED_IMAGES', true),</code></td>
</tr>
<tr>
<td><code>config/statamic/assets.php</code></td>
<td><code>'presets' =&gt; []</code></td>
<td>Contains a whole bunch of asset presets.</td>
</tr>
<tr>
<td><code>config/statamic/cp.php</code></td>
<td>A getting started widget</td>
<td>A page collection widget</td>
</tr>
<tr>
<td><code>config/statamic/cp.php</code></td>
<td><code>'link_to_docs' =&gt; true</code></td>
<td><code>'link_to_docs' =&gt; false</code></td>
</tr>
<tr>
<td><code>config/statamic/editions.php</code></td>
<td><code>'pro' -&gt; false</code></td>
<td><code>'pro' -&gt; true</code></td>
</tr>
<tr>
<td><code>config/statamic/git.php</code></td>
<td></td>
<td>Add <code>[BOT]</code> to git commit message.</td>
</tr>
<tr>
<td><code>config/statamic/git.php</code></td>
<td></td>
<td>Add <code>favicons</code> and <code>social_images</code> paths to Git tracking.</td>
</tr>
<tr>
<td><code>config/statamic/live_preview.php</code></td>
<td>Three breakpoints</td>
<td>All tailwinds breakpoints defined in <code>tailwind.config.js</code></td>
</tr>
<tr>
<td><code>config/statamic/search.php</code></td>
<td><code>title</code> in search index</td>
<td><code>title</code>, and <code>page_builder</code> in search index</td>
</tr>
<tr>
<td><code>config/statamic/stache.php</code></td>
<td><code>'watcher' =&gt; true</code></td>
<td><code>'watcher' =&gt; env('STATAMIC_STACHE_WATCHER', true)</code></td>
</tr>
<tr>
<td><code>config/statamic/static_caching.php</code></td>
<td><code>'rules' =&gt; [ // ]</code></td>
<td><code>'rules' =&gt; 'all'</code></td>
</tr>
<tr>
<td><code>config/statamic/static_caching.php</code></td>
<td><code>'exclude' =&gt; [ // ]</code></td>
<td><code>'exclude' =&gt; '/sitemap.xml'</code></td>
</tr>
<tr>
<td><code>config/statamic/users.php</code></td>
<td><code>'avatars' =&gt; 'initials'</code></td>
<td><code>'avatars' =&gt; 'gravatar'</code></td>
</tr>
<tr>
<td><code>routes/web.php</code></td>
<td></td>
<td>Routes for the <RouterLink to="/features/browser-appearance.html">favicons</RouterLink> feature.</td>
</tr>
<tr>
<td><code>routes/web.php</code></td>
<td></td>
<td>Routes for the search <RouterLink to="/features/search.html">functionality</RouterLink>. Commented by default.</td>
</tr>
<tr>
<td><code>routes/web.php</code></td>
<td></td>
<td>Routes for the sitemap and <RouterLink to="/features/forms.html">dynamic form</RouterLink> token.</td>
</tr>
</tbody>
</table>
</template>
