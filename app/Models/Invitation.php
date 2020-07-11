<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use SoftDeletes;

    protected $table = 'invitations';
	
	protected $fillable = [
        'game_id',
        'created_by',
        'invited_player',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function game() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function myInvitations() {
        return $this->belongsTo(Player::class, 'created_by', 'id');
    }

    public function players() {
        return $this->belongsTo(Player::class, 'invited_player', 'id');
    }
}
