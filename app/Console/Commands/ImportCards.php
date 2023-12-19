<?php

namespace App\Console\Commands;

use App\Models\Card;
use App\Models\CardImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use JsonMachine\Items;
use Throwable;

class ImportCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import-cards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Loading file');

        $cards = Items::fromFile(Storage::path('data/all-cards.json'));

        $this->line('Beginning Import');

        foreach ($cards as $card) {
            try {
                if ($card->lang !== 'en') {
                    continue;
                }

                Card::insert([
                    'id' => $card->id,
                    'set_id' => $card->set_id,
                    'name' => $card->name,
                    'lang' => $card->lang,
                    'mana_cost' => $card->mana_cost ?? null,
                    'cmc' => $card->cmc ?? null,
                    'power' => $card->power ?? null,
                    'toughness' => $card->toughness ?? null,
                    'type_line' => $card->type_line ?? null,
                    'oracle_text' => $card->oracle_text ?? null,
                    'flavor_text' => $card->flavor_text ?? null,
                    'layout' => $card->layout,
                    'released_at' => $card->released_at,
                ]);

                collect($card?->image_uris ?? null)->each(function ($image, $type) use ($card) {
                    CardImage::insert([
                        'card_id' => $card->id,
                        'type' => $type,
                        'uri' => $image
                    ]);
                });
            } catch (Throwable $_) {
                $this->error("Error: Inserting {$card->name}");
            }
        }
    }
}
