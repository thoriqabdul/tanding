<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Model\Player;

class Team extends Model
{
    use SoftDeletes;
    protected $guarded =['_token','id'];

    public function players(){
        return $this->hasMany(Player::class, 'team_id');
    }
}
