<?php

namespace Tests\Unit;

use App\Http\Requests\Book\UpdateRequest;
use App\Http\Services\Book\Update;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class UpdateServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdatesBookDataCorrectly(): void
    {
        $book = Book::factory()->create([
            'title' => 'Old Title',
            'author' => 'Old Author',
            'rating' => 5,
        ]);

        $updateService = new Update();

        $data = [
            'title' => 'New Title',
            'author' => 'New Author',
            'rating' => 9,
        ];

        $updatedBook = $updateService($data, $book);

        $this->assertEquals($data['title'], $updatedBook->title);
        $this->assertEquals($data['author'], $updatedBook->author);
        $this->assertEquals($data['rating'], $updatedBook->rating);
    }

    public function testDoesNotUpdateWithInvalidData(): void
    {
        Book::factory()->create();

        $data = [
            'title' => '',
            'author' => '',
            'rating' => 20,
        ];

        $validator = Validator::make($data, (new UpdateRequest())->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('title', $validator->errors()->toArray());
        $this->assertArrayHasKey('author', $validator->errors()->toArray());
        $this->assertArrayHasKey('rating', $validator->errors()->toArray());
    }

    public function testFailsToUpdateWithNegativeRating(): void
    {
        Book::factory()->create();

        $data = [
            'title' => 'Some Title',
            'author' => 'Some Author',
            'rating' => -1,
        ];

        $validator = Validator::make($data, (new UpdateRequest())->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('rating', $validator->errors()->toArray());
    }
}
