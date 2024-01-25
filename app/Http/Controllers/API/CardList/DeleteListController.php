<?php

namespace App\Http\Controllers\API\CardList;

use App\Enums\ResponseCodeEnum as Code;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardListResource;
use App\Models\CardList;
use DB;

class DeleteListController extends Controller
{
    public function __invoke(CardList $cardList)
    {
        DB::beginTransaction();
        try {
            $cardList->cards()->delete();
            $cardList->delete();
            DB::commit();
            $cardLists = CardList::with('cards')->orderBy('order')->get();
            return $this->respondWithResource(CardListResource::collection($cardLists));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondWithError($e->getMessage(), '500', Code::GEN_API_ERROR->value);
        }

    }
}
