<?php

namespace Tests\Feature\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConvertDatabaseColumnNamesTest extends TestCase
{
    public function it_renames_the_columns_on_the_specified_table()
    {
        self::markTestSkipped('TODO');
    }

    public function it_requires_a_table_name_to_be_passed()
    {
        self::markTestSkipped('TODO');
    }
}
