<?php

namespace App\Http\Resources\API\v1\Movie;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class MovieResource extends JsonResource
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
        ];
    }
}
