<?php

namespace App\Http\Services\Genre;

use App\Models\Genre;

class Update
{
    public function __invoke(array $data, Genre $genre): Genre
    {
        $genre->books()->sync($data['book_ids']);

        return $genre;
    }
}
