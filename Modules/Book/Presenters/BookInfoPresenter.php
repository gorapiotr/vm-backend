<?php

namespace Modules\Book\Presenters;

use Illuminate\Http\Resources\Json\JsonResource;

class BookInfoPresenter extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'isbn' => $this->isbn
        ];
    }
}
