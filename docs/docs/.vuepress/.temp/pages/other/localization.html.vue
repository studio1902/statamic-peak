<template><h1 id="localization-and-template-strings" tabindex="-1"><a class="header-anchor" href="#localization-and-template-strings" aria-hidden="true">#</a> Localization and template strings</h1>
<p>All strings in templates use the</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ trans:strings_file.string_id }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>pattern to call the</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ trans }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>tag and get the correct translation for the current site. Learn more in the <a href="https://statamic.dev/tags/trans#content" target="_blank" rel="noopener noreferrer">Statamic docs on the translate tag<OutboundLink/></a>.</p>
<p>It is currently not possible in Statamic to translate field labels and descriptions so I settled for English. Translate the labels and descriptions in all fieldsets (<code>resources/fieldsets/*.yaml</code>) and follow the <a href="https://statamic.dev/cp-translations#content" target="_blank" rel="noopener noreferrer">the instructions in the Statamic documentation<OutboundLink/></a> to make the Statamic CP available in your language of choice.</p>
</template>
