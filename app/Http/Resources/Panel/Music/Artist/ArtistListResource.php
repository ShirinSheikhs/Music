<?php

namespace App\Http\Resources\Panel\Music\Artist;

use App\Models\Music\Artist;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArtistListResource
 *
 * @package App\Http\Resources\Panel\Music\Artist
 * @mixin Artist
 */
class ArtistListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @mixin Artist
     * @return array
     */
    public function toArray($request)
    {
        return ['id'=> $this->id,

                'name'=> $this->name,

        ];
    }
}
