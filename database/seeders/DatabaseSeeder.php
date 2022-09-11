<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $genres = Genre::factory(5)->create();
        $movies = Movie::factory(20)->create();

        foreach ($movies as $movie) {
            $genresIds = $genres->random(rand(1, 4))->pluck('id');
            $movie->genres()->attach($genresIds);
        }
    }
}
