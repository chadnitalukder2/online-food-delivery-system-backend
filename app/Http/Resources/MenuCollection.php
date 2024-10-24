<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'MENUS' => $this->collection,
            'menu_meta' => [
                // 'total' => $this->total(),
                'count' => $this->count(),
                // 'current_page' => $this->currentPage(),
                // 'last_page' => $this->lastPage(),
            ]
        ];
    }
}