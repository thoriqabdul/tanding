<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Model\Team;
use App\Http\Model\Goal;

class Match extends Model
{
    use SoftDeletes;
    protected $guarded =['_token','id'];

    public function home(){
        return $this->belongsTo(Team::class, 'home_id');
    }
    public function away(){
        return $this->belongsTo(Team::class, 'away_id');
    }

    public function goals(){
        return $this->hasMany(Goal::class, 'match_id');
    }
}
