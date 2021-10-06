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
        $referer = request()->headers->get('referer');
        $contains = str_contains($referer, request()->getHttpHost());
        if (empty($referer) || !$contains) {
            abort(404);
        }

        return response()->json([
            'csrf_token' => csrf_token()
        ]);
    }
}
