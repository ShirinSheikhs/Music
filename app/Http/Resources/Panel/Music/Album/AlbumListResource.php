<?php

namespace App\Http\Resources\Panel\Music\Album;

use App\Models\Albume\Album;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AlbumIndexResource
 * @package App\Http\Resources\Panel\Music\Album
 *  @mixin \App\Models\Music\Album
 */
class AlbumListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['id'=> $this->id,
                'name'=>$this->name,
                'released_at'=>$this->released_at->format('Y-m-d H:i:s'),
                'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
                'updated_at'=>$this->created_at->format('Y-m-d H:i:s'),

            ];
    }
}
