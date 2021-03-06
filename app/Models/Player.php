<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Player extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    protected $table = 'players';
	
	protected $fillable = [
        'nickname',
    	'firstname', 
    	'lastname',
    	'email',
    	'password',
    	'last_logged_in'
    ];

    protected $hidden = [
        'password'
    ];

    protected $dates = ['deleted_at'];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function games() {
        return $this->hasMany(Game::class);
    }

    public function invitations() {
        return $this->hasMany(Invitation::class);
    }

    public function myInvitations() {
        return $this->hasMany(Invitation::class);
    }

    public function playedGames() {
        return $this->hasMany(PlayedGame::class);
    }

}
