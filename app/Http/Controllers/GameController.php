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
        $playerId = $this->getPlayerIdFromToken($request);
        $game = $this->game->add($playerId,$request);
        return $game;
    }

    public function games() {
        $games = $this->game->games();
        return $this->success($games);
    }

    public function gamesPerDay() {

    }

    public function gamesDateRange() {

    }

    public function playerGames($playerId) {
        $games = $this->game->playerGames($playerId);
        return $games;
    }

    public function playerPlayedGames() {

    }

    public function topPlayers() {

    }

    public function topPlayersGames() {

    }

}
