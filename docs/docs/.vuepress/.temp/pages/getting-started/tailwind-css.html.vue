<template><h1 id="tailwind-css-configuration" tabindex="-1"><a class="header-anchor" href="#tailwind-css-configuration" aria-hidden="true">#</a> Tailwind CSS configuration</h1>
<p>Peak comes with a <code>tailwind.config.js</code> which dictates how Tailwind CSS should be compiled. This file imports multiple Tailwind CSS config files each responsible for various parts of your website. Next to the default config, it uses the following configuration files:</p>
<ol>
<li><code>tailwind.config.typography.js</code>: the Tailwind CSS typography configuration for customizing the <code>prose</code> class.</li>
<li><code>tailwind.config.peak.js</code>: all Peak's configuration, utilities and components.</li>
<li><code>tailwind.config.site.js</code>: your site's configuration. This file would typically include all custom styles and config for the project you're currently working on.</li>
</ol>
<p>All configuration files are fully documented. Read the Tailwind CSS docs on <a href="https://tailwindcss.com/docs/theme/" target="_blank" rel="noopener noreferrer">theme configuration<OutboundLink/></a> for more information.</p>
<p>Peak uses the Tailwind CSS JIT compiler for fast compilation and no differences between your development and production CSS.</p>
<p>Read up on the <a href="https://github.com/tailwindlabs/tailwindcss-forms" target="_blank" rel="noopener noreferrer">Tailwind CSS Forms<OutboundLink/></a> and <a href="https://github.com/tailwindlabs/tailwindcss-typography" target="_blank" rel="noopener noreferrer">Tailwind CSS Typography<OutboundLink/></a> plugins. They're easy to customize and the config file for typography already includes some basic customization so your theme colors are automatically applied. The plugins are easy to remove if you don't want to use them.</p>
<blockquote>
<p>Note: if you don't want to define your custom CSS in Tailwind CSS JS config files you can add it to <code>resources/css/custom.css</code>. Make sure to read up on the use of <a href="https://tailwindcss.com/docs/functions-and-directives#layer" target="_blank" rel="noopener noreferrer">@layer<OutboundLink/></a> to instruct what styles Tailwind CSS should keep or purge. Use whatever method you prefer.</p>
</blockquote>
<p>Peak ships with a few custom Tailwind CSS goodies:</p>
<ul>
<li><code>.break-decent</code>: uses <code>word-break: break-word</code>.</li>
<li><code>supports-backdrop-blur:</code>: a variant to check if the browsers supports backdrop filters (backdrop blur). This way you can do condionally change a background opacity for example using <code>supports-backdrop-blur:bg-opacity-70</code>.</li>
<li>Style file upload form elements by default using your site's theme colors.</li>
</ul>
</template>
