<?php

namespace App\Widgets;

use Statamic\Widgets\Widget;
use Statamic\Facades\Asset;
use \Statamic\Facades\AssetContainer;

class ImagesMissingAlt extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        $assets = Asset::query()
            ->where('container', $this->config('container', 'assets'))
            ->get()
            ->toAugmentedArray();

            // Filter assets without alt text.
            $assets = collect($assets)->filter(function ($item) {
                return ! isset($item['alt']);
            });

        return view('widgets.images-missing-alt', [
            'assets' => $assets->slice(0, $this->config('limit', 5)),
            'amount' => count($assets),
            'container' => AssetContainer::findByHandle($this->config('container', 'assets'))->title(),
        ]);
    }
}
