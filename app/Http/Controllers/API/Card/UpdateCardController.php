<?php

namespace App\Http\Controllers\API\Card;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\CardList;
use Illuminate\Http\Request;

class UpdateCardController extends Controller
{
    public function __invoke(CardList $cardList, Card $card, Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        $card->fill([
            'title'   => $request->get('title'),
            'details' => $request->get('details'),
        ])->save();

        return $this->respondWithResource(new CardResource($card));
    }
}
