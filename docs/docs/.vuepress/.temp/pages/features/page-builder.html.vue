<template><h1 id="page-builder" tabindex="-1"><a class="header-anchor" href="#page-builder" aria-hidden="true">#</a> Page builder</h1>
<p>While you could make different templates for all your page types, the idea is to make pages as modular as possible. Every unique element of your website could be a partial and a dedicated button in the page builder.</p>
<p>If the layout of a page is totally different - or you really want to - you can always opt for using templates.</p>
<table>
<thead>
<tr>
<th>Page builder</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/page-builder.png" alt="Page builder"></td>
</tr>
</tbody>
</table>
<h2 id="adding-blocks" tabindex="-1"><a class="header-anchor" href="#adding-blocks" aria-hidden="true">#</a> Adding blocks</h2>
<p>Edit <code>resources/fieldsets/page_builder.yaml</code> to add blocks (preferably imports) to the fieldset. In <code>resources/views/default.antlers.html</code> you can see the blocks being loaded. Antlers will look in the <code>resources/views/page_builder/</code> folder for partials with the handle of your block.</p>
<p>Peak ships with the following blocks:</p>
<ul>
<li>Article (<RouterLink to="/features/bard.html">long form content</RouterLink>)</li>
<li>Call to action (title, text and a button)</li>
<li>Collection (title and links to other entries)</li>
<li><RouterLink to="/features/forms.html">Forms</RouterLink></li>
<li>Link blocks (blocks with a title and text that link to other entries)</li>
</ul>
<p>For example if you add a fieldset to the <code>page_builder.yaml</code> with the handle <code>call_to_action</code> make sure you add a <code>_call_to_action.antlers.html</code> file to the <code>resources/views/page_builder</code> folder.</p>
<blockquote>
<p>Note: blocks are scoped under <code>block</code> to avoid collision with other fields. Make sure you reference variables in a block like this:</p>
</blockquote>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ block:field_name }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>Alternatively you can use the generate block command in Peak. Run <code>php please peak:add-block</code> and follow the instrutions by filling in a name, a filename and a fieldset instruction. All the files needed will be generated and the block will be added to the <code>page_builder.yaml</code> file.</p>
</template>
