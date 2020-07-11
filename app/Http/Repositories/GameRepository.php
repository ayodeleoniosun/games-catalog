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

    public function add($data) {

    }

    public function games() {

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
