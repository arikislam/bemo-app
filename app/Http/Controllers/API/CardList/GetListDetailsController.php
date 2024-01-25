<?php

namespace App\Http\Controllers\API\CardList;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardListResource;
use App\Models\CardList;

class GetListDetailsController extends Controller
{
    public function __invoke(\Request $request)
    {
        $cardList = CardList::with('cards')->orderBy('order')->get();
        return $this->respondWithResource(CardListResource::collection($cardList));

    }
}
