<template><h1 id="buttons" tabindex="-1"><a class="header-anchor" href="#buttons" aria-hidden="true">#</a> Buttons</h1>
<p>The files <code>resources/fieldsets/buttons.yaml</code> and <code>resources/views/components/_buttons.antlers.html</code> go together. The button fieldset is a set in Bard but can also be called from other fieldsets where you want to include buttons. Just call the buttons partial in your template and one or multiple buttons will be rendered.</p>
<table>
<thead>
<tr>
<th>Buttons</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/button.png" alt="Buttons"></td>
</tr>
</tbody>
</table>
<h2 id="rendering-a-single-button" tabindex="-1"><a class="header-anchor" href="#rendering-a-single-button" aria-hidden="true">#</a> Rendering a single button</h2>
<p>In some cases you don't want to render dynamic buttons but a button to a specific entry or URL. This is possible using any of the following methods.</p>
<p>Link to the index page the collection <code>news</code> is mounted on:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:components/button label="All news" link_type="url" url="{mount_url from='news'}" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>Or link to a single entry:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code> {{ partial:components/button label="Read more about this entry" link_type="entry" :entry="entry" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>Or to do fancy Alpine stuff:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:components/button as="button" label="Do this thing" faux="true" inverted="true" attribute="x-data @click.prevent='$dispatch(\"my-event\")'" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div></template>
