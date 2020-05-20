{!! Form::open(['route' => isset($model) ? ["match.update",$model->id] : 'match.store', 'method' => isset($model) ? 'put' : 'post','autocomplete'=>"false","enctype"=>'multipart/form-data']) !!}
<div class="row">
    <div class="col-12 ada text-center d-none">
        <span class="text-center text-danger">Team Tidak Boleh sama</span>
    </div>
    <div class="form-group col-5 mb-15 text-center">
        {!! Form::label('posisi', 'Home') !!}
        {!! Form::select('home_id',$data ?? '',isset($model) ? $model->home_id: null ,$errors->has('kota') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control', 'placeholder' => 'chose one', 'required']) !!}
    </div>
    <div class="col-2 text-center">
        <h3 class="mt-4">VS</h3>
    </div>
    <div class="form-group col-5 mb-15 text-center">
        {!! Form::label('posisi', 'Away') !!}
        {!! Form::select('away_id',$data ?? '',isset($model) ? $model->away_id: null ,$errors->has('kota') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control', 'placeholder' => 'chose one', 'required']) !!}
    </div>
    <div class="form-group col-12 mb-15 text-center">
        {!! Form::label('posisi', 'Waktu') !!}
        <input type="text" id="datepicker" autocomplete="off" name="waktu" class="form-control" required value="{{isset($model) ? $model->waktu : null}}"/>
    </div>
    {{-- <div class="col-6">
        <button type="submit" class="btn btn-success btn-md w-100">Upload</button>
    </div>
    <div class="col-6">
        <a href="{{route('team.index')}}" class="btn btn-danger btn-md w-100">Back</a>
    </div> --}}
</div>

{!! Form::close() !!}