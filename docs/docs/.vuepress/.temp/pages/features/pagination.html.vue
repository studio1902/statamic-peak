<template><h1 id="pagination" tabindex="-1"><a class="header-anchor" href="#pagination" aria-hidden="true">#</a> Pagination</h1>
<p>When you're working with the collection tag and want to use <a href="https://statamic.dev/tags/collection#pagination" target="_blank" rel="noopener noreferrer">pagination<OutboundLink/></a>, just add the pagination partial using <code>partial:components/pagination</code> to automagically add pagination buttons. They're easily editable in  <code>resources/views/components/_pagination.antlers.html</code>.</p>
<p>The pagination partial automatically adds linktags to your documents head with <code>rel=&quot;next&quot;</code> and <code>rel=&quot;prev&quot;</code>.</p>
<blockquote>
<p>Note: the strings used in the partial are translatable and can be edited in <code>resources/lang/en/site.php</code>.</p>
</blockquote>
</template>
