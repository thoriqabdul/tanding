<?php

namespace App\Http\Controllers;

use App\Http\Model\Team;
use App\Http\Model\Match;
use App\Http\Model\Player;
use App\Http\Model\Goal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class MatchController extends Controller
{
    public function index(){
        return view('admin.match.index');
    }

    public function data(){
        $model = Match::with('home', 'away')->get();
        return DataTables::of($model)
        ->addColumn('status', function($model){
            if($model->waktu >= Carbon::now()){
                return "<span class='text-success'>Menunggu Pertandingan</span>";
            } else {
                return "<span class='text-danger'>Pertandingan Selesai</span>";
            }
        })
        ->addColumn('action', function($model){
            $id = $model->id;
            return view('admin.match.button_action', compact('model','id')) ;
        })
        ->rawColumns(['action','status'])
        ->make(true);
    }

    public function create(){
        $data = Team::pluck('nama', 'id');
        return view('admin.match._form', compact('data'));
    }

    public function store(Request $request){
        if($request->home_id == $request->away_id){
            $req = 1;
        }else{
            $req = $request->all();
            Match::create($req);
        }
        return $req;
    }

    public function edit($id){
        $model = Match::find($id);
        $data = Team::pluck('nama', 'id');
        return view('admin.match._form', compact('data','model'));
    }

    public function update($id, Request $request){
        $model = Match::find($id);
        if($request->home_id == $request->away_id){
            $req = 1;
        }else{
            $req = $request->all();
            $model->update($req);
        }
        return $req;
    }

    public function destroy($id){
        $model = Match::find($id);
        $model->delete();
        return back();
    }

    public function editScore($id){
        $model = Match::find($id);
        return view('admin.match.hasil_form', compact('model'));
    }

    public function playerList(Request $request){
        $model = Player::where('team_id', $request->id)->get();
        // dd($model);
        return $model;
    }

    public function storeScore($id,Request $request){
        $playu = $request->player;
        $mnt = $request->mnt;
        $model = Match::find($id);
        $model->score_home = $request->score_home;
        $model->score_away = $request->score_away;
        $model->save();
        
        for($i = 0; $i < count($playu); $i++){
            $play = new Goal();
            $play->match_id = $model->id;
            $play->player_id = $playu[$i];
            $play->mnt = $mnt[$i];
            $play->save();
        }
        return $play;
    }

    public function detail($id){
        $model = Match::find($id);
        $home = $model->home_id;
        $away = $model->away_id;
        $data['home'] = Goal::where('match_id', $model->id)->whereHas('player', function($q) use($home){
            $q->where('team_id', $home);
        })->get();
        $data['away'] = Goal::where('match_id', $model->id)->whereHas('player', function($q) use($away){
            $q->where('team_id', $away);
        })->get();
        // $data['away'] = Goal::where('match_id', $model->id)->whereHas('player', function($q){
        //     $q->where('team_id', $model->away_id);
        // })->get();
        return view('admin.match.show', compact('model','data'));
    }
}
