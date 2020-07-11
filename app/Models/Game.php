<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $table = 'games';
	
	protected $fillable = [
        'player_id',
    	'name',
    	'version',
    ];

    protected $dates = ['deleted_at'];

    public function players() {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
