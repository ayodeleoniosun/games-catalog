<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayedGame extends Model
{
    use SoftDeletes;

    protected $table = 'played_games';
	
	protected $fillable = [
        'game_id',
        'invitation_id',
        'player_id',
        'started_by',
        'type',
        'played_on',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function games() {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function innvitation() {
        return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
    }

    public function players() {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
