<?php

namespace App\Http\Resources\Panel\Music\Artist;

use App\Models\Music\Artist;
use App\Models\Music\Song;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArtistListResource
 *
 * @package App\Http\Resources\Panel\Music\Artist
 * @mixin Song
 */
class SongListResource extends JsonResource
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
                'name'=>$this->name,
                'lyrics'=>$this->lyrics,
                'artists'=>$this->artists,
                'duration'=>$this->duration,
                'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
                'updated_at'=>$this->created_at->format('Y-m-d H:i:s'),];
    }
}
