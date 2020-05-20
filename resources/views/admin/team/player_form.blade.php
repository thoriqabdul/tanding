{!! Form::open(['route' => isset($model) ? ["team.updatePlayer",$model->id] : 'team.playerstore', 'method' => isset($model) ? 'put' : 'post','autocomplete'=>"false","enctype"=>'multipart/form-data']) !!}
<div class="row">
    <div class="col-12 ada text-center d-none">
        <span class="text-center text-danger">Pemain Ssudah Terdaftar</span>
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('name', 'Nama Team') !!}
        {!! Form::text('team_id', isset($model) ? $model->team->nama : $data->nama ,$errors->has('name') ? ['class'=>'form-control is-invalid', 'placeholder' => 'Nama','readonly'] : ['class'=>'form-control', 'required','readonly']) !!}
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('name', 'Nama Pemain') !!}
        {!! Form::text('nama', isset($model) ? $model->nama: null ,$errors->has('name') ? ['class'=>'form-control is-invalid', 'placeholder' => 'Nama'] : ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('tinggi', 'Tinggi Badan (cm)') !!}
        {!! Form::number('tinggi',isset($model) ? $model->tinggi: null ,$errors->has('tinggi') ? ['class'=>'form-control is-invalid', 'placeholder' => 'tinggi'] : ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('berat', 'Berat Badan (Kg)') !!}
        {!! Form::number('berat',isset($model) ? $model->berat: null ,$errors->has('berat') ? ['class'=>'form-control is-invalid', 'placeholder' => 'berat'] : ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('posisi', 'Posisi') !!}
        {!! Form::select('posisi',$posisi ?? '',isset($model) ? $model->posisi: null ,$errors->has('kota') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control', 'placeholder' => 'chose one', 'required']) !!}
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('punggung', 'Punggung') !!}
        {!! Form::number('punggung',isset($model) ? $model->punggung: null ,$errors->has('punggung') ? ['class'=>'form-control is-invalid', 'placeholder' => 'punggung'] : ['class'=>'form-control', 'required']) !!}
        <span class="text-danger d-none punggung">Nomor Sudah Di gunakan</span>
    </div>
    {{-- <div class="col-6">
        <button type="submit" class="btn btn-success btn-md w-100">Upload</button>
    </div>
    <div class="col-6">
        <a href="{{route('team.index')}}" class="btn btn-danger btn-md w-100">Back</a>
    </div> --}}
</div>

{!! Form::close() !!}