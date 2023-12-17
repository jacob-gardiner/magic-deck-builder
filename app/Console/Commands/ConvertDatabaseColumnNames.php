<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ConvertDatabaseColumnNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:convert-column-names';

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
        $table = 'cards';

        $columns = DB::table('information_schema.columns')
            ->where('table_schema', 'magic_deck_builder')
            ->where('table_name', $table)
            ->get();

//        DB::transaction(function () use ($table, $columns) {
            $columns->each(function ($column) use ($table) {
                Schema::table($table, function (Blueprint $table) use ($column) {
                    $table->renameColumn($column->COLUMN_NAME, Str::snake($column->COLUMN_NAME));
                });
            });
//        });
    }
}
