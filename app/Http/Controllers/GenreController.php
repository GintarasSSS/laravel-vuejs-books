<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\IndexRequest;
use App\Http\Requests\Genre\StoreRequest;
use App\Http\Requests\Genre\UpdateRequest;
use App\Http\Services\Genre\Index;
use App\Http\Services\Genre\Store;
use App\Http\Services\Genre\Update;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends Controller
{
    public function index(IndexRequest $request, Index $index): JsonResponse
    {
        return response()->json([
            'message' => 'Successfully fetched the genres.',
            'data' => $index()
        ]);
    }

    public function store(StoreRequest $request, Store $store): JsonResponse
    {
        $genre = $store($request->validated());

        return response()->json(
            [
                'message' => 'Successfully stored the genre.',
                'data' => $genre
            ],
            Response::HTTP_CREATED
        );
    }

    public function attach(UpdateRequest $request, Update $update, Genre $genre): JsonResponse
    {
        $genre = $update($request->validated(), $genre);

        return response()->json(
            [
                'message' => 'Successfully stored the genre.',
                'data' => $genre
            ],
            Response::HTTP_CREATED
        );
    }
}
