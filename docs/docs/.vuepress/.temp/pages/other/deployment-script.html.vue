<template><h1 id="deployment-script" tabindex="-1"><a class="header-anchor" href="#deployment-script" aria-hidden="true">#</a> Deployment script</h1>
<p>You can use the following deployment script together with Peak to make sure everything runs smoothly after a deploy.</p>
<div class="language-bash ext-sh line-numbers-mode"><pre v-pre class="language-bash"><code>php artisan cache:clear <span class="token comment"># Clear the Laravel application cache.</span>
php artisan config:cache <span class="token comment"># Clear and refresh the Laravel config cache.</span>
php artisan route:cache <span class="token comment"># Clear and refresh the Laravel route cache.</span>
php artisan statamic:stache:warm <span class="token comment"># Warm the Statamic stache.</span>
php please search:update --all <span class="token comment"># Update the search index.</span>
php artisan statamic:static:clear <span class="token comment"># Clear the Statamic static cache (if you use this).</span>
php artisan statamic:static:warm <span class="token comment"># Warm the Statamic static cache (if you use this).</span>
php artisan statamic:assets:generate-presets <span class="token comment"># Generate all asset presets.</span>
</code></pre><div class="line-numbers"><span class="line-number">1</span><br><span class="line-number">2</span><br><span class="line-number">3</span><br><span class="line-number">4</span><br><span class="line-number">5</span><br><span class="line-number">6</span><br><span class="line-number">7</span><br><span class="line-number">8</span><br></div></div></template>
