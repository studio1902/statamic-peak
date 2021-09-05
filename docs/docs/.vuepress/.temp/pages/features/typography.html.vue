<template><h1 id="typography" tabindex="-1"><a class="header-anchor" href="#typography" aria-hidden="true">#</a> Typography</h1>
<p>Peak contains a few basic typography partials in <code>resources/views/typography</code>. Whenever you need to render text in your partial you could call the relevant partial or add a new one. Usually typography styles are shared, so this helps keeping your templates DRY. Let's say we have a block in our page builder with a</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ title }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>field. In the template partial for your block you could do the following:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:typography/h1 :content="block:title" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>This will render the title with the styling defined in <code>typography/h1</code>. This way you ensure the same styling throughout your website without having to add or edit Tailwinds utility classes in multiple template files. Exceptions are possible. You can change the tag, text color and add classes when you need to:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:typography/h1 as="span" color="text-error-600" class="mb-8" :content="block:title" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>Peak comes with a few defaults that are easy to style. Add as many partials your website needs.</p>
</template>
