<?php

namespace App\Tags;

use Statamic\Tags\Tags;

class DynamicToken extends Tags
{
    /**
     * The {{ dynamic_token }} tag.
     * Inserts JS which will add tokens to all forms that have an input with `name="_token"`.
     * Refresh the token every 15 minutes.
     * @return string
     */
    public function index()
    {
        $route = '/!/DynamicToken/refresh';
        $selector = 'form input[name="_token"]';
        $minutes = 15;

        return "
            <script>
                if (document.querySelectorAll('{$selector}').length > 0) {
                    function httpGetAsync(theUrl, callback) {
                        var xmlHttp = new XMLHttpRequest();
                        xmlHttp.onreadystatechange = function() {
                        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                            callback(xmlHttp.responseText);
                        };
                        xmlHttp.open('GET', theUrl, true); // true for asynchronous
                        xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        xmlHttp.send(null);
                    }

                    function setToken(token) {
                        document
                        .querySelectorAll('{$selector}')
                        .forEach(function(item) {
                            item.value = token;
                        });
                    }

                    function updateToken() {
                        httpGetAsync('{$route}', setToken);
                    }

                    updateToken();

                    setInterval(updateToken, {$minutes} * 60 * 1000);
                }
            </script>
        ";
    }
}