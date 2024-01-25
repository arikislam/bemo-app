<?php

namespace App\Http\Controllers\API\CardList;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardListResource;
use App\Models\CardList;
use Illuminate\Http\Request;


class CreateNewListController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $cardList = CardList::create([
            'title' => $request->get('title'),
        ]);

        $cardLists = CardList::with('cards')->orderBy('order')->get();
        return $this->respondWithResource(CardListResource::collection($cardLists));
    }
}
