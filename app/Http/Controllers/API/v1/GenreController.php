<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Genre\IndexGenreResource;
use App\Http\Resources\API\v1\Genre\ShowGenreResource;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $genres = Genre::select('id', 'title')->get();
        return IndexGenreResource::collection($genres);
    }

    /**
     * Display the specified resource.
     *
     * @param Genre $genre
     * @return ShowGenreResource
     */
    public function show(Genre $genre)
    {
        return new ShowGenreResource($genre);
    }
}
