<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\CommonHelper;

class playedGamesResource extends JsonResource
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
        $played_on;

        if($this->played_on == '' || $this->played_on == null || !$this->played_on) {
            $played_on = $this->played_on;
        } else {
           $played_on = Carbon::parse($this->played_on)->format('F jS, Y, h:i: A');
        }

        return [
            'id' => $this->id,
            'invitation_id' => $this->invitation_id,
            'game_id' => $this->game_id,
            'game_name' => ucfirst($this->Game->name),
            'player_id' => $this->player_id,
            'player_fullname' => ucwords($this->Player->firstname." ".$this->Player->lastname),
            'starter_id' => $this->started_by,
            'starter_fullname' => ucwords($this->Player->firstname." ".$this->Player->lastname),
            'status' => $this->status,
            'played_on' => $played_on,
            'type' => $this->type,
            'created_at' => Carbon::parse($this->created_at)->format('F jS, Y, h:i: A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('F jS, Y, h:i: A'),
            'deleted_at' => Carbon::parse($this->deleted_at)->format('F jS, Y, h:i: A'),
        ];
    }
}
