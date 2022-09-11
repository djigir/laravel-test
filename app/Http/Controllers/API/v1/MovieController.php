<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Movie\ShowMovieResource;
use App\Http\Resources\API\v1\Movie\IndexMovieResource;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::select('id', 'title', 'poster')->paginate(15);

        return IndexMovieResource::collection($movies);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return new ShowMovieResource($movie);
    }
}
