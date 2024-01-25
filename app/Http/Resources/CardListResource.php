<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\CardList */
class CardListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id,
            'title'  => $this->title,
            'order'  => $this->order,
            'status' => $this->status,
            'cards'  => CardResource::collection($this->cards)
        ];
    }
}
