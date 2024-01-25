<?php

namespace App\Http\Controllers\API\Card;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\CardList;
use Illuminate\Http\Request;

class CreateCardController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'details' => 'required|string|max:255',
        ]);
        $cardList= CardList::findOrfail($request->get('list_id'));
        $card = $cardList->cards()->create([
            'title'   => $request->get('title'),
            'details' => $request->get('details'),
        ]);

        return $this->respondWithResource(new CardResource($card));
    }
}
