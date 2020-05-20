<div class="row">
    <div class="form-group col-12 mb-15">
        {!! Form::label('name', 'Nama Team') !!}
        {!! Form::text('nama',isset($model) ? $model->nama: null ,$errors->has('name') ? ['class'=>'form-control is-invalid', 'placeholder' => 'Nama'] : ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-4 mb-15">
        {!! Form::label('logo_team', 'Logo') !!} <br>
        <input type="file" name="logo_team" class="dropify" data-height="300" data-min-width="400" data-default-file="{{isset($model) ? asset('storage/'.$model->logo_team) : ''}}"/>
        {{-- <input type="file" name="img" class="form-group"> --}}
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('tahun_berdiri', 'Tahun Berdiri') !!}
        <input type="text" id="datepicker" name="tahun_berdiri" class="form-control" required value="{{isset($model) ? $model->tahun_berdiri: null}}"/>        
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('nama_markas', 'Nama Markas') !!}
        {!! Form::text('nama_markas',isset($model) ? $model->nama_markas: null ,$errors->has('nama_markas') ? ['class'=>'form-control is-invalid', 'placeholder' => 'nama_markas'] : ['class'=>'form-control', 'required']) !!}
    </div> 
    <div class="form-group col-12 mb-15">
        {!! Form::label('markas', 'Markas') !!}
        <textarea class="form-control" name="alamat_markas">{!! isset($model) ? $model->alamat_markas: null !!}</textarea>
    </div>
    <div class="form-group col-12 mb-15">
        {!! Form::label('kota', 'Kota') !!}
        {!! Form::select('kota',$data ?? '',isset($model) ? $model->kota: null ,$errors->has('kota') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control', 'placeholder' => 'chose one', 'required']) !!}
    </div>
    <div class="col-6">
        <button type="submit" class="btn btn-success btn-md w-100">Upload</button>
    </div>
    <div class="col-6">
        <a href="{{route('team.index')}}" class="btn btn-danger btn-md w-100">Back</a>
    </div>
</div>