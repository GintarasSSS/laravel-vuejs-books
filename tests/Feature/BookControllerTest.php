<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdatesABookSuccessfully(): void
    {
        $book = Book::factory()->create();

        $data = [
            'title' => 'Updated Title',
            'author' => 'Updated Author',
            'rating' => 8,
        ];

        $response = $this->json('PUT', "/api/books/{$book->id}", $data);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Successfully updated the book.',
                'data' => $data
            ]);

        $this->assertDatabaseHas('books', $data);
    }

    public function testValidatesUpdateRequest(): void
    {
        $book = Book::factory()->create();

        $response = $this->json('PUT', "/api/books/{$book->id}", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title', 'author', 'rating']);
    }

    public function testReturns404ForNonexistentBook(): void
    {
        $response = $this->json('PUT', "/api/books/9999", [
            'title' => 'Nonexistent',
            'author' => 'Unknown',
            'rating' => 5,
        ]);

        $response->assertStatus(404);
    }

    public function testFailsToUpdateWithInvalidRating(): void
    {
        $book = Book::factory()->create();

        $data = [
            'title' => 'Valid Title',
            'author' => 'Valid Author',
            'rating' => 15,
        ];

        $response = $this->json('PUT', "/api/books/{$book->id}", $data);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['rating']);
    }
}
