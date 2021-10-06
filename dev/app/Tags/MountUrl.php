<?php

namespace App\Tags;

use Statamic\Facades\Collection;
use Statamic\Tags\Tags;

class MountUrl extends Tags
{
    /**
     * The {{ mount_url }} tag.
     *
     * @return string|array
     */
    public function index()
    {
        /*
        * Get the collection name from the tag
        */
        $collectionName  = $this->params->get('from');
        $collection = Collection::findByHandle($collectionName);
        return ($collection)? $collection->url() : null;
    }
}
