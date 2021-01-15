<?php

namespace Modules\Category\Presenters;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollectionPresenter extends ResourceCollection
{

    /**
     * Transform the resource into a JSON array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return CategoryInfoPresenter::collection($this->collection)->collection->jsonSerialize();
    }
}
