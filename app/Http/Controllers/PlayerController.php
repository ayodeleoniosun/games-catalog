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

    }

    public function register(Request $request) {
        $player = $this->player->register($request);
        return $player;
    }

    public function players() {

    }

}
