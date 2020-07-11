<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\GameRepository;

class GameController extends Controller
{
    protected $game;

    public function __construct(
        GameRepository $game
    ) {
        $this->game = $game;
    }

    public function welcome() {
        return $this->success('Welcome to game catalog');
    }

    public function add(Request $request) {

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
