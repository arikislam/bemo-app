<?php

namespace Database\Seeders;

use App\Models\CardList;
use Illuminate\Database\Seeder;

class CardListSeeder extends Seeder
{
    public function run(): void
    {
        CardList::factory()
            ->count(4)
            ->create();
    }
}
