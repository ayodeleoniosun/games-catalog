<?php

namespace App\Http\Repositories;
use App\Http\CommonHelper;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Models\PlayedGame;
use DB;
use Validator;

class GameRepository
{
    use CommonHelper;
    
    protected $game;
    protected $played_game;

    public function __construct(
        Game $game,
        PlayedGame $played_game
    ) {
        $this->game = $game;
        $this->played_game = $played_game;
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

    // public function isGamePlayedToday($playerId, $game_id) {
    //     $played_games = $this->played_game->wherePlayerId($playerId)->whereGameId($game_id)->get();
    //     $status = false;

    //     foreach($played_games as $game) {
    //         $date_played = 
    //     }
    // }

    public function play($playerId, $data) {
        $rules = [
            'game_id' => 'required',
        ];

        $validator = Validator::make($data->all(), $rules);
        $errors = $validator->errors();
        
        if($validator->fails()) {
            foreach($errors->all() as $error) {
                $error_details = ['type' => 'error', 'message' => 'Select the game you want to play'];
                return $error_details;
            }
        } else {
            
            // $is_played_today = $this->isGamedPlayedToday($playerId, $data->game_id);
            // return $is_played_today;

            $play_game = $this->played_game->create([
                'game_id' => $data->game_id,
                'player_id' => $playerId,
                'type' => 'single',
                'status' => 'in-progress',
            ]);

            $details = [
                'type' => 'success',
                'play_game' => $play_game,
            ];

            return $details;
        }
    }

    public function gamesPerDay() {

    }

    public function gamesDateRange() {

    }

    public function playerGames($playerId) {
        $games = $this->game->wherePlayerId($playerId)->orderBy('id', 'DESC')->get();
        return $games;
    }

    public function playerPlayedGames() {

    }

    public function topPlayers() {

    }

    public function topPlayersGames() {

    }
}
