<?php

namespace App\Http\Repositories;
use App\Http\CommonHelper;
use App\Http\Resources\GameResource;
use App\Models\Game;
use DB;
use Validator;

class GameRepository
{
    use CommonHelper;
    
    protected $game;

    public function __construct(
        Game $game
    ) {
        $this->game = $game;
    }

    public function games() {
        $games = GameResource::collection($this->game->orderBy('id', 'DESC')->get());
        return $games;
    }

    public function add($playerId, $data) {
        $rules = [
            'name' => 'required',
            'version' => 'required',
        ];

        $validator = Validator::make($data->all(), $rules);
        $errors = $validator->errors();
        
        if($validator->fails()) {
            foreach($errors->all() as $error) {
                $error_details = ['type' => 'error', 'message' => $error];
                return $error_details;
            }
        } else {
            $game_exists = $this->game->wherePlayerId($playerId)->first();
            
            if($game_exists) {
                $details = ['type' => 'error','message' => 'You have created this game before. Try again.'];
                return $details;
            } else {

                $game = $this->game->create([
                    'name' => $data->name,
                    'version' => $data->version,
                    'player_id' => $playerId,
                ]);

                $details = [
                    'type' => 'success',
                    'game' => $game,
                ];

                return $details;
            }
        }
    }

    public function gamesPerDay() {

    }

    public function gamesDateRange() {

    }

    public function playerGames() {

    }

    public function playerPlayedGames() {

    }

    public function topPlayers() {

    }

    public function topPlayersGames() {

    }
}
