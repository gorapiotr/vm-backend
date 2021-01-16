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
            'isbn' => '978-3-16-148410-9',
            'categories' => [1, 2]
        ];

        $response = $this->post('/api/books', $insertData);

        $response->assertStatus(201)
            ->assertJson(
                [
                    'data' => [
                        'name' => $insertData['name'],
                        'isbn' => $insertData['isbn'],
                        'categories' => [
                            [
                                'id' => 1,
                                'name' => 'Przygodowe'
                            ], [
                                'id' => 2,
                                'name' => 'Kryminały'
                            ]
                        ]
                    ],
                    'success' => true
                ]
            );
    }

    /**
     * Test isbn validation unique
     *
     * @return void
     */
    public function testBookIsbnValidation() {

        $insertData = [
            'name' => 'The Sandman: Book of Dreams',
            'isbn' => '978-3-16-148410-9',
            'categories' => [1, 2]
        ];

        $this->post('/api/books', $insertData);
        $response = $this->post('/api/books', $insertData);


        $response->assertSessionHasErrors('isbn');
    }


    /**
     * Test book categories validation
     *
     * @return void
     */
    public function testBookCategoriesValidation() {

        $insertData = [
            'name' => 'The Sandman: Book of Dreams',
            'isbn' => '978-3-16-148410-9',
            'categories' => [1, 4]
        ];

        $this->post('/api/books', $insertData);
        $response = $this->post('/api/books', $insertData);


        $response->assertSessionHasErrors('categories.*');
    }

    /**
     * Test edit book
     *
     * @return void
     */
    public function testEditBook() {
        $insertData = [
            'name' => 'The Sandman',
            'isbn' => '978-3-16-143310-1',
            'categories' => [1, 2]
        ];

        $response = $this->put('/api/books/'. 1, $insertData);

        $response->assertStatus(200);
    }

    /**
     * Test edit book validation
     *
     * @return void
     */
    public function testEditBookValidation() {
        $insertData = [
            'name' => 'The Sandman',
            'isbn' => '978-3-16-143310-1',
            'categories' => [1, 2]
        ];

        $response = $this->put('/api/books/'. 1, $insertData);

        $response->assertStatus(200);
    }

    /**
     * Test delete book
     *
     * @return void
     */
    public function testDeleteBook() {
        $response = $this->delete('/api/books/1');

        $response->assertStatus(200);
    }

    /**
     * Test delete not exist book
     *
     * @return void
     */
    public function testDeleteNotExistBook() {
        $response = $this->delete('/api/books/999');

        $response->assertStatus(404);
    }
}
