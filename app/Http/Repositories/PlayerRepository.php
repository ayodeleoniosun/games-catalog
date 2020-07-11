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

    public function getPlayer($playerId) {
        return new PlayerResource($this->player->with('games', 'playedGames')->find($playerId));
    }

    public function getThePlayer($playerId) {
        return $this->player->with('games', 'playedGames')->find($playerId);
    }

    public function updateLastLoggedIn($playerId) {
        $player = $this->getThePlayer($playerId);
        $player->last_logged_in = date("Y-m-d H:i:s");
        $player->save();
        return $player;
    }
    
    public function login($data) {
        $token = null;
        $credentials = $data->only('email', 'password');
        
        if(!$token = auth('api')->attempt($credentials)) {
           
            $details = [
                'type' => 'error',
                'message' => 'Incorrect login details'
            ]; 

            return $details;
        }

        $player = $this->player->whereEmail($data->email)->first();
        
        if($player) {
            
            $auth_player = $this->getThePlayer($player->id);
            $check_password = Hash::check($data->password, $auth_player->password);

            if($check_password ) {
                $this->updateLastLoggedIn($player->id);
                $profile = $this->getPlayer($player->id);
                
                $details = [
                    'type' => 'success',
                    'player' => $profile,
                    'token' => $token
                ];
                
                return $details;
            
            } else {
            
                $details = [
                    'type' => 'error',
                    'message' => 'Incorrect login details'
                ]; 

                return $details;
            }

        } else {
        
            $details = [
                'type' => 'error',
                'message' => 'Incorrect login details'
            ];    
        
            return $details;
        }
    }

    public function register($data) {
        $rules = [
            'nickname' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];

        $validator = Validator::make($data->all(), $rules);
        $errors = $validator->errors();
        
        if($validator->fails()) {
            foreach($errors->all() as $error) {
                $error_details = ['type' => 'error', 'message' => $error];
                return $error_details;
            }
        } else {
            $nickname_exists = $this->player->whereNickname($data->nickname)->first();
            $email_exists = $this->player->whereEmail($data->email)->first();
            
            if($email_exists) {
                $details = ['type' => 'error','message' => 'Email address exists. Try again.'];
                return $details;
            } else if($nickname_exists) {
                $details = ['type' => 'error','message' => 'Nickname exists. Try again.'];
                return $details;
            } else {

                $player = $this->player->create([
                    'nickname' => $data->nickname,
                    'firstname' => $data->firstname,
                    'lastname' => $data->lastname,
                    'email' => $data->email,
                    'password' => bcrypt($data->password)
                ]);

                $details = [
                    'type' => 'success',
                    'player' => $player,
                ];

                return $details;
            }
        }
    }

    public function players() {
        
    }
}
