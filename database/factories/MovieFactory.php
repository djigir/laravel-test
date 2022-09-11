<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $model = Movie::class;
    const POSTER_DIRECTORY = 'public/storage/movies/posters';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $FullPosterPath = $this->faker->image(self::POSTER_DIRECTORY, 360, 360, NULL, true);
        $posterPath = str_replace('public/storage/', '', $FullPosterPath);

        return [
            'title' => $this->faker->realText(15),
            'is_published' => rand(0, 1),
            'poster' => $posterPath,
        ];
    }
}
