<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        // インデックスへ遷移できるか
        $response = $this->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('index')
            ->assertSee('Select Shop TOKYO');
    }
}
