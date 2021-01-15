<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh --seed');
    }

    /**
     * Get book list
     *
     * @return void
     */
    public function testGetBookList()
    {

        $response = $this->get('/api/books');

        $response->assertStatus(200)
            ->assertJson(
                [
                    'data' => [
                        [
                            'id' => 1,
                            'name' => 'Lord of the Rings the Fellowship of the Ring',
                            'isbn' => "978-83-7181-510-2"
                        ], [
                            'id' => 2,
                            'name' => "Harry Potter and the Philosopher's Stone",
                            'isbn' => "978-3-16-148410-0"
                        ]
                    ]
                ]
            );
    }

    /**
     * Insert new book
     *
     * @return void
     */
    public function testInsertBookList()
    {
        $insertData = [
            'name' => 'The Sandman: Book of Dreams',
            'isbn' => '978-3-16-148410-9'
        ];

        $response = $this->post('/api/books', $insertData);

        $response->assertStatus(201)
            ->assertJson(
                [
                    'data' => [
                        'name' => $insertData['name'],
                        'isbn' => $insertData['isbn']
                    ],
                    'success' => true
                ]
            );
    }
}
