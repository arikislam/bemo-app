<?php

namespace App\Http\Controllers\API\CardList;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardListResource;
use App\Models\CardList;
use Illuminate\Http\Request;

class UpdateLIstOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!blank($data = $request->get('data'))) {
            foreach ($data as $list) {
                $cardList = CardList::find($list['id']);
                if (!blank($cardList)) {
                    $cardList->update(['order' => $list['order']]);
                }
            }
        }

        $cardLists = CardList::with('cards')->orderBy('order')->get();

        return $this->respondWithResource(CardListResource::collection($cardLists));
    }
}
