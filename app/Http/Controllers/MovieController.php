<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\MovieStoreRequest;
use App\Http\Requests\Movie\MovieUpdateRequest;
use App\Models\Genre;
use App\Models\Movie;
use App\Service\MovieService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    /**
     * @var MovieService
     */
    private MovieService $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $movies = Movie::orderByDesc('id')->where('is_published', 1)->get();
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $genres = Genre::select('id', 'title')->get();
        return view('movie.create', compact('genres'));
    }


    public function store(MovieStoreRequest $request)
    {
        $data = $request->validated();
        $this->movieService->store($data);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @return Response
     */
    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movie $movie
     * @return Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::select('id', 'title')->get();
        return view('movie.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MovieUpdateRequest $request
     * @param Movie $movie
     * @return Response
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $data = $request->validated();
        $movie = $this->movieService->update($data, $movie);

        return redirect()->route('movies.show', $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }

    public function publish_list()
    {
        $movies = Movie::orderBy('is_published', 'ASC')->select('id', 'title', 'is_published', 'poster')->get();
        return view('movie.publish_list', compact('movies'));
    }

    public function publish_toggle(Request $request, Movie $movie)
    {
        $movie->update(['is_published' => $request->input('is_published')]);
        return redirect()->back();
    }
}
