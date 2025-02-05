<?php

namespace App\Http\Services\Genre;

use App\Models\Genre;

class Store
{
    public function __invoke(array $data): Genre
    {
        return Genre::create([
            'name' => $data['name']
        ]);
    }
}
