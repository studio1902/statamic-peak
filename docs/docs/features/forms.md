# Forms

Peak renders forms and mail templates dynamically so you can add as many forms as you'd like, just by creating them in the CP. Peak ships with a default basic contact form you can edit using the following files:

* `resources/forms/contact.yaml` The contact form configuration.
* `resources/blueprints/forms/contact.yaml` The forms blueprint defining all the fields.
* `resources/views/page_builder/_form.antlers.html` The forms template file.
* `resources/views/email/form_owner.html` The forms email template that goes out to the site owner. The `_text.html` version contains the text template.
* `resources/views/email/form_sender.html` The forms email template that goes out to the sender of the form. The `_text.html` version contains the text template.
* `resources/lang/en.json`. Strings file containing the the form's localizable field labels.
* `resources/lang/en/strings.php` Strings file containing the e-mail's localizable body contents and logo image location.

The default contact form has a required consent field. The field handle is `consent`. Due to restraints the form template contains a conditional that depends on this specific handle name. Don't use it for other form fields.

The Peak form templates support the built in Statamic Alpine conditional logic driver.

The forms sending is done with fetch and uses Alpine to display the various notifications.

> Note: Peak dynamically fetches a CSRF token, so you can use forms with [Static File Caching](https://statamic.dev/static-caching) enabled. This technique is based on the [Dynamic Token](https://statamic.com/addons/mykolas-mankevicius/dynamic-token) addon for Statamic v2 by Mykolas. It's ported to v3 and included with Peak. You can hook in on fetching a dynamic token by using `window.getToken()` in your (Alpine) JavaScript.

> Note: When using BrowserSync and visit your site by means of an IP adress as url; You'll get an 500-error upon submitting the form. This is caused by Statamic's FormController which identifies your Site by means of the FQDN listed in `config/statamic/sites.php`. As you visit the website through an IP adress this lookup will fail, resulting in the said 500 `Call to a member function shortLocale() on null` error.

| Forms backend | Forms frontend  |
|---|---|
| ![Forms backend](/visuals/screenshots/forms-backend.png) | ![Forms frontend](/visuals/screenshots/forms-frontend.png) |

## Conditional logic
The Peak form component and published field views support the AlpineJS driven [conditional fields feature](https://statamic.dev/tags/form-create#conditional-fields) added in Statamic 3.3
