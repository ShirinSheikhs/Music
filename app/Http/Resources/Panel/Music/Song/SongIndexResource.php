<?php

namespace App\Http\Resources\Panel\Music\Song;

use App\Models\Music\Song;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SongIndexResource
 *
 * @package App\Http\Resources\Panel\Music\Song
 * @mixin  Song
 */
class SongIndexResource extends JsonResource
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
                'lyrics'=>$this->lyrics,
                'artists'=>$this->artists,
                'duration'=>$this->duration,
                'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
                'updated_at'=>$this->created_at->format('Y-m-d H:i:s'),];
    }
}
