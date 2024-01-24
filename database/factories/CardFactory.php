<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\CardList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition(): array
    {
        $randomCardList = CardList::inRandomOrder()->first();
        return [
            'title'        => $this->faker->sentence(),
            'details'      => $this->faker->paragraph(),
            'order'        => $this->faker->randomNumber(),
            'card_list_id' => $randomCardList->id,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];
    }
}
