<?php

namespace App\Http\Resources\Panel\Music\Artist;

use App\Models\Music\Artist;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArtistShowResource
 *
 * @package App\Http\Resources\Panel\Music\Artist
 *   @mixin Artist
 */
class ArtistShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return array
     */
    public function toArray($request)
    {
        return ['id'=> $this->id,
                'name'=>$this->name,
                'biography'=>$this->biography,
                'birthday'=>$this->birthday,
                'created_at'=>$this->created_at->format('Y-m-d H:i:s'),



        ];
    }
}
