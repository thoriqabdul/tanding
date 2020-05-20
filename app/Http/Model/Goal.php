<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;
    protected $guarded =['_token','id'];

    public function player(){
        return $this->belongsTo(Player::class, 'player_id');
    }
}
