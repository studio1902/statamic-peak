<template><h1 id="search" tabindex="-1"><a class="header-anchor" href="#search" aria-hidden="true">#</a> Search</h1>
<blockquote>
<p>You need to manually enable this feature.</p>
</blockquote>
<p>Statamic comes with great search functionality out of the box. If you want to use this you have to do some configuration and templating work. Peak comes with basic search support you can easily customize to suit your needs. To enable default search do the following:</p>
<ul>
<li>Add</li>
</ul>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:components/search_form }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>as the last list item in the main ul in <code>resources/views/navigation/_main.antlers.html</code>.</p>
<ul>
<li>Uncomment the search results route  in <code>routes/web.php</code>.</li>
<li>Add fields you want indexed to the index in <code>config/statamic/search.php</code>. The <code>page_builder</code> field is added by default.</li>
<li>Update the search index by running <code>php please search:update --all</code>.</li>
<li>Make sure you add the update command to your <RouterLink to="/other/deployment-script.html">deployment script</RouterLink>.</li>
</ul>
<blockquote>
<p>Note: the strings used in search form and result templates are translatable and can be edited in <code>resources/lang/en/site.php</code>.</p>
</blockquote>
<blockquote>
<p>Note: alternatively you could use <a href="https://github.com/jonassiewertsen/statamic-live-search" target="_blank" rel="noopener noreferrer">Live Search<OutboundLink/></a> by <a href="https://github.com/jonassiewertsen/statamic-live-search" target="_blank" rel="noopener noreferrer">Jonas Siewertsen<OutboundLink/></a>. It uses Laravel Livewire to get live search results as you type. It's very easy to implement.</p>
</blockquote>
</template>
