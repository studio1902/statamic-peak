<template><h1 id="assets" tabindex="-1"><a class="header-anchor" href="#assets" aria-hidden="true">#</a> Assets</h1>
<h2 id="images" tabindex="-1"><a class="header-anchor" href="#images" aria-hidden="true">#</a> Images</h2>
<p>Peak comes with a picture partial that will add responsive sourcesets to your images. The variants generated are defined in <code>config/statamic/assets.php</code> and cover most use cases. In <code>resources/views/components/_figure.antlers.html</code> you can see an example of how to include the picture partial. It accepts the following arguments:</p>
<ul>
<li><code>image</code>: <em>asset</em>, the actual image variable.</li>
<li><code>class</code>: <em>string</em>, optional css classes that should be applied to the image.</li>
<li><code>cover</code>: <em>boolean</em>, true means the image should cover the containing element.</li>
<li><code>sizes</code>: <em>string</em>, the sizes attribute that informs the browser how the image should be rendered.</li>
</ul>
<p>The following example renders an image and object-fills it's wrapping container:</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:components/picture :image="image" cover="true" sizes="(min-width: 768px) 35vw, 90vw" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>See <a href="https://studio1902.nl/blog/responsive-images-with-statamic-tailwind-and-glide/" target="_blank" rel="noopener noreferrer">this article<OutboundLink/></a> for more information.</p>
<blockquote>
<p>Note: alternatively you could use the fantastic <a href="https://github.com/spatie/statamic-responsive-images" target="_blank" rel="noopener noreferrer">Responsive Images Addon<OutboundLink/></a> by <a href="https://github.com/riasvdv" target="_blank" rel="noopener noreferrer">Rias<OutboundLink/></a> from Spatie. It features more asset presets and uses Javascript to auto populate your <code>sizes</code> attribute.</p>
</blockquote>
<h2 id="background-images" tabindex="-1"><a class="header-anchor" href="#background-images" aria-hidden="true">#</a> Background images</h2>
<p>Peak comes with a background image snippet you can use to apply responsive images (WebP included) to an elements background. Just use</p>
<div class="language-html ext-html line-numbers-mode"><pre v-pre class="language-html"><code>{{ partial:snippets/background_image image="YOUR_IMAGE" class="CLASS_OF_ELEMENT_THAT_NEEDS_BG_IMAGE" }}
</code></pre><div class="line-numbers"><span class="line-number">1</span><br></div></div><p>The predefined sizes used in <code>resources/views/snippets/_background_image.antlers.html</code> are defined in <code>config/statamic/assets.php</code>.</p>
<blockquote>
<p>Note: You can use either a hardcoded image or an image from an asset field.</p>
</blockquote>
</template>
