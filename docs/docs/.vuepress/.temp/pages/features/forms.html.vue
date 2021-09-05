<template><h1 id="forms" tabindex="-1"><a class="header-anchor" href="#forms" aria-hidden="true">#</a> Forms</h1>
<p>Peak renders forms and mail templates dynamically so you can add as many forms as you'd like, just by creating them in the CP. Peak ships with a default basic contact form you can edit using the following files:</p>
<ul>
<li><code>resources/forms/contact.yaml</code> The contact form configuration.</li>
<li><code>resources/blueprints/forms/contact.yaml</code> The forms blueprint defining all the fields.</li>
<li><code>resources/views/page_builder/_form.antlers.html</code> The forms template file.</li>
<li><code>resources/views/email/form_owner.html</code> The forms email template that goes out to the site owner. The <code>_text.html</code> version contains the text template.</li>
<li><code>resources/views/email/form_sender.html</code> The forms email template that goes out to the sender of the form. The <code>_text.html</code> version contains the text template.</li>
<li><code>resources/lang/en.json</code>. Strings file containing the the form's localizable field labels.</li>
<li><code>resources/lang/en/site.php</code> Strings file containing the e-mail's localizable body contents and logo image location.</li>
</ul>
<p>The default contact form has a required consent field. The fiels handle is <code>consent</code>. Due to restraints the form template contains a conditional that depens on this specific handle name. Don't use it for other form fields.</p>
<p>The forms sending is done with fetch and uses Alpine to display the various notifications.</p>
<blockquote>
<p>Note: Peak dynamically fetches a CSRF token, so you can use forms with <a href="https://statamic.dev/static-caching" target="_blank" rel="noopener noreferrer">Static File Caching<OutboundLink/></a> enabled. This technique is based on the <a href="https://statamic.com/addons/mykolas-mankevicius/dynamic-token" target="_blank" rel="noopener noreferrer">Dynamic Token<OutboundLink/></a> addon for Statamic v2 by Mykolas. It's ported to v3 and included with Peak. You can hook in on fetching a dynamic token by using <code>window.getToken()</code> in your (Alpine) JavaScript.</p>
</blockquote>
<blockquote>
<p>Note: When using BrowserSync and visit your site by means of an IP adress as url; You'll get an 500-error upon submitting the form. This is caused by Statamic's FormController which identifies your Site by means of the FQDN listed in <code>config/statamic/sites.php</code>. As you visit the website through an IP adress this lookup will fail, resulting in the said 500 <code>Call to a member function shortLocale() on null</code> error.</p>
</blockquote>
<table>
<thead>
<tr>
<th>Forms backend</th>
<th>Forms frontend</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src="/visuals/screenshots/forms-backend.png" alt="Forms backend"></td>
<td><img src="/visuals/screenshots/forms-frontend.png" alt="Forms frontend"></td>
</tr>
</tbody>
</table>
</template>
