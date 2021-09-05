<template><h1 id="dark-mode" tabindex="-1"><a class="header-anchor" href="#dark-mode" aria-hidden="true">#</a> Dark mode</h1>
<blockquote>
<p>You need to manually enable this feature.</p>
</blockquote>
<p>In Tailwind CSS you can enable <a href="https://tailwindcss.com/docs/dark-mode" target="_blank" rel="noopener noreferrer">default dark mode<OutboundLink/></a> by uncommenting <code>darkMode: 'media',</code> in <code>tailwind.config.js</code>. This way your website will react to the users OS wide <code>prefers-color-scheme</code>.</p>
<p>If you want to use <a href="https://tailwindcss.com/docs/dark-mode#toggling-dark-mode-manually" target="_blank" rel="noopener noreferrer">class based dark mode<OutboundLink/></a> you should do the following:</p>
<ol>
<li>Uncomment <code>darkMode: 'class'</code> in <code>tailwind.config.js</code>.</li>
<li>Add</li>
</ol>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:components/dark_mode_toggle }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>to the <code>&lt;head&gt;</code> in <code>resources/views/layout.antlers.html</code>.</p>
<ol start="3">
<li>Add</li>
</ol>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ yield:dark_mode_toggle }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>as the last list item in the main ul in <code>resources/views/navigation/_main.antlers.html</code>.</p>
</template>
