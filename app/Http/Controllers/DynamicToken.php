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
        if (config('app.env') != 'local')
        {
            $referer = request()->headers->get('referer');
            $startWithAppUrl = starts_with($referer, config('app.url'));
            if (empty($referer) || !$startWithAppUrl) {
                abort(404);
            }
        }

        return csrf_token();
    }
}
