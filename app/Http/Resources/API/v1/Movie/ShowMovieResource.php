<?php

namespace App\Http\Resources\API\v1\Movie;

use App\Http\Resources\API\v1\Genre\IndexGenreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowMovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'poster' => asset('storage/' . $this->poster),
            'genres' => IndexGenreResource::collection($this->genres)
        ];
    }
}
