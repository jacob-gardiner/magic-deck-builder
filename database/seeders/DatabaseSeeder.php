<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        DB::unprepared(file_get_contents(app_path('../database/seeders/magic_deck_builder_cards.sql')));
        DB::unprepared(file_get_contents(app_path('../database/seeders/magic_deck_builder_card_images.sql')));
    }
}
