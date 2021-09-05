<template><h1 id="custom-fonts" tabindex="-1"><a class="header-anchor" href="#custom-fonts" aria-hidden="true">#</a> Custom fonts</h1>
<p>Custom fonts don't really have much to do with Peak, but you often need them setup. This is how.</p>
<h2 id="convert-your-font-files" tabindex="-1"><a class="header-anchor" href="#convert-your-font-files" aria-hidden="true">#</a> Convert your font files</h2>
<p>If you don't have <code>.woff</code> and <code>.woff2</code> font files you can convert your licensed or free fonts easily on <a href="https://www.fontsquirrel.com/tools/webfont-generator" target="_blank" rel="noopener noreferrer">fontsquirrel.com<OutboundLink/></a>. For modern browsers (those that support grid) you really only need <code>.woff2</code> files. Including both won't hurt though. The browser only downloads the files it uses.</p>
<h2 id="include-your-fonts" tabindex="-1"><a class="header-anchor" href="#include-your-fonts" aria-hidden="true">#</a> Include your fonts</h2>
<p>You can place your font files somewhere in the public folder. For example in a <code>public/fonts/</code> (doesn't exist by default).</p>
<p>Now it's time to add the <code>@font-face</code> rules to your CSS build. You can put it the Tailwind CSS base layer in <code>resources/css/custom.css</code>. Let's say we have one font family with two weights, both in italics.</p>
<div class="language-css ext-css line-numbers-mode"><pre v-pre class="language-css"><code><span class="token atrule"><span class="token rule">@layer</span> base</span> <span class="token punctuation">{</span>
    <span class="token atrule"><span class="token rule">@font-face</span></span> <span class="token punctuation">{</span>
        <span class="token property">font-family</span><span class="token punctuation">:</span> <span class="token string">'awesome'</span><span class="token punctuation">;</span>
        <span class="token property">src</span><span class="token punctuation">:</span> <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-regular.woff2'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff2'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
            <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-regular.woff'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token property">font-weight</span><span class="token punctuation">:</span> 400<span class="token punctuation">;</span>
        <span class="token property">font-style</span><span class="token punctuation">:</span> normal<span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token atrule"><span class="token rule">@font-face</span></span> <span class="token punctuation">{</span>
        <span class="token property">font-family</span><span class="token punctuation">:</span> <span class="token string">'awesome'</span><span class="token punctuation">;</span>
        <span class="token property">src</span><span class="token punctuation">:</span> <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-regular-italic.woff2'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff2'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
            <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-regular-italic.woff'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token property">font-weight</span><span class="token punctuation">:</span> 400<span class="token punctuation">;</span>
        <span class="token property">font-style</span><span class="token punctuation">:</span> italic<span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token atrule"><span class="token rule">@font-face</span></span> <span class="token punctuation">{</span>
        <span class="token property">font-family</span><span class="token punctuation">:</span> <span class="token string">'awesome'</span><span class="token punctuation">;</span>
        <span class="token property">src</span><span class="token punctuation">:</span> <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-bold.woff2'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff2'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
            <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-bold.woff'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token property">font-weight</span><span class="token punctuation">:</span> 700<span class="token punctuation">;</span>
        <span class="token property">font-style</span><span class="token punctuation">:</span> normal<span class="token punctuation">;</span>
    <span class="token punctuation">}</span>

    <span class="token atrule"><span class="token rule">@font-face</span></span> <span class="token punctuation">{</span>
        <span class="token property">font-family</span><span class="token punctuation">:</span> <span class="token string">'awesome'</span><span class="token punctuation">;</span>
        <span class="token property">src</span><span class="token punctuation">:</span> <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-bold-italic.woff2'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff2'</span><span class="token punctuation">)</span><span class="token punctuation">,</span>
            <span class="token url"><span class="token function">url</span><span class="token punctuation">(</span><span class="token string url">'/fonts/awesome-bold-italic.woff'</span><span class="token punctuation">)</span></span> <span class="token function">format</span><span class="token punctuation">(</span><span class="token string">'woff'</span><span class="token punctuation">)</span><span class="token punctuation">;</span>
        <span class="token property">font-weight</span><span class="token punctuation">:</span> 700<span class="token punctuation">;</span>
        <span class="token property">font-style</span><span class="token punctuation">:</span> italic<span class="token punctuation">;</span>
    <span class="token punctuation">}</span>
<span class="token punctuation">}</span>
</code></pre><div class="line-numbers"><span class="line-number">1</span><br><span class="line-number">2</span><br><span class="line-number">3</span><br><span class="line-number">4</span><br><span class="line-number">5</span><br><span class="line-number">6</span><br><span class="line-number">7</span><br><span class="line-number">8</span><br><span class="line-number">9</span><br><span class="line-number">10</span><br><span class="line-number">11</span><br><span class="line-number">12</span><br><span class="line-number">13</span><br><span class="line-number">14</span><br><span class="line-number">15</span><br><span class="line-number">16</span><br><span class="line-number">17</span><br><span class="line-number">18</span><br><span class="line-number">19</span><br><span class="line-number">20</span><br><span class="line-number">21</span><br><span class="line-number">22</span><br><span class="line-number">23</span><br><span class="line-number">24</span><br><span class="line-number">25</span><br><span class="line-number">26</span><br><span class="line-number">27</span><br><span class="line-number">28</span><br><span class="line-number">29</span><br><span class="line-number">30</span><br><span class="line-number">31</span><br><span class="line-number">32</span><br><span class="line-number">33</span><br></div></div><blockquote>
<p>Note that all font-family share the same name. It's just the properties (weight and style) that change according to the font file being used.</p>
</blockquote>
<h2 id="configure-tailwind-css" tabindex="-1"><a class="header-anchor" href="#configure-tailwind-css" aria-hidden="true">#</a> Configure Tailwind CSS</h2>
<p>The default Peak Tailwind CSS configuration assumes you might want to use custom fonts so it's easier to implement them. Let's say our font <code>awesome</code> is a sans-serif font and it's the only font we're currently using. The relevant part of the configuration in <code>tailwind.config.site.js</code> would look like this:</p>
<div class="language-javascript ext-js line-numbers-mode"><pre v-pre class="language-javascript"><code>module<span class="token punctuation">.</span>exports <span class="token operator">=</span> <span class="token punctuation">{</span>
  theme<span class="token operator">:</span> <span class="token punctuation">{</span>
    <span class="token comment">// Remove the font families you don't want to use.</span>
    fontFamily<span class="token operator">:</span> <span class="token punctuation">{</span>
        sans<span class="token operator">:</span> <span class="token punctuation">[</span>
        <span class="token comment">// Use a custom sans serif font for this site by changing 'Gaultier' to the</span>
        <span class="token comment">// font name you want and uncommenting the following line.</span>
        <span class="token string">'awesome'</span><span class="token punctuation">,</span>
        <span class="token operator">...</span>defaultTheme<span class="token punctuation">.</span>fontFamily<span class="token punctuation">.</span>sans<span class="token punctuation">,</span>
        <span class="token punctuation">]</span><span class="token punctuation">,</span>
    <span class="token punctuation">}</span><span class="token punctuation">,</span>
    <span class="token comment">// The font weights available for this site.</span>
    fontWeight<span class="token operator">:</span> <span class="token punctuation">{</span>
        <span class="token comment">// hairline: 100,</span>
        <span class="token comment">// thin: 200,</span>
        <span class="token comment">// light: 300,</span>
        normal<span class="token operator">:</span> <span class="token number">400</span><span class="token punctuation">,</span>
        <span class="token comment">// medium: 500,</span>
        <span class="token comment">// semibold: 600,</span>
        bold<span class="token operator">:</span> <span class="token number">700</span><span class="token punctuation">,</span>
        <span class="token comment">// extrabold: 800,</span>
        <span class="token comment">// black: 900,</span>
    <span class="token punctuation">}</span><span class="token punctuation">,</span>
  <span class="token punctuation">}</span>
<span class="token punctuation">}</span>
</code></pre><div class="line-numbers"><span class="line-number">1</span><br><span class="line-number">2</span><br><span class="line-number">3</span><br><span class="line-number">4</span><br><span class="line-number">5</span><br><span class="line-number">6</span><br><span class="line-number">7</span><br><span class="line-number">8</span><br><span class="line-number">9</span><br><span class="line-number">10</span><br><span class="line-number">11</span><br><span class="line-number">12</span><br><span class="line-number">13</span><br><span class="line-number">14</span><br><span class="line-number">15</span><br><span class="line-number">16</span><br><span class="line-number">17</span><br><span class="line-number">18</span><br><span class="line-number">19</span><br><span class="line-number">20</span><br><span class="line-number">21</span><br><span class="line-number">22</span><br><span class="line-number">23</span><br><span class="line-number">24</span><br><span class="line-number">25</span><br></div></div><blockquote>
<p>Note that we <em>don't</em> extend the configuration here but rewrite it. That we we only have classes that actually belong to fonts we want to use.</p>
</blockquote>
<h2 id="using-the-fonts" tabindex="-1"><a class="header-anchor" href="#using-the-fonts" aria-hidden="true">#</a> Using the fonts</h2>
<p>In your templates you can now use <code>font-serif</code> (with a fallback stack), <code>font-normal</code>, <code>font-bold</code>, <code>italic</code> and <code>not-italic</code>.</p>
</template>
