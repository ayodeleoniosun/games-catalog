<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Repositories\PlayerRepository;

class PlayerController extends Controller
{
    protected $player;

    public function __construct(
        PlayerRepository $player
    ) {
        $this->player = $player;
    }

    public function login(Request $request) {
        $login = $this->player->login($request);
        return $this->success($login);
    }

    public function register(Request $request) {
        $player = $this->player->register($request);
        return $player;
    }

    public function players() {
        $players = $this->player->players();
        return $this->success($players);
    }

}
