<template><h1 id="browser-appearance" tabindex="-1"><a class="header-anchor" href="#browser-appearance" aria-hidden="true">#</a> Browser appearance</h1>
<p>Peak adds a <code>Browser appearance</code> global where you can set multiple browser specific properties and generate favicons.</p>
<h2 id="general-settings" tabindex="-1"><a class="header-anchor" href="#general-settings" aria-hidden="true">#</a> General settings</h2>
<p>You can set the following properties/meta-tags:</p>
<ul>
<li>Disable telephone detection.</li>
<li>Disable e-mail detection.</li>
<li>Disable address detection.</li>
<li>Use theme color property (regular and for optional dark mode).</li>
<li>Run as Apple mobile web app (and change status bar color).</li>
<li>Run as Android mobile web app.</li>
</ul>
<table>
<thead>
<tr>
<th>Browser appearance</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/browser-appearance.png" alt="Browser appearance"></td>
</tr>
</tbody>
</table>
<h2 id="favicons" tabindex="-1"><a class="header-anchor" href="#favicons" aria-hidden="true">#</a> Favicons</h2>
<p>By uploading a single favicon SVG to the favicons asset container you can generate favicons for modern browsers on the fly. The favicon partial will spit out the following favicons:</p>
<ul>
<li>The SVG you uploaded as a <code>rel=&quot;icon&quot;</code>.</li>
<li>The SVG you uploaded with a custom color attribute as a <code>rel=&quot;mask-icon&quot;</code>.</li>
<li>A PNG with a custom colored background as a <code>rel=&quot;apple-touch-icon</code>.</li>
<li>A <code>site.webmanifest</code> route with a manifest file containing a <code>android-chrome-512x512.png</code>.</li>
<li>A meta with <code>name=&quot;theme-color&quot;</code> with a custom color.</li>
</ul>
<blockquote>
<p>Note: To use the favicon feature you need to have the <code>PHP Imagick module</code> installed. Forge users: newer servers ship with this automatically. Ploi users: you can optionally install this with a click in the Ploi interface.</p>
</blockquote>
<table>
<thead>
<tr>
<th>Favicons</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/favicons.png" alt="Favicons"></td>
</tr>
</tbody>
</table>
</template>
