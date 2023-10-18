<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class dbTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_db(): void
    {
        $collection = DB::table('users')->select()->where('id', '=', 5)->get();

        self::assertCount(1, $collection);
        $collection->each(function ($ret) {
            Log::info(json_encode($ret));
        });
    }
}
