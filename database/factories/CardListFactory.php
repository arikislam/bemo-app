<?php

namespace Database\Factories;

use App\Models\CardList;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CardListFactory extends Factory
{
    protected $model = CardList::class;

    public function definition(): array
    {
        return [
            'title'        => $this->faker->sentence(),
            'order'        => $this->faker->randomNumber(),
            'status'       => $this->faker->randomElement([0, 1]),
        ];
    }
}
