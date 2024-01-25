<?php

namespace App\Http\Controllers\API\CardList;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardListResource;
use App\Models\CardList;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetListDetailsController extends Controller
{
    public function __invoke(Request $request)
    {
        $dateFilter = $request->input('date');
        $statusFilter = $request->input('status');

        $query= CardList::with('cards')->orderBy('order');
        if ($dateFilter) {
            $startTime = Carbon::parse($dateFilter)->startOfDay();
            $endTime = Carbon::parse($dateFilter)->endOfDay();
            $query->whereBetween('created_at', [$startTime, $endTime]);
        }

        if ($statusFilter !== null) {
            $query->where('status', $statusFilter);
        }

        $cardList = $query->get();

        return $this->respondWithResource(CardListResource::collection($cardList));

    }
}
