<?php

namespace App\Http\Resources\Panel\Music\Artist;

use App\Models\Music\Artist;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ArtistIndexResource
 *
 * @package App\Http\Resources\Panel\Music\Artist
 *          @mixin Artist
 */
class ArtistIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return ['id'=> $this->id,
                'name_en'=>$this->getTranslation('name', 'en'),
                'name_fa'=>$this->getTranslation('name', 'fa'),
                'names'=>$this->getTranslations('name'),
                'biography'=>$this->biography,
                'birthday'=>$this->birthday,
                'created_at'=>$this->created_at->format('Y-m-d H:i:s'),



        ];
    }
}
