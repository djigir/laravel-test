<?php


namespace App\Service;


use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieService
{
    protected string $DefaultPoster = 'images/default_poster.png';
    protected string $PosterDirectory = '/movies/posters';

    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['genre_ids'])) {
                $genre_ids = $data['genre_ids'];
                unset($data['genre_ids']);
            }

            /** if image not upload set default image **/
            !isset($data['poster'])
                ? $data['poster'] = $this->DefaultPoster
                : $data['poster'] = Storage::disk('public')->put($this->PosterDirectory, $data['poster']);

            $movie = Movie::firstOrCreate($data);
            if (isset($genre_ids)) {
                $movie->genres()->attach($genre_ids);
            }
            \DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $movie)
    {
        try {
            DB::beginTransaction();
            if (isset($data['genre_ids'])) {
                $genre_ids = $data['genre_ids'];
                unset($data['genre_ids']);
            }

            if (isset($data['poster'])) {
                $data['poster'] = Storage::disk('public')->put($this->PosterDirectory, $data['poster']);
            }

            $movie->update($data);
            if (isset($genre_ids)) {
                $movie->genres()->sync($genre_ids);
            }
            DB::commit();

        } catch (\Exception $exception) {
            \DB::rollBack();
            abort(500);
        }

        return $movie;
    }
}
