<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'set_id' => $this->faker->uuid(),
            'name' => $this->faker->sentence(),
            'lang' => 'en',
            'mana_cost' => $this->faker->randomElement([
                '{2}{U}',
                '{2}{G}',
                '{5}{U}{U}',
                '{4}{U}',
                '{3}',
            ]),
            'cmc' => $this->faker->numberBetween(0, 10),
            'power' => $this->faker->numberBetween(1, 10),
            'toughness' => $this->faker->numberBetween(1, 10),
            'type_line' => 'Creature - Laravel Nerd',
            'oracle_text' => $this->faker->sentence(),
            'flavor_text' => $this->faker->randomElement([
                null,
                'To live is to risk it all; otherwise you\'re just an inert chunk of randomly assembled molecules drifting wherever the universe blows you.',
                'Wubba Lubba Dub Dub!'
            ]),
            'layout' => 'normal',
            'released_at' => now()->toDateTimeString()
        ];
    }
}
