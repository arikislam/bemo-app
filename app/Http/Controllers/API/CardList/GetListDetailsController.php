<?php

namespace App\Http\Controllers\API\CardList;

use App\Http\Controllers\Controller;
use App\Models\CardList;

class GetListDetailsController extends Controller
{
    public function __invoke(\Request $request)
    {
       return CardList::with('cards')->get();
    }
}
