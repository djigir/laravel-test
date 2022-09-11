<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\GenreStoreRequest;
use App\Http\Requests\Genre\GenreUpdateRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::select('id', 'title')->get();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GenreStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreStoreRequest $request)
    {
        Genre::firstOrCreate($request->validated());

        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GenreUpdateRequest $request
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        return redirect()->route('genres.show', $genre->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
