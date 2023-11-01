<?php

namespace App\Listeners;

use Statamic\Facades\Collection;
use Statamic\Events\EntryDeleting;

class PreventDeletingMounts
{
    /**
     * Handle the event.
     */
    public function handle(EntryDeleting $event): void
    {
        if (Collection::findByMount($event->entry)) {
            throw new \Exception(trans('strings.collection_mounted', ['title' => $event->entry['title']]));
        }
    }
}
