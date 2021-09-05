<template><h1 id="bard" tabindex="-1"><a class="header-anchor" href="#bard" aria-hidden="true">#</a> Bard</h1>
<p>For long form content you can use the <code>Article</code> content block. This is a <a href="https://statamic.dev/fieldtypes/bard#content" target="_blank" rel="noopener noreferrer">Bard fieldtype<OutboundLink/></a> with multiple sets of fields that are regularly used in longer articles.</p>
<h2 id="adding-sets" tabindex="-1"><a class="header-anchor" href="#adding-sets" aria-hidden="true">#</a> Adding sets</h2>
<p>Edit <code>resources/fieldsets/article.yaml</code> to add sets (preferably imports) to the article. In <code>resources/views/page_builder/_article.antlers.html</code> you can see the sets being loaded. Antlers will look in the <code>resources/views/components/</code> folder for partials with the handle of your set.</p>
<p>For example if you add a fieldset to the <code>article.yaml</code> with the handle <code>code</code> make sure you add a <code>_code.antlers.html</code> file to the <code>resources/views/components</code> folder.</p>
<blockquote>
<p>Note: sets are scoped under <code>set</code> to avoid collision with other fields. Make sure you reference variables in a block like this:</p>
</blockquote>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ set:field_name }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><h2 id="sizing-utilities" tabindex="-1"><a class="header-anchor" href="#sizing-utilities" aria-hidden="true">#</a> Sizing utilities</h2>
<p>An article goes into a CSS Grid with 12 columns. By default all sets get the class <code>size-md</code>. As you can see in <code>tailwind.config.js</code> on mobile this means those elements span 12 columns. On larger screens however they just span 6 columns (centered). There are other sizing utilities as well:</p>
<ul>
<li><em>size-sm</em>: 12 columns on mobile, 4 columns from medium screens up</li>
<li><em>size-md</em>: 12 columns on mobile, 6 columns from medium screens up</li>
<li><em>size-lg</em>: 12 columns on mobile, 8 columns from medium screens up</li>
<li><em>size-xl</em>: 12 columns on mobile, 10 columns from medium screens up</li>
</ul>
<p>For example use the sizing utilities to let an image break out of it's content. In sets like <code>figure</code> and <code>video</code> the user can pick their own size using the <code>size</code> field in <code>resources/fieldsets/common.yaml</code>.</p>
<blockquote>
<p>Note: the layout doesn't have to be centered and is easy to change in the <code>tailwind.config.js</code> file.</p>
</blockquote>
<table>
<thead>
<tr>
<th>Bard sizing utilities</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/bard.png" alt="Bard sizing utilities"></td>
</tr>
</tbody>
</table>
</template>
