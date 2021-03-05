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
                    async function setToken() {
                        let token = await fetch('/!/DynamicToken/refresh')
                            .then((res) => res.json())
                            .then((data) => { 
                                return data.csrf_token 
                            })
                            .catch(function (error) {
                                console.error('Error:', error)
                            })
                        document.querySelectorAll('{$selector}').forEach(function(item) {
                            item.value = token
                        });
                    }
            
                    setToken()
            
                    setInterval(setToken, {$minutes} * 60 * 1000)
                }
            </script>
        ";
    }
}