<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\CommonHelper;

class GameResource extends JsonResource
{
    use CommonHelper;

    /**
     * Transform the resource into an aarray.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'player_id' => $this->player_id,
            'player_fullname' => ucwords($this->Player->firstname." ".$this->Player->lastname),
            'name' => $this->name,
            'version' => $this->version,
            'created_at' => Carbon::parse($this->created_at)->format('F jS, Y, h:i: A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('F jS, Y, h:i: A'),
            'deleted_at' => Carbon::parse($this->deleted_at)->format('F jS, Y, h:i: A'),
        ];
    }
}
