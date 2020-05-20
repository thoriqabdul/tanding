@extends('admin.layouts.base')

@section('content')
    <!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Team <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Player</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="#" href="">Team</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="#" href="">Player</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">
                Player Data
            </h3>
            <div class="block-options">
                <a href="{{route('team.playerCreate', ['id' => $model->id])}}" class="btn-block-option modal-show" title="Tambah Pemain">
                    <i class="si si-plus"></i>Tambah Pemain
                </a>
            </div>
        </div>
        <div class="row container">
            <div class="col-4">
                <img src="{{asset('storage/'.$model->logo_team)}}" alt="" width="300">
            </div>
            <div class="col-8">
                <input type="hidden" class="id" value="{{$model->id}}">
                <table class="table">
                    <tr>
                        <th>Nama Team</th>
                        <th>:</th>
                        <td>{{$model->nama}}</td>
                    </tr>
                    <tr>
                        <th>Tahun Berdiri</th>
                        <th>:</th>
                        <td>{{$model->tahun_berdiri}}</td>
                    </tr>
                    <tr>
                        <th>Nama Markas</th>
                        <th>:</th>
                        <td>{{$model->nama_markas}}</td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <th>:</th>
                        <td>{{$model->kota}}</td>
                    </tr>
                    <tr>
                        <th>Total Pemain</th>
                        <th>:</th>
                        <td>{{count($model->players)}} Pemain</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter " id="roles-table">
                
            </table>
        </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
    
@include('admin.layouts._modal')
@endsection

@push('js_after')
    <script>
        var id = $('.id').val();
        console.log(id);
        $(function () {
            $('#roles-table').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: '{{ route('team.players') }}?id='+id,
                columns: [
                    // {data: 'img', title: 'Logo'},
                    {data: 'nama', title: 'Nama'},
                    {data: 'tinggi', title: 'Tinggi Badan'},
                    {data: 'berat', title: 'Berat Badan'},
                    {data: 'posisi', title: 'Posisi'},
                    {data: 'punggung', title: 'No. Punggung'},
                    {data: 'action', orderable: false, searchable: false, title:'action'}
                ]
            });
        });
    </script>
    <script src="{{asset('js/modal.js')}}"></script>
@endpush