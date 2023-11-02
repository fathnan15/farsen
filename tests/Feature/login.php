<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class login extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = factory('App\User')->create();

        $hasUser = $user ? true : false;

        $this->assertTrue($hasUser);

        $response = $this->actingAs($user)->get('/home');
    }
}
