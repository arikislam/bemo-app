<?php

namespace App\Http\Controllers\API\Card;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\CardList;
use Illuminate\Http\Request;

class MoveCardController extends Controller
{
    public function __invoke(CardList $cardList, Card $card, Request $request)
    {
        $updatedOrder = $request->get('order');
        $card->update([
            'card_list_id' => $cardList->id,
            'order' => $updatedOrder,
        ]);

        $cardList->cards()
            ->where('id', '!=', $card->id)
            ->where('order', '>', $updatedOrder-1)
            ->increment('order');

        return $this->respondWithResource(new CardResource($card));
    }
}
