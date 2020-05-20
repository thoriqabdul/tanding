<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Model\Team;

class Player extends Model
{
    use SoftDeletes;
    protected $guarded =['_token','id'];

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }
}
