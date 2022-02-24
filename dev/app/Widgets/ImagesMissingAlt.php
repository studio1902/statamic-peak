<?php

namespace App\Widgets;

use Statamic\Widgets\Widget;

class ImagesMissingAlt extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        $assets = \Statamic\Facades\Asset::query()
            ->where('container', 'assets')
            ->get()
            ->toAugmentedArray();

            // Filter assets without alt text.
            $assets = collect($assets)->filter(function ($item) {
                return ! isset($item['alt']);
            });

        return view('widgets.images-missing-alt', [
            'assets' => $assets,
            'amount' => count($assets),
        ]);
    }
}
