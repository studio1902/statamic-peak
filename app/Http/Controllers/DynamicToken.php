<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DynamicToken extends Controller
{
     /**
     * Get refreshed CSRF token.
     *
     * @return string
     */
    public function getRefresh(Request $request)
    {
        // Determine if the request is actually coming from our own website on non local enviroments.
        if (env('APP_ENV') != 'local')
        {
            $referer = request()->headers->get('referer');
            $startWithAppUrl = starts_with($referer, env('APP_URL'));
            if (empty($referer) || !$startWithAppUrl) {
                abort(404);
            }
        }

        return csrf_token();
    }
}