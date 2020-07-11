<?php

namespace App\Http\Repositories;
use App\Http\CommonHelper;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use DB;
use Validator;

class PlayerRepository
{
    use CommonHelper;
    
    protected $player;

    public function __construct(
        Player $player
    ) {
        $this->player = $player;
    }

    public function login($data) {

    }

    public function register($data) {
        
    }

    public function players() {
        
    }
}
