<template><h1 id="tags" tabindex="-1"><a class="header-anchor" href="#tags" aria-hidden="true">#</a> Tags</h1>
<h2 id="mount-url" tabindex="-1"><a class="header-anchor" href="#mount-url" aria-hidden="true">#</a> Mount URL</h2>
<p>Peak adds a tag to get a collections mount URL. So you can use the following to generate a <code>View all news articles</code> link for example.</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ mount_url from="news" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>Thanks <a href="https://statamic.com/forum/4925-get-url-of-page-with-mounted-collection" target="_blank" rel="noopener noreferrer">Simon Bédard<OutboundLink/></a>.</p>
<p>You can combine this with the button partial like this:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code> {{ partial:components/button label="{trans:strings.news_all}" button_type="inline" link_type="url" url="{mount_url from='news'}" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><h2 id="scope-value" tabindex="-1"><a class="header-anchor" href="#scope-value" aria-hidden="true">#</a> Scope value</h2>
<p>There is a <code>{{ scope_value }}</code> tag you can use to get a fields value when the fields name is actually a variable. This is used in the SEO partial.</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ scope_value :var="field_handle" as="field_value" }}
    {{ field_value | trim | truncate:157:... }}
{{ /scope_value }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br><span class="line-number">2</span><br><span class="line-number">3</span><br></div></div><p>Thanks <a href="https://stillat.com" target="_blank" rel="noopener noreferrer">John Koster<OutboundLink/></a>.</p>
</template>
