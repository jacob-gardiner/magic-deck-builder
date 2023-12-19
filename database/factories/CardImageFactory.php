<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardImage>
 */
class CardImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_id' => Card::factory(),
            'type' => 'png',
            'uri' => $this->faker->randomElement([
                'https://cards.scryfall.io/png/front/0/6/06be8262-4636-4a2c-a0c8-de741cf45aed.png?1696638321',
                'https://cards.scryfall.io/png/front/1/b/1bb24fc7-785d-4fa6-8da3-99a9a726bb12.png?1675618544',
                'https://cards.scryfall.io/png/front/0/1/01b186af-8825-4257-80fd-9c1ecdb21414.png?1625978253',
            ])
        ];
    }
}
