<?php

namespace App\Http\Controllers\API\Card;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\CardList;
use Illuminate\Http\Request;

class UpdateCardOrderController extends Controller
{
    public function __invoke(CardList $cardList, Request $request)
    {
            foreach ($request->get('data') as $card) {
                $cardList->cards()->find($card['id'])->update([
                    'order' => $card['order'],
                ]);
            }

            $cards = $cardList->cards()->orderBy('order')->get();
            return $this->respondWithResource(CardResource::collection($cards));
    }
}
