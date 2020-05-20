<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Team;
use App\Http\Model\Player;
use Yajra\DataTables\DataTables;

class TeamController extends Controller
{
    public function index(){
        return view('admin.team.index');
    }

    public function data(){
        $model = Team::get();
        return DataTables::of($model)
        ->addColumn('img', function($model){
            $img = asset('storage/'.$model->logo_team);
            return "<img src='$img' height='150' alt=''>";
        })
        ->addColumn('action', function($model){
            $id = $model->id;
            return view('admin.team.button_action', compact('model','id')) ;
        })
        ->rawColumns(['action','img'])
        ->make(true);
    }

    public function create(){
        $data = array('jakarta'=>'jakarta','bandung'=>'bandung','aceh'=>'aceh');
        return view('admin.team.create', compact('data'));
    }

    public function store(Request $request){
        try{
            $upload = $request->all();
            if($request->hasFile('logo_team')){
                $file = $request->file('logo_team')->store('logo_team', 'public');
                $upload['logo_team'] = $file;
            } 
            Team::create($upload);
            return redirect()->route('team.index')->with('success', 'Success Input!');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('err',  $e->getMessage());
        }
    }

    public function edit($id){
        $model = Team::find($id);
        $data = array('jakarta'=>'jakarta','bandung'=>'bandung','aceh'=>'aceh');
        return view('admin.team.edit', compact('model','data'));
    }

    public function update($id, Request $request){
        try{
            $model = Team::find($id);
            $upload = $request->all();
            if($request->hasFile('logo_team')){
                if(isset($model->logo_team) && file_exists(storage_path('app/public/'. $model->logo_team))){
                    \Storage::delete('public/'. $model->logo_team);
                }
                $file = $request->file('logo_team')->store('logo_team', 'public');
                $upload['logo_team'] = $file;
            }
            $model->update($upload);
        return redirect()->route('team.index')->with('success', 'Success Update!');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('err',  $e->getMessage());
        }
    }

    public function destroy($id){
        try{
            $model = Team::find($id);
            $model->delete();
            return back()->with('suc',  'Berhasil di hapus');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('err',  $e->getMessage());
        }
    }

    public function player($id){
        $model = Team::find($id);
        return view('admin.team.player', compact('model'));
    }

    public function dataPlayer(Request $request){
        $model = Player::where('team_id', $request->id)->get();
        return DataTables::of($model)
        // ->addColumn('img', function($model){
        //     $img = asset('storage/'.$model->logo_team);
        //     return "<img src='$img' height='150' alt=''>";
        // })
        ->addColumn('action', function($model){
            $id = $model->id;
            return view('admin.team.button_player', compact('model','id')) ;
        })
        ->rawColumns(['action','img'])
        ->make(true);
    }

    public function playerCreate(Request $request){
        $data = Team::where('id', $request->id)->first();
        $posisi = array('Penyerang'=>'Penyerang', 'Gelandang'=>'Gelandang', 'Bertahan'=>'Bertahan', 'Penjaga Gawang'=>'Penjaga Gawang');
        return view('admin.team.player_form',compact('data','posisi'));
    }

    public function playerstore(Request $request){
        $team = Team::where('nama', $request->team_id)->first();
        $player = Player::select('punggung')->where('punggung', $request->punggung)->where('team_id', $team->id)->get();
        $players = Player::select('nama')->where('nama', $request->nama)->get();
        if(!$player->isEmpty()){
            $req = 0;
        } elseif(!$players->isEmpty()){ 
            $req = 1;
        }else {
            $req = $request->all();
            $req['team_id'] = $team->id;
            Player::create($req);
        }
        return $req;
    }

    public function editPlayer($id){
        $model = Player::find($id);
        $posisi = array('Penyerang'=>'Penyerang', 'Gelandang'=>'Gelandang', 'Bertahan'=>'Bertahan', 'Penjaga Gawang'=>'Penjaga Gawang');
        return view('admin.team.player_form',compact('model','data','posisi'));
    }

    public function updatePlayer($id, Request $request){
        $model = Player::find($id);
        $team = Team::where('nama', $request->team_id)->first();
        $player = Player::select('punggung')->where('punggung', $request->punggung)->where('team_id', $team->id)->get();
        $players = Player::select('nama','berat')->where('nama', $request->nama)->where('berat', $request->berat)->get();
        if(!$player->isEmpty()){
            $req = 0;
        } else {
            $req = $request->all();
            $req['team_id'] = $team->id;
            $model->update($req);
        }
        return $req;
    }

    public function destroyPlayer($id){
        $model = Player::find($id);
        $model->delete();
        return back();
    }
}
