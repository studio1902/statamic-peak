<template><h1 id="redirects" tabindex="-1"><a class="header-anchor" href="#redirects" aria-hidden="true">#</a> Redirects</h1>
<p>There is Redirects global where you can define your 301 and 302 redirects. This only kicks in when a 404 error is triggered as all logic is being done in <code>resources/views/errors/404.antlers.html</code>.</p>
<blockquote>
<p>Note: by default only <code>superusers</code> and the <code>marketeer</code> role get access to this feature.</p>
</blockquote>
<p>You can also use this feature to make temporariy vanity urls. So you can make <code>mywebsite.com/promo</code> redirect to <code>mywebsite.com/blog/this-is-what-we-have-to-offer</code>. Make sure you use a 302 status code for this.</p>
<blockquote>
<p>Note: alternatively you could use the fantastic <a href="https://github.com/riasvdv/statamic-redirect" target="_blank" rel="noopener noreferrer">Redirect<OutboundLink/></a> by <a href="https://github.com/riasvdv" target="_blank" rel="noopener noreferrer">Rias<OutboundLink/></a>. It's very feature rich and even tracks 404 errors you can easily setup redirects for those as well.</p>
</blockquote>
</template>
