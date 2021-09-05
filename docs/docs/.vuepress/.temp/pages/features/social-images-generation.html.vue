<template><h1 id="social-images-generation" tabindex="-1"><a class="header-anchor" href="#social-images-generation" aria-hidden="true">#</a> Social images generation</h1>
<blockquote>
<p>You need to manually enable this feature.</p>
</blockquote>
<p>Peak can generate your social sharing images (OG and Twitter) and add them to your entries. To use this feature you need to <a href="https://github.com/spatie/browsershot" target="_blank" rel="noopener noreferrer">install Browsershot<OutboundLink/></a> and its dependencies. A big thanks to <a href="http://spatie.be" target="_blank" rel="noopener noreferrer">Spatie<OutboundLink/></a> and <a href="https://github.com/puppeteer/puppeteer/" target="_blank" rel="noopener noreferrer">Puppeteer<OutboundLink/></a>!</p>
<h2 id="installation-and-configuration" tabindex="-1"><a class="header-anchor" href="#installation-and-configuration" aria-hidden="true">#</a> Installation and configuration</h2>
<p>On your development machine you can do this by running the following commands:</p>
<div class="language-bash ext-sh line-numbers-mode"><pre v-pre class="language-bash"><code><span class="token function">composer</span> require spatie/browsershot
<span class="token function">npm</span> <span class="token function">install</span> puppeteer --global
</code></pre><div class="line-numbers"><span class="line-number">1</span><br><span class="line-number">2</span><br></div></div><p>Once you've installed the required software you can enable the functionality in the SEO globals -&gt; Social Sharing. Make sure to flick on the switch and select each collection for which you want to enable auto generated social images.</p>
<p>Finally uncomment the Social Images Route in <code>routes/web.php</code>.</p>
<p>Edit <code>resources/views/social_images.antlers.html</code> to determine how the images should look. You can go wild with Antlers and Tailwind CSS and add any field you'd like to use. If you want to preview the images in your browser visit <code>http://yoursite.test/social-images/{id}</code>.</p>
<h2 id="redis-as-queue-driver" tabindex="-1"><a class="header-anchor" href="#redis-as-queue-driver" aria-hidden="true">#</a> Redis as queue driver</h2>
<p>The actual generation of the images is a job, so it's queued when you use Redis. To enable Redis as a queue driver make sure it's installed on your server. When you use Ploi or Forge this is done automatically.</p>
<p>Enable Redis by setting <code>QUEUE_CONNECTION=redis</code> in your <code>.env</code> file. Make sure you start a queue worker in Ploi or Forge for your current site. Use <code>redis</code> as a connection and set the current <code>environment</code>.</p>
<h2 id="generate-the-images" tabindex="-1"><a class="header-anchor" href="#generate-the-images" aria-hidden="true">#</a> Generate the images</h2>
<p>Once you've opted in the collections you want this available for you can select the entries you want to generate images for in the collection view.</p>
<table>
<thead>
<tr>
<th>Global configuration</th>
<th>Generating the images</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/social-images-01.png" alt="Forms backend"></td>
<td><img src="/visuals/screenshots/social-images-02.png" alt="Forms frontend"></td>
</tr>
</tbody>
</table>
<h2 id="listable-columns" tabindex="-1"><a class="header-anchor" href="#listable-columns" aria-hidden="true">#</a> Listable columns</h2>
<p>Note that you could opt to toggle the <code>Social image</code> and <code>Twitter image</code> fields listable in the collections list view. That way you can or your client an easily scan collections for missing images.</p>
<table>
<thead>
<tr>
<th>Listable columns</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/social-images-03.png" alt="Listable columns"></td>
</tr>
</tbody>
</table>
<h2 id="remove-feature" tabindex="-1"><a class="header-anchor" href="#remove-feature" aria-hidden="true">#</a> Remove feature</h2>
<p>By default the toggle to turn this feature on is only visibles to superusers. However if you completely want to remove this feature do the following:</p>
<ul>
<li>Delete the <code>toggle</code> and <code>collections</code> from <code>resources/blueprints/globals/seo.yaml</code></li>
<li>Delete the action <code>app/Actions/GenerateSocialImages.php</code>.</li>
<li>Delete the job <code>app/Jobs/GenerateSocialImagesJob.php</code>.</li>
<li>Delete the template <code>social_images.antlers.html</code>.</li>
<li>Delete the route from <code>routes/web.php</code>.</li>
</ul>
</template>
