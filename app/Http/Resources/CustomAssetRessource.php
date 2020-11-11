<?php

namespace App\Http\Resources;

use Statamic\Http\Resources\API\AssetResource;

class CustomAssetRessource extends AssetResource
{
    public function toArray($request)
    {
        dump($this->resource->data());
        return $this->resource
            ->toAugmentedCollection()
            ->withShallowNesting()
            ->toArray();
    }
}
