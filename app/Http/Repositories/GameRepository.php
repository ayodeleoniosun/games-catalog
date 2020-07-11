<?php

namespace App\Http\Repositories;
use App\Http\CommonHelper;
use App\Http\Resources\GameResource;
use App\Http\Resources\PlayedGameResource;
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
            $game_exists = $this->game->whereName($data->name)->whereVersion($data->version)->wherePlayerId($playerId)->first();
            
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

    public function isGamePlayedToday($playerId, $game_id) {
        $played_games = $this->played_game->wherePlayerId($playerId)->whereGameId($game_id)->get();
        $counter = 0;
        $today = date("Y-m-d");

        foreach($played_games as $game) {
            $date_played = $this->createdOn($game->created_at);
            $split_date = explode(" ",$date_played);
            
            if($today == $split_date[0]) {
                $counter++;
                break;
            }
        }

        if($counter == 0) return "false";
        return "true";
    }

    public function play($playerId, $data) {
        $executionStartTime = microtime(true);
        $response;

        $rules = [
            'game_id' => 'required',
        ];

        $validator = Validator::make($data->all(), $rules);
        $errors = $validator->errors();
        
        if($validator->fails()) {
            foreach($errors->all() as $error) {
                $response = ['type' => 'error', 'message' => 'Select the game you want to play'];
                return $response;
            }
        } else {
            
            $is_played_today = $this->isGamePlayedToday($playerId, $data->game_id);
            $memory_usage = memory_get_usage();
                
            if($is_played_today == "true") {
                $executionEndTime = microtime(true);
                $runtime_stats = $this->getRuntimeStats($executionEndTime, $executionStartTime, $memory_usage);
                $response = ['type' => 'error', 'message' => 'You have played this game today', 'running-stats' => $runtime_stats];
                return $response;
                
            } else {
                
                $play_game = $this->played_game->create([
                    'game_id' => $data->game_id,
                    'player_id' => $playerId,
                    'started_by' => $playerId,
                    'type' => 'single',
                    'status' => 'in-progress',
                ]);

                $executionEndTime = microtime(true);
                $runtime_stats = $this->getRuntimeStats($executionEndTime, $executionStartTime, $memory_usage);
                
                $response = [
                    'type' => 'success',
                    'play_game' => $play_game,
                    'running-stats' => $runtime_stats
                ];
            }
        }

        return $response;
    }

    public function gamesPlayedOnaDate($date) {
        $played_games = PlayedGameResource::collection($this->played_game->orderBy('id', 'DESC')->get());
        $all_games = [];

        foreach($played_games as $game) {
            $date_played = $this->createdOn($game->created_at);
            $split_date = explode(" ",$date_played);
            
            if($date == $split_date[0]) {
                $the_game = new PlayedGameResource($this->played_game->find($game->id));
                array_push($all_games, $the_game);
            }
        }

        return $all_games;
    }

    public function gamesPlayedOnaDateRange($start_date, $end_date) {
        $played_games = PlayedGameResource::collection($this->played_game->orderBy('id', 'DESC')->get());
        $all_games = [];
        $start_date = strtotime($start_date);
        $end_date = strtotime($end_date);

        foreach($played_games as $game) {
            $date_played = $this->createdOn($game->created_at);
            $datetime = explode(" ",$date_played);
            $game_timestamp = strtotime($datetime[0]);
            
            if( ($game_timestamp >= $start_date) && ($game_timestamp <= $end_date) ) {
                $the_game = new PlayedGameResource($this->played_game->find($game->id));
                array_push($all_games, $the_game);
            }
        }

        return $all_games;
    }

    public function playerGames($playerId) {
        $games = $this->game->wherePlayerId($playerId)->orderBy('id', 'DESC')->get();
        return $games;
    }

    public function playerPlayedGames($playerId) {
        $played_games = PlayedGameResource::collection($this->played_game->wherePlayerId($playerId)->orderBy('id', 'DESC')->get());
        return $played_games;
    }

    public function topPlayers() {

    }

    public function topPlayersGames() {

    }
}
