<?php

namespace Modules\Book\Presenters;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollectionPresenter extends ResourceCollection
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
        return BookInfoPresenter::collection($this->collection)->collection->jsonSerialize();
    }
}
