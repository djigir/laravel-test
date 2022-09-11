<?php

namespace App\Http\Resources\API\v1\Genre;

use App\Http\Resources\API\v1\Movie\MovieCollectionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowGenreResource extends JsonResource
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
            'movies' => MovieCollectionResource::collection($this->movies)->paginate(10)
        ];
    }
}
