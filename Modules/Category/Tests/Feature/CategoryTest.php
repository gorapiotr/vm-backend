<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh --seed');
    }

    /**
     * Get category list
     *
     * @return void
     */
    public function testGetCategoryList()
    {

        $response = $this->get('/api/categories');

        $response->assertStatus(200)
            ->assertJson(
                [
                    'data' => [
                        [
                            'id' => 1,
                            'name' => 'Przygodowe',

                        ],
                        [
                            'id' => 2,
                            'name' => 'Kryminały',

                        ],
                        [
                            'id' => 3,
                            'name' => 'Dramaty',

                        ],
                    ]
                ]
            );
    }
}
