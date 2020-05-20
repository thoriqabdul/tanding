<div class="row justify-content-center">
    <div class="col-12 text-center mb-2">
        <h3>Match</h3>
        <span>{{$model->waktu}}</span>
    </div>
    <div class="col-5 text-center">
        <h1>{{$model->score_home}}</h1>
        <img src="{{asset('storage/'.$model->home->logo_team)}}" alt="" width="200" height="200">
        <h2 class="home" data-id="{{$model->home->id}}">{{$model->home->nama}}</h2>
    </div>
    <div class="col-2 text-center">
        <h2 class="mt-7">VS</h2>
    </div>
    <div class="col-5 text-center">
        <h1>{{$model->score_away}}</h1>
        <img src="{{asset('storage/'.$model->away->logo_team)}}" alt="" width="200" height="200">
        <h2 class="away" data-id="{{$model->away->id}}">{{$model->away->nama}}</h2>
    </div>

</div>
{{-- {!! Form::open(['route' => isset($model) ? ["match.storeScore",$model->id] : 'match.store', 'method' => isset($model) ? 'put' : 'post','autocomplete'=>"false","enctype"=>'multipart/form-data']) !!} --}}
<div class="row justify-content-center">
    <div class="col-6 mb-15">
        <table class="table table-striped">
            @foreach ($data['home'] as $item)
            <tr>
                <td>{{$item->player->nama}} <span>({{$item->mnt}})</span></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-6 mb-15">
        <table class="table table-striped">
            @foreach ($data['away'] as $item)
            <tr>
                <td>{{$item->player->nama}} <span>({{$item->mnt}})</span></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

{{-- {!! Form::close() !!} --}}