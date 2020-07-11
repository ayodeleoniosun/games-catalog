<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\CommonHelper;

class PlayerResource extends JsonResource
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
        $last_logged_in;

        if($this->last_logged_in == '' || $this->last_logged_in == null || !$this->last_logged_in) {
            $last_logged_in = $this->last_logged_in;
        } else {
           $last_logged_in = $this->time_elapsed($this->last_logged_in);
        }

        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'last_logged_in' => $last_logged_in,
            'created_at' => Carbon::parse($this->created_at)->format('F jS, Y, h:i: A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('F jS, Y, h:i: A'),
            'deleted_at' => Carbon::parse($this->deleted_at)->format('F jS, Y, h:i: A'),
        ];
    }
}
