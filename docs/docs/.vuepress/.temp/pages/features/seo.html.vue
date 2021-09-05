<template><h1 id="seo" tabindex="-1"><a class="header-anchor" href="#seo" aria-hidden="true">#</a> SEO</h1>
<p>Peak includes full SEO support. It's easy to expand on since it's all built with native fields and templating. You can also easily replace it with a third party addon like <a href="https://statamic.com/addons/candour/aardvark-seo" target="_blank" rel="noopener noreferrer">Aardvark SEO<OutboundLink/></a> or a first party aeddon like <a href="https://statamic.com/addons/statamic/seo-pro" target="_blank" rel="noopener noreferrer">SEO Pro<OutboundLink/></a>. However this implementation is already pretty full featured.</p>
<h2 id="seo-features" tabindex="-1"><a class="header-anchor" href="#seo-features" aria-hidden="true">#</a> SEO features</h2>
<ul>
<li>Page title.</li>
<li>Website title and seperator.</li>
<li>Meta description.</li>
<li>Canonical URL.</li>
<li>Open Graph data and image.</li>
<li>Default Open Graph image.</li>
<li>Twitter card and image.</li>
<li>Default Twitter card image.</li>
<li>Auto generated sitemap.xml.</li>
<li>Customize the sitemap: which collections are included and per entry frequency and priority settings.</li>
<li>No-index for entries, also excludes from sitemap.</li>
<li>JSON-ld schema objects.</li>
<li>Hreflang tags automatically generated.</li>
<li>Knowledge graph data (organization, person or custom).</li>
<li>JSON-ld breadcrumbs.</li>
<li>Trackers: Google Analytics, Google Tag Manager, Site Verification, Fathom or Cloudflare Web Analytics.</li>
<li>Cookie Consent Banner.</li>
</ul>
<blockquote>
<p>Note: by default only <code>superusers</code> and the <code>marketeer</code> role get access to the SEO global configuration.</p>
</blockquote>
<table>
<thead>
<tr>
<th>Globals error messages</th>
<th>Globals SEO</th>
<th>Globals Cookie Banner</th>
<th>Cookie Banner</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/seo-globals-01.png" alt="SEO globals JSON-ld"></td>
<td><img src="/visuals/screenshots/seo-globals-02.png" alt="SEO globals sitemap"></td>
<td><img src="/visuals/screenshots/cookie-banner-config.png" alt="SEO globals cookie banner"></td>
<td><img src="/visuals/screenshots/cookie-banner.png" alt="Cookie banner"></td>
</tr>
</tbody>
</table>
<table>
<thead>
<tr>
<th>Entry specific SEO</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/entry-seo.png" alt="Page builder"></td>
</tr>
</tbody>
</table>
<h2 id="cookie-consent-banner" tabindex="-1"><a class="header-anchor" href="#cookie-consent-banner" aria-hidden="true">#</a> Cookie consent banner</h2>
<p>When you use Google Analytics or Google Tag Manager you can enable the cookie consent banner to comply with GPDR. The consent banner uses Google's Consent API so you might need to properly set this up in your GTM/Analytics settings.</p>
<p>Users can specify the type of consent they give (analytics, marketing or both). When consent is given a link will be added to the footer for users to reset their consent.</p>
<p>The cookie banner only blocks Google scripts since it uses the consent API, so if you really want to be a marketing-script asshole and bug your users with a Facebook pixel or Hotjar, you can be GDPR compliant by running all those scripts through GTM.</p>
<blockquote>
<p>Note: tracking and cookie consent by default only work on the <code>production</code> environment.</p>
</blockquote>
</template>
