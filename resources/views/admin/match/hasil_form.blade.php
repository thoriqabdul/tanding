<div class="row justify-content-center">
    <div class="col-5 text-center">
        <h2 class="home" data-id="{{$model->home->id}}">{{$model->home->nama}}</h2>
    </div>
    <div class="col-2 text-center">
        <span class="mt-5">VS</span>
    </div>
    <div class="col-5 text-center">
        <h2 class="away" data-id="{{$model->away->id}}">{{$model->away->nama}}</h2>
    </div>

</div>
{!! Form::open(['route' => isset($model) ? ["match.storeScore",$model->id] : 'match.store', 'method' => isset($model) ? 'put' : 'post','autocomplete'=>"false","enctype"=>'multipart/form-data']) !!}
<div class="row">
    <div class="col-12 ada text-center d-none">
        <span class="text-center text-danger">Team Tidak Boleh sama</span>
    </div>
    <div class="form-group col-6 mb-15 text-center">
        {!! Form::text('score_home', null ,$errors->has('name') ? ['class'=>'form-control is-invalid', 'placeholder' => 'Nama'] : ['class'=>'form-control','placeholder' => 'scor', 'id'=>'home_part', 'required']) !!}
    </div>
    <div class="form-group col-6 mb-15 text-center">
        {!! Form::text('score_away',null ,$errors->has('kota') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control', 'placeholder' => 'scor', 'required','id'=>'away_part',]) !!}
    </div>
    <div class="col-6">
        <div class="row" id="var_baru">
            
        </div>
    </div>
    <div class="col-6">
        <div class="row" id="var_lama">
        
        </div>
    </div>
</div>

{{-- {!! Form::close() !!} --}}